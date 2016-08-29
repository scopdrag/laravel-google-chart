<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ScatterChartTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $cols = ['Diameter', 'Age'];
                $rows = [
                    [8, 37],
                    [4, 19.5],
                    [11, 52],
                    [4, 22],
                    [3, 16.5],
                    [6.5, 32.8], [
                        14, 72]
                ];

                $options = [
                    'title' => 'Age of sugar maples vs. trunk diameter, in inches',
                    'hAxis' => [
                        'title' => 'Diameter',
                    ],
                    'vAxis' => [
                        'title' => 'Age',
                    ],
                    'legend' => 'none',
                    'trendlines' => [
                        0 => [], // Draw a trendline for data series 0.
                    ],
                ];

                $chartManager = ChartManager::setChartType('scatter-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows);

        $content = $chartManager->render();

        $this->assertEquals('scatter-chart', $chartManager->getChartType());
        $this->assertRegExp('/visualization\\.ScatterChart/', $content);
    }

}
