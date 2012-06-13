<?php

class IndexController extends Zend_Controller_Action
{

    public function init() {}

    public function indexAction()
    {
        // action body

        $serviceKey = $this->_request->getParam("service");
        if (!$serviceKey) {
            $serviceKey = "db";
        }
        $this->view->serviceKey = $serviceKey;
        $this->view->service = $this->_helper->dic()->getService($serviceKey);

        $propertyKey = $this->_request->getParam("property");
        if (!$propertyKey) {
            $propertyKey = "dbname";
        }
        $this->view->propertyKey = $propertyKey;
        $this->view->property = $this->_helper->dic()->getProperty($propertyKey);

        $this->view->confFile = file_get_contents(realpath(APPLICATION_PATH . '/../application/configs/di.conf.json'));
    }


}

