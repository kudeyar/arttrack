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
        $adminService = new Application_Model_Admin();
        //$this->view->tells = $adminService->getTells();
        //$this->view->commerce = $adminService->getCommerce();
        //$this->view->support = $adminService->getSupport();
        $this->view->cities = $adminService->getCities();
        $this->view->news = $adminService->getNews();

        if ($this->getParam('addcity')) {
            $name = trim(htmlspecialchars($this->getParam('name')));
            $addres = trim(htmlspecialchars($this->getParam('addres')));
            $phone = trim(htmlspecialchars($this->getParam('phone')));
            $email = trim(htmlspecialchars($this->getParam('email')));
            $yandex = trim(htmlspecialchars($this->getParam('yandex')));
            if ($name != '' or $addres != '' or $phone != '' or $email != '' or $yandex != '') {
                $result = $adminService->addCity($name, $addres, $phone, $email, $yandex);
                return $this->_helper->json(array('result' => $result));
            } else {
                return FALSE;
            }
        }
        
        if (isset($_POST['addnews'])) {
            $title = trim(htmlspecialchars($_POST['title']));
            $text = trim(htmlspecialchars($_POST['text']));
            $img_n = $_FILES['img']['name'];
            if ($img_n != '') {
                $put = "./img/news/";
                $img = $put . basename($_FILES['img']['name']);
                copy($_FILES['img']['tmp_name'], $img);
            }
            if ($title != '' or $text != '') {
                $result = $adminService->addNews($title, $text, $img_n);
                echo "<script language='javascript'>location.href='/admin/users/'</script>";
//                return $this->_helper->json(array('result' => $result));
            } else {
                return FALSE;
            }
        }
        
        if ($this->getParam('deletenews')){
            $id = $this->getParam('id_news');
            $adminService->deleteNews($id);
        }
    }

}
