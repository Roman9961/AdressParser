<?php
spl_autoload(function($class_name)
{
    $controllers_path=ROOT.DS.'controllers'.DS.str_replace('controller', '', strtolower($class_name)).'.controller.php';
    $model_path=ROOT.DS.'models'.DS.strtolower($class_name).'.php';

    if (file_exists($controllers_path)){
        require_once ($controllers_path);
    }
    elseif (file_exists($model_path)){
        require_once ($model_path);
    }
    else{
        throw new Exception('Failed to include class: '. $class_name);
    }
}
);