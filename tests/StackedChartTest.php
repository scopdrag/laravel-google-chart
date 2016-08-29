<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StackedChartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
         $cols = $options = [
                    'width' => 600, 
                    'width' => 400,  
                    'legend' => ['position' => 'top', 'maxLines' => 3],
                    'bars' => ['groupWidth' => '75%'],
                    'isStacked' => TRUE
                ];




                $cols = ['Date', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
                    'Western', 'Literature', ['role' => 'annotation']];
                $rows = [
                    ['2010', 10, 24, 20, 32, 18, 5, ''],
                    ['2020', 16, 22, 23, 30, 16, 9, ''],
                    ['2030', 28, 19, 29, 30, 12, 13, '']
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
