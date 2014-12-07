<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $news             = new Application_Model_Index();
        $this->view->news = $news->getNews();
    }

    public function newsAction()
    {
        $news             = new Application_Model_Index();
        $this->view->news = $news->getNews();
    }

    public function newsinfoAction()
    {
        $news                 = new Application_Model_Index();
        $id_news              = $this->getParam('id');
        $this->view->newsinfo = $news->getNewsInfo($id_news);
    }

    public function cityAction()
    {
        $this->_helper->layout->disableLayout();
        $city                  = new Application_Model_Index();
        $this->view->city      = $city->getCities();
        $name_city             = isset($_COOKIE['id_city']) ? $_COOKIE['id_city'] : 1;
        $this->view->info_city = $city->getCity($name_city);
    }

    public function dillersAction()
    {
        // action body
    }

    public function contactAction()
    {
        $city                  = new Application_Model_Index();
        $name_city             = isset($_COOKIE['id_city']) ? $_COOKIE['id_city'] : 1;
        $this->view->info_city = $city->getCity($name_city);
    }

    public function contactsAction()
    {
        $this->_helper->layout->disableLayout();
        $city                  = new Application_Model_Index();
        $name_city             = isset($_COOKIE['id_city']) ? $_COOKIE['id_city'] : 1;
        $this->view->info_city = $city->getCity($name_city);
    }

    public function supportAction()
    {
        $sendsupport = new Application_Model_Index();
        if ($this->getParam('support')) {
            $name    = trim(htmlspecialchars($this->getParam('name')));
            $phone   = trim(htmlspecialchars($this->getParam('phone')));
            $email   = trim(htmlspecialchars($this->getParam('email')));
            $comment = trim(htmlspecialchars($this->getParam('comment')));
            if ($name != '' or $phone != '' or $email != '' or $comment != '') {
//                $sendsupport->sendSupport($name, $phone, $email, $comment);
                $to      = "info@art-track.ru";
                $subject = "Обратная связь";
                $message = " 
                        <html> 
                            <head> 
                                <title>Раздел Тех. поддержка</title> 
                            </head> 
                            <body> 
                                <p>
                                    Имя: {$name} <br />
                                    Телефон: {$phone} <br />
                                    Email: {$email}  <br />
                                    Сообщение: {$comment}
                                </p> 
                            </body> 
                        </html>";

                $headers = "Content-type: text/html; charset=utf-8 \r\n";

                mail($to, $subject, $message, $headers);
            } else {
                return FALSE;
            }
        }
    }

    public function aboutAction()
    {
        
    }

    public function helpbuttonAction()
    {
        // action body
    }

    public function tellorderAction()
    {
        $this->_helper->layout->disableLayout();
//        $telladd = new Application_Model_Index();
        if ($this->getParam('addtell')) {
            $name  = trim(htmlspecialchars($this->getParam('name')));
            $city  = trim(htmlspecialchars($this->getParam('city')));
            $phone = trim(htmlspecialchars($this->getParam('phone')));
            $then  = trim(htmlspecialchars($this->getParam('then')));
            if ($name != '' or $city != '' or $phone != '' or $then != '') {
//                $telladd->addTells($name, $city, $phone, $then);

                $to      = "info@art-track.ru";
                $subject = "Заказать звонок";
                $message = " 
                        <html> 
                            <head> 
                                <title>Функция Заказать звонок</title> 
                            </head> 
                            <body> 
                                <p>
                                    Имя: {$name} <br />
                                    Город: {$city} <br />
                                    Телефон: {$phone} <br />
                                    Когда звонить: {$then} 
                                </p> 
                            </body> 
                        </html>";

                $headers = "Content-type: text/html; charset=utf-8 \r\n";

                mail($to, $subject, $message, $headers);
            } else {
                return FALSE;
            }
        }
    }

    public function getcommerceAction()
    {
        $this->_helper->layout->disableLayout();
        $send = new Application_Model_Index();
//        $comadd = new Application_Model_Index();
        if ($this->getParam('addcommerce')) {
            $name     = trim(htmlspecialchars($this->getParam('name')));
            $email    = trim(htmlspecialchars($this->getParam('email')));
            $filename = "./docs/priceANDcommerce.zip"; //Имя файла для прикрепления
            $subject  = "Коммерческое предложение"; //Тема
            $message  = "Благодарим Вас за интерес, проявленный к нашей компании!<br />
			Во вложении Вы можете ознакомиться с информацией о компании и ценах.<br />
			Для составления более точного расчета цены и сроков поставки, Вы можете уточнить по единому номеру 8 (800) 500 17 14<br />
			<br /><br />
			С уважением, Группа компаний 'АРТ-ТРЭК' <br />
			Тел.: (8652) 92-17-14<br />
			8-800-500-17-14<br />
			г. Ставрополь, ул. Гражданская, д. 8<br />
			E-mail: info@art-track.ru<br />
			www.art-track.ru<br />"; //Текст письма
            if ($name != '' or $email != '') {
//                $comadd->addCommerce($name, $email);
                $send->sendEmail($email, $subject, $message, $filename);
            } else {
                return FALSE;
            }
        }
    }
    
    public function hbutton1Action()
    {
        // action body
    }
    
    public function hbutton2Action()
    {
        // action body
    }
    
    public function hbutton3Action()
    {
        // action body
    }
    
    public function hbutton4Action()
    {
        // action body
    }
    
    public function hbutton5Action()
    {
        // action body
    }
    
    public function payAction()
    {
        // action body
    }

}
