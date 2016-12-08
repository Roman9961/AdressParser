<?php


class Router
{
    protected  $uri;
    protected $controller;
    protected $action;
    protected  $params;


    public function __construct( $uri )
    {
        $this->uri = urldecode( trim( $uri,'/' ) );

        //Set Defaults
        $this->action='index';
        $this->controller = 'pages';

        //Get path like /lng/controllers/action/param1/param2/.../...

        $path=$this->uri;
        $path_parts=explode( '/',$path );

        if ($path_parts){

            //Get  controller
            if ( current( $path_parts )){
                $this->controller=strtolower(current( $path_parts ));
                array_shift($path_parts);
            }

            //Get  action
            if ( current( $path_parts )){
                $this->action=strtolower(current( $path_parts ));
                array_shift($path_parts);
            }

            //Get params
            $this->params=$path_parts;

        }

    }


    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }




}