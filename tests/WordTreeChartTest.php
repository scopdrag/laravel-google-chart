<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WordTreeChartTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $cols = ['Phrases'];
        $rows = [
            ['cats are better than dogs'],
            ['cats eat kibble'],
            ['cats are better than hamsters'],
            ['cats are awesome'],
            ['cats are people too'],
            ['cats eat mice'],
            ['cats meowing'],
            ['cats in the cradle'],
            ['cats eat mice'],
            ['cats in the cradle lyrics'],
            ['cats eat kibble'],
            ['cats for adoption'],
            ['cats are family'],
            ['cats eat mice'],
            ['cats are better than kittens'],
            ['cats are evil'],
            ['cats are weird'],
            ['cats eat mice'],
        ];

        $options = [
            'wordtree' => ['format' => 'implicit', 'word' => 'cats']
        ];


        $chartManager = ChartManager::setChartType('wordtree-chart')
                ->setOptions($options)
                ->setCols($cols)
                ->setRows($rows);

        $content = $chartManager->render();

        $this->assertEquals('wordtree-chart', $chartManager->getChartType());
        $this->assertRegExp('/visualization\\.WordTree/', $content);
    }

}
