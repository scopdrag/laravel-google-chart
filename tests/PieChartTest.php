<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PieChartTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $cols = ['Major', 'Degrees'];
        $rows = [
            ['Business', 256070], ['Education', 108034],
            ['Social Sciences & History', 127101], ['Health', 81863],
            ['Psychology', 74194]
        ];
        $options = [
            'pieSliceText' => 'none',
        ];

        $chartManager =ChartManager::setChartType('piechart-chart')
                ->setOptions($options)
                ->setCols($cols)
                ->setRows($rows);

        $content = $chartManager->render();

        $this->assertEquals('piechart-chart', $chartManager->getChartType());
        $this->assertRegExp('/visualization\\.PieChart/', $content);
    }

}
