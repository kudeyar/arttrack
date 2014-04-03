<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $news = new Application_Model_Index();
        $this->view->news = $news->getNews();
    }
    
    public function newsAction()
    {
        $news = new Application_Model_Index();
        $this->view->news = $news->getNews();
    }
    
    public function cityAction()
    {
        $this->_helper->layout->disableLayout();
        $city = new Application_Model_Index();
        $this->view->city = $city->getCities();
        $name_city = isset($_COOKIE['id_city']) ? $_COOKIE['id_city'] : 1;
        $this->view->info_city = $city->getCity($name_city);
    }

    public function dillersAction()
    {
        // action body
    }
    
    public function contactsAction()
    {
        $this->_helper->layout->disableLayout();
        $city = new Application_Model_Index();
        $name_city = isset($_COOKIE['id_city']) ? $_COOKIE['id_city'] : 1;
        $this->view->info_city = $city->getCity($name_city);
    }

    public function supportAction()
    {
        $sendsupport = new Application_Model_Index();
        if ($this->getParam('support')) {
            $name  = trim(htmlspecialchars($this->getParam('name')));
            $phone  = trim(htmlspecialchars($this->getParam('phone')));
            $email = trim(htmlspecialchars($this->getParam('email')));
            $comment  = trim(htmlspecialchars($this->getParam('comment')));
            if ($name != '' or $phone != '' or $email != '' or $comment != '') {
                $sendsupport->sendSupport($name, $phone, $email, $comment);
            } else {
                return FALSE;
            }
        }
    }

    public function aboutAction()
    {
        $city = new Application_Model_Index();
        $name_city = isset($_COOKIE['id_city']) ? $_COOKIE['id_city'] : 1;
        $this->view->info_city = $city->getCity($name_city);
    }

    public function helpbuttonAction()
    {
        // action body
    }

    public function tellorderAction()
    {
        $this->_helper->layout->disableLayout();
        $telladd = new Application_Model_Index();
        if ($this->getParam('addtell')) {
            $name  = trim(htmlspecialchars($this->getParam('name')));
            $city  = trim(htmlspecialchars($this->getParam('city')));
            $phone = trim(htmlspecialchars($this->getParam('phone')));
            $then  = trim(htmlspecialchars($this->getParam('then')));
            if ($name != '' or $city != '' or $phone != '' or $then != '') {
                $telladd->addTells($name, $city, $phone, $then);
            } else {
                return FALSE;
            }
        }
    }

    public function getcommerceAction()
    {
        $this->_helper->layout->disableLayout();
        $comadd = new Application_Model_Index();
        if ($this->getParam('addcommerce')) {
            $name  = trim(htmlspecialchars($this->getParam('name')));
            $email = trim(htmlspecialchars($this->getParam('email')));
            if ($name != '' or $email != '') {
                $comadd->addCommerce($name, $email);
            } else {
                return FALSE;
            }
        }
    }

}
