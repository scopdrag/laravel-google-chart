<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComboChartTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $cols = ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'];
        $rows = [
            ['2004/05', 165, 938, 522, 998, 450, 614.6],
            ['2005/06', 135, 1120, 599, 1268, 288, 682],
            ['2006/07', 157, 1167, 587, 807, 397, 623],
            ['2007/08', 139, 1110, 615, 968, 215, 609.4],
            ['2008/09', 136, 691, 629, 1026, 366, 569.6]
        ];

        $options = [
            'title' => 'Monthly Coffee Production by Country',
            'hAxis' => [
                'title' => 'Cups',
            ],
            'vAxis' => [
                'title' => 'Month'
            ],
            'seriesType' => 'bars', //required if using material chart
            'series' => [
                '5' => ['type' => 'line']
            ]
        ];

        $chartManager =  ChartManager::setChartType('combo-chart')
                ->setOptions($options)
                ->setCols($cols)
                ->setRows($rows);

        $content = $chartManager->render();

        $this->assertEquals('combo-chart', $chartManager->getChartType());
        $this->assertRegExp('/visualization\\.ComboChart/', $content);
    }

}
