<?php


class App
{
    protected  static  $router;

    public static function getRouter()
    {
        return self::$router;
    }

    public  static  function run( $uri ){

        self::$router = new Router( $uri );

        // Define conreoller and controller's method
        $controller_class = ucfirst( self::$router->getController(). 'Controller' );
        $controller_method = ucfirst( self::$router->getAction() );

        //Calling controllers's method
        $controller_object = new $controller_class();

        //Content render
        if( method_exists ( $controller_object, $controller_method ) ){
            $view_path = $controller_object->$controller_method();
            $view_object = new View( $controller_object->getData(), $view_path );
            $content = $view_object->render();
        }

        else {
            throw new Exception('Method ' . $controller_method . ' of class ' . $controller_class . ' does not exist.');
        }

        // Template render
        $layout_path = VIEWS_PATH.DS.$controller_method.'.html';
        $layout_view_object = new View( compact('content'), $layout_path );
        echo $layout_view_object->render();
    }
}