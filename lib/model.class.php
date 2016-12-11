<?php

class Model
{
    protected $csv;

    public function __construct()
    {
        $this->csv = App::$csv;

    }


}