<?php

namespace Scopdrag\LaravelGoogleChart\Contracts;

interface Factory {

    public function setId();

    public function getId();

    public function setChartType($type);

    public function getChartType();

    public function setOptions($options);

    public function setCols($cols = []);

    public function getCols();

    public function setRows($rows = []);

    public function render();
}
