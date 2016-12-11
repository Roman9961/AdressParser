<?php

class AddressController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);

        require_once ('../models/address.php');
        $this->model = new Address();
    }

    public  function index(){
        $this->data['addresses']= $this->model->getList();
    }

    public function delete()
    {
        if (isset($this->params[0])) {
            $this->model->delete($this->params[0]);

        }

        Router::redirect('/address/');
    }

    public  function edit (){

        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $this->model->save($_POST, $id);
            Router::redirect('/address/');
        }
        if (isset($this->params[0]) ){
            $this->data['addresses']=$this->model->getById($this->params[0]);
        }

    }
    public  function add (){
        if ($_POST) {
            $this->model->save($_POST);

            Router::redirect('/address/');
        }

    }


}