<?php
namespace Scopdrag\LaravelGoogleChart\Facades;
use Illuminate\Support\Facades\Facade;
 
class ChartFacade extends Facade
{
     
    protected static function getFacadeAccessor()
    {
        return 'Scopdrag\LaravelGoogleChart\Contracts\Factory';
    }
}