<?php

class EquipmentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function softAction()
    {
        // action body
    }

    public function buttonsAction()
    {
        $this->_helper->layout->disableLayout();
        $send = new Application_Model_Index();
        if ($this->getParam('sendcom')) {
            $email    = trim(htmlspecialchars($this->getParam('email')));
            $filename = "./docs/price.pdf"; //Имя файла для прикрепления
            $subject  = "Прайс-лист предоставляемых товаров"; //Тема
            $message  = "Прайс-лист предоставляемых товаров"; //Текст письма
            if ($email != '') {
                $send->sendEmail($email, $subject, $message, $filename);
            } else {
                return FALSE;
            }
        }
    }

    public function trackerAction()
    {
        // action body
    }

    public function tracker1Action()
    {
        // action body
    }

    public function tracker2Action()
    {
        // action body
    }

    public function tracker3Action()
    {
        // action body
    }

    public function tracker4Action()
    {
        // action body
    }

    public function tracker5Action()
    {
        // action body
    }

    public function tracker6Action()
    {
        // action body
    }

    public function tracker7Action()
    {
        // action body
    }

    public function tracker8Action()
    {
        // action body
    }

    public function tracker9Action()
    {
        // action body
    }

    public function tracker10Action()
    {
        // action body
    }

    public function dutAction()
    {
        // action body
    }

    public function mayakAction()
    {
        // action body
    }

    public function kursoroukazatelAction()
    {
        // action body
    }

    public function tachographAction()
    {
        // action body
    }

    public function optionsAction()
    {
        // action body
    }

    public function dut1Action()
    {
        // action body
    }

    public function dut2Action()
    {
        // action body
    }

    public function dut3Action()
    {
        // action body
    }

    public function kursoroukazatel1Action()
    {
        // action body
    }

    public function kursoroukazatel2Action()
    {
        // action body
    }

    public function kursoroukazatel3Action()
    {
        // action body
    }

    public function mayak1Action()
    {
        // action body
    }

    public function mayak2Action()
    {
        // action body
    }

    public function mayak3Action()
    {
        // action body
    }

    public function tachograph1Action()
    {
        // action body
    }

    public function tachograph2Action()
    {
        // action body
    }

    public function tachograph3Action()
    {
        // action body
    }

    public function options1Action()
    {
        // action body
    }

    public function options2Action()
    {
        // action body
    }

    public function options3Action()
    {
        // action body
    }

    public function options4Action()
    {
        // action body
    }

    public function options5Action()
    {
        // action body
    }

}
