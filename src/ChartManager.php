<?php

namespace Scopdrag\LaravelGoogleChart;

/**
 * 
 */
class ChartManager implements Contracts\Factory {

    protected $id;
    protected $options = [];
    protected $data = [];
    protected $cols = [];
    protected $rows = [];
    protected $chart_type = 'bar-chart';

    /**
     * setting id of chart on page
     */
    public function setId() {
        $this->id = microtime(TRUE);
    }
    /**
     * getting chart id
     * @return type
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     *Setting chart type  
     * @param type $type
     * @return \Scopdrag\LaravelGoogleChart\ChartManager
     */
    public function setChartType($type) {
        $this->chart_type = $type;
        return $this;
    }

    /**
     * Getting chart type 
     * @return type
     */
    public function getChartType() {
        return strtolower($this->chart_type);
    }

    /**
     * Setting options 
     * @param type $options
     * @return \Scopdrag\LaravelGoogleChart\ChartManager
     */
    public function setOptions($options) {
        $default_options = [
            'chart' => [
                'title' => 'Population of Largest U.S. Cities',
                'subtitle' => 'Based on most recent and previous census data'
            ],
            'hAxis' => [
                'title' => 'Total Population',
                'minValue' => 0
            ],
            'vAxis' => [
                'title' => 'City'
            ],
            'bars' => 'horizontal', //required if using material chart
            'axes' => [
                'y' => [0 => ['side' => 'right']]
            ]
        ];



        $this->options = empty($options) ? $default_options : $options;
        return $this;
    }

    /**
     * Setting cols
     * @param type $cols
     * @return \Scopdrag\LaravelGoogleChart\ChartManager
     */
    public function setCols($cols = []) {
        $this->cols = $cols;
        return $this;
    }

    /**
     * getting cols
     * @return type
     */
    public function getCols() {
        return $this->cols;
    }
    /**
     * Setting rows
     * @param type $rows
     * @return \Scopdrag\LaravelGoogleChart\ChartManager
     * @throws \Exception
     */
    public function setRows($rows = []) {

        if (!empty($this->cols)) {
            if (count($rows[0]) < 1) {
                throw new \Exception('Expected 2 dimensional array for rows');
            } elseif (count($this->cols) != 0 && count($this->cols) != count($rows[0])) {
                throw new \Exception('No of cols must equivelent to no heads in rows');
            }
        }
        $this->rows = $rows;
        return $this;
    }

    /**
     * processing rows and there heads 
     * @return type
     */
    protected function processRowsHeads() {
        $cols = $this->getCols();
        $this->data = $this->rows;
        if (!empty($cols)) {
            array_unshift($this->data, $cols);
        }
        return $this->data;
    }

    /**
     * genrate Google chart
     * @return type
     */
    public function render() {
        $this->setId();
        $id = $this->id;
        $this->processRowsHeads();
        return view('LaravelGoogleChart::' . $this->getChartType())
                        ->with(['options' => $this->options,
                            'id' => $this->id,
                            'data' => $this->data])->render();
    }
    
     

}
