<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BarChartTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $options = [
            'chart' => [
                'title' => 'Population of Largest U.S. Cities',
                'subtitle' => 'Based on most recent and previous census data'
            ],
            'chartArea' => ['width' => '50%'],
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

        $cols = ['City', '2010 Population', '2000 PopulaÎtions'];
        $rows = [
            ['New York City, NY', 8175000, 8008000],
            ['Los Angeles, CA', 3792000, 3694000],
            ['Chicago, IL', 2695000, 2896000],
            ['Houston, TX', 2099000, 1953000],
            ['Philadelphia, PA', 1526000, 1517000]
        ];

        $chartManager = ChartManager::setChartType('bar-chart')
                ->setOptions($options)
                ->setCols($cols)
                ->setRows($rows);
        
        $content = $chartManager->render();
        
        $this->assertEquals('bar-chart', $chartManager->getChartType());
        $this->assertRegExp('/visualization\\.BarChart/', $content);
    }

}
