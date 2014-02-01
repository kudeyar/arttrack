<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
     protected function _initRoutes()
    {
        return;
    }
	
    protected function _initPa()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Application',
            'basePath' => APPLICATION_PATH,
        ));
    }

}

