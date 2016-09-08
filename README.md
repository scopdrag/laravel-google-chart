# laravel-google-chart

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]


This package offers simple and easy integration of google charts with laravel .

##Features: 
-Fast and simple . Also you can provide Google chart options to documneted on google Chart API by creating a multidiemsional PHP array.
- Multiple Chart of same and different types can be loaded on same page. 

Credit: Thanks to google chart API

Chats introduced:

- Bar Chart
- Bubble Chart
- Candlestick Chart
- Combo Chart
- Piechart Chart
- Scatter Chart
- Stepped Area Chart
- Tree Map Chart
- Word Tree Chart 



## Install

Via Composer

``` bash
$ composer require scopdrag/laravel-google-chart
```
Use this command to publish charts views.

``` bash
$ php artisan vendor:publish
```



Registering provider

Add following line to you config/app.php providers array
```

Scopdrag\LaravelGoogleChart\LaravelGoogleChartServiceProvider::class,

```

 

## Usage
Use this code in your controller file and pass cols, rows and options to view

Add Google chart loader script file in <head> tag of you webpage

```
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
```



``` php
$options = [
                    'title' => 'Population of Largest U.S. Cities',
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

```
Use this in your Views/balade File 

```
                 {!!ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                     ->render()!!}
```


## OR You can directly use in view file
Use this code on your views/blade  file
``` php
$options = [
                    'title' => 'Population of Largest U.S. Cities',
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


                echo ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render();
```






##Bar chart
``` php
                 
                
                $options = [
                    'title' => 'Population of Largest U.S. Cities',
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

```

blade.php file code

```
                 {!!ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                     ->render()!!}
                 
```


##Coloring bar chart
``` php
                $options = [
                    'title' => 'Population of Largest U.S. Cities',
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

                $cols = ['City', '2010 Population', '2000 PopulaÎtions', ['role' => 'style']];
                $rows = [
                    ['New York City, NY', 8175000, 8008000, '#b87333'],
                    ['Los Angeles, CA', 3792000, 3694000, 'silver'],
                    ['Chicago, IL', 2695000, 2896000, 'gold'],
                    ['Houston, TX', 2099000, 1953000, 'color: #e5e4e2'],
                    ['Philadelphia, PA', 1526000, 1517000, 'color: #e5e4e2']
                ];
```

.blade.php file code
                
```
                {!!ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}
```


                 

##Stacaked Bar Chart
``` php
                $options = [
                    'width' => 800,
                    'height' => 400,
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

```

.blade.php code
```
                {!!ChartManager::setChartType('bar-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}
```


##Bubble Chart

``` php
                $cols = ['ID', 'Life Expectancy', 'Fertility Rate', 'Region', 'Population'];
                $rows = [
                    ['CAN', 80.66, 1.67, 'North America', 33739900],
                    ['DEU', 79.84, 1.36, 'Europe', 81902307],
                    ['DNK', 78.6, 1.84, 'Europe', 5523095],
                    ['EGY', 72.73, 2.78, 'Middle East', 79716203],
                    ['GBR', 80.05, 2.00, 'Europe', 61801570],
                    ['IRN', 72.49, 1.7, 'Middle East', 73137148],
                    ['IRQ', 68.09, 4.77, 'Middle East', 31090763],
                    ['ISR', 81.55, 2.96, 'Middle East', 7485600],
                    ['RUS', 68.6, 1.54, 'Europe', 141850000],
                    ['USA', 78.09, 2.05, 'North America', 307007000]
                ];


                $options = [
                    'title' => 'Correlation between life expectancy, fertility rate and population of some world countries (2010)',
                    'hAxis' => [
                        'title' => 'Life Expectancy',
                    ],
                    'vAxis' => [
                        'title' => 'Fertility Rate'
                    ],
                    'bubble' => 'horizontal', //required if using material chart
                    'bubble' => [
                        'textStyle' => ['fontSize' => 11]
                    ]
                ];
```

.blade.php file code

```
                {!!ChartManager::setChartType('bubble-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}
```




##Candlestick charts
``` php

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


                $cols =[];

```

.blade.php file code


```
               {!!ChartManager::setChartType('candlestick-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}

```        




##Waterfall charts

``` php
                $rows = [
                    ['Mon', 20, 28, 38, 45],
                    ['Tue', 31, 38, 55, 66],
                    ['Wed', 50, 55, 77, 80],
                    ['Thu', 77, 77, 66, 50],
                    ['Fri', 68, 66, 22, 15]
                ];


                $options = [
                    'legend' => 'none',
                    'bar' => [
                        'groupWidth' => '100%', // Draw a trendline for data series 0.
                    ],
                    'candlestick' => [
                        'fallingColor' => ['strokeWidth' => 0, 'fill' => '#a52714'],
                        'risingColor' => ['strokeWidth' => 0, 'fill' => '#0f9d58'],
                    ]
                ];

                $cols=[];
```


.blade.php code   

```
                {!!ChartManager::setChartType('candlestick-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}

```








##Combo Chart

``` php
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
```
                

.blade.php file code

