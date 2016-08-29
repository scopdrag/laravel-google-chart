<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SteppedAreaChartTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $cols = ['Director (Year)', 'Rotten Tomatoes', 'IMDB'];
        $rows = [
            ['Alfred Hitchcock (1935)', 8.4, 7.9],
            ['Ralph Thomas (1959)', 6.9, 6.5],
            ['Don Sharp (1978)', 6.5, 6.4],
            ['James Hawes (2008)', 4.4, 6.2]
        ];


        $options = [
            'title' => 'The decline of \'The 39 Steps\'',
            'hAxis' => [
                'title' => 'Accumulated Rating',
            ],
            'isStacked' => 'true',
        ];

        $chartManager = ChartManager::setChartType('steppedarea-chart')
                ->setOptions($options)
                ->setCols($cols)
                ->setRows($rows);

        $content = $chartManager->render();

        $this->assertEquals('steppedarea-chart', $chartManager->getChartType());
        $this->assertRegExp('/visualization\\.SteppedAreaChart/', $content);
    }

}
