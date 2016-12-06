<?php


class Controller
{
    protected $data;
    protected $model;
    protected $params;


    public function __construct($data=array())
    {
        $this->data = $data;
    }


    public function getData()
    {
        return $this->data;
    }


    public function getModel()
    {
        return $this->model;
    }


    public function getParams()
    {
        return $this->params;
    }


}