```
                {!!ChartManager::setChartType('combo-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}
```




##Pie Chart
               
``` php
                $cols = ['Major', 'Degrees'];
                $rows = [
                    ['Business', 256070], ['Education', 108034],
                    ['Social Sciences & History', 127101], ['Health', 81863],
                    ['Psychology', 74194]
                ];
                $options = [
                    'pieSliceText' => 'none',
                ];

                $cols =[];

```

.blade.php file code

```
                {!!ChartManager::setChartType('piechart-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}
```



##3D Pie Chart
``` php
                $cols = ['Major', 'Degrees'];
                $rows = [
                    ['Business', 256070], ['Education', 108034],
                    ['Social Sciences & History', 127101], ['Health', 81863],
                    ['Psychology', 74194]
                ];
                $options = [
                    'pieSliceText' => 'none',
                    'title' => 'My Daily Activities',
                    'is3D' => true,
                ];

```

.blade.php file code

```


                {!!ChartManager::setChartType('piechart-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}
```


##ScatterChart

``` php
                $cols = ['Age', 'Weight'];
                $rows = [
                    [ 8, 12],
                    [ 4, 5.5],
                    [ 11, 14],
                    [ 4, 5],
                    [ 3, 3.5],
                    [ 6.5, 7]
                ];


                $options = [
                    'title' => 'Age vs. Weight comparison',
                    'hAxis' => [
                        'title' => 'Age',
                        'minValue' => 0,
                        'maxValue' => 15
                    ],
                    'vAxis' => [
                        'title' => 'Weight',
                        'minValue' => 0,
                        'maxValue' => 15
                    ],
                    'legend' => 'none',
                ];
```

.blade.php file code 

```
                {!!ChartManager::setChartType('scatter-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}

```        


##Stepped Chart
``` php
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

```
.blade.php file code

```
                {!!ChartManager::setChartType('steppedarea-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}

```

##Tree Map Charts

``` php
                $cols = ['Location', 'Parent', 'Market trade volume (size)', 'Market increase/decrease (color)'];
                $rows = [
                    ['Global', null, 0, 0],
                    ['America', 'Global', 0, 0],
                    ['Europe', 'Global', 0, 0],
                    ['Asia', 'Global', 0, 0],
                    ['Australia', 'Global', 0, 0],
                    ['Africa', 'Global', 0, 0],
                    ['Brazil', 'America', 11, 10],
                    ['USA', 'America', 52, 31],
                    ['Mexico', 'America', 24, 12],
                    ['Canada', 'America', 16, -23],
                    ['France', 'Europe', 42, -11],
                    ['Germany', 'Europe', 31, -2],
                    ['Sweden', 'Europe', 22, -13],
                    ['Italy', 'Europe', 17, 4],
                    ['UK', 'Europe', 21, -5],
                    ['China', 'Asia', 36, 4],
                    ['Japan', 'Asia', 20, -12],
                    ['India', 'Asia', 40, 63],
                    ['Laos', 'Asia', 4, 34],
                    ['Mongolia', 'Asia', 1, -5],
                    ['Israel', 'Asia', 12, 24],
                    ['Iran', 'Asia', 18, 13],
                    ['Pakistan', 'Asia', 11, -52],
                    ['Egypt', 'Africa', 21, 0],
                    ['S. Africa', 'Africa', 30, 43],
                    ['Sudan', 'Africa', 12, 2],
                    ['Congo', 'Africa', 10, 12],
                    ['Zaire', 'Africa', 8, 10]
                ];


                $options = [
                    'minColor' => '#f00',
                    'midColor' => '#ddd',
                    'maxColor' => '#0d0',
                    'headerHeight' => 15,
                    'fontColor' => 'black',
                    'showScale' => TRUE
                ];
```

.blade.php

```
                

                {!!ChartManager::setChartType('treemap-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}

```

##Scatter Chart
``` php
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
```

                 
.blade.php file code

```
                {!!ChartManager::setChartType('scatter-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}

```



##Word tree charts
``` php
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

```
.blade.php file code

```
               {!!ChartManager::setChartType('wordtree-chart')
                        ->setOptions($options)
                        ->setCols($cols)
                        ->setRows($rows)
                        ->render()!!}
```
                





 
Arguements for 'setChartType()' can be following depending upon requirements.
```
 - 'bar-chart'
 - 'bubble-chart'
 - 'candlestick-chart'
 - 'combo-chart'
 - 'piechart-chart'
 - 'scatter-chart'
 - 'steppedarea-chart'
 - 'treemap-chart'
 - 'wordtree-chart'
```
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ ./vendor/bin/phpunit
```


 
## Credits

- Thanks to Google Chart API

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Scopdrag/laravel-google-chart.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Scopdrag/laravel-google-chart/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Scopdrag/laravel-google-chart.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Scopdrag/laravel-google-chart
[link-travis]: https://travis-ci.org/Scopdrag/laravel-google-chart
[link-downloads]: https://packagist.org/packages/Scopdrag/laravel-google-chart
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
# laravel-google-chart
