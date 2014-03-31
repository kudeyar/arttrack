<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout->disableLayout();
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function usersAction()
    {
        $adminService         = new Application_Model_Admin();
        $this->view->tells    = $adminService->getTells();
        $this->view->commerce = $adminService->getCommerce();
        $this->view->support = $adminService->getSupport();
        $this->view->cities = $adminService->getCities();
    }

}
