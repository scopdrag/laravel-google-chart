<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CandlestickChartTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {

        $rows = [
            ['Mon', 20, 28, 38, 45],
            ['Tue', 31, 38, 55, 66],
            ['Wed', 50, 55, 77, 80],
            ['Thu', 77, 77, 66, 50],
            ['Fri', 68, 66, 22, 15]
        ];


        $options = [
            'legend' => 'none'
        ];


        $chartManager = ChartManager::setChartType('candlestick-chart')
                ->setOptions($options)
                ->setCols([])
                ->setRows($rows);

        $content = $chartManager->render();

        $this->assertEquals('candlestick-chart', $chartManager->getChartType());
        $this->assertRegExp('/visualization\\.CandlestickChart/', $content);
    }

}
