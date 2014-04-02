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
        $this->view->news = $adminService->getNews();
        
        if ($this->getParam('addcity')){
            $name  = trim(htmlspecialchars($this->getParam('name')));
            $addres  = trim(htmlspecialchars($this->getParam('addres')));
            $phone  = trim(htmlspecialchars($this->getParam('phone')));
            $email = trim(htmlspecialchars($this->getParam('email')));
            $yandex  = trim(htmlspecialchars($this->getParam('yandex')));
            if ($name != '' or $addres!='' or $phone != '' or $email != '' or $yandex != '') {
                $result = $adminService->addCity($name, $addres, $phone, $email, $yandex);
                return $this->_helper->json(array('result' => $result));
            } else {
                return FALSE;
            }
        }
        
        if ($this->getParam('addnews')){
            $title  = trim(htmlspecialchars($this->getParam('title')));
            $text  = trim(htmlspecialchars($this->getParam('text')));
            $img = $this->getParam('img');
            if ($title != '' or $text!='') {
                $result = $adminService->addNews($title, $text, $img);
                return $this->_helper->json(array('result' => $result));
            } else {
                return FALSE;
            }
        }
    }

}
