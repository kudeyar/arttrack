<?php

class UslugiController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function uslugiAction()
    {
        // action body
    }

    public function kontroltoplivaAction()
    {
        // action body
    }

    public function glonassAction()
    {
        // action body
    }

    public function gpsAction()
    {
        // action body
    }

    public function slezhenieAction()
    {
        // action body
    }

    public function retranslyatorAction()
    {
        if ($this->getParam('addtrans')) {
            $fio = trim(htmlspecialchars($this->getParam('fio')));
            $company = trim(htmlspecialchars($this->getParam('company')));
            $otrasl = trim(htmlspecialchars($this->getParam('otrasl')));
            $count_ts = trim(htmlspecialchars($this->getParam('count_ts')));
            $city = trim(htmlspecialchars($this->getParam('city')));
            $phone = trim(htmlspecialchars($this->getParam('phone')));
            $email = trim(htmlspecialchars($this->getParam('email')));
            if ($fio != '' or $city != '' or $phone != '' or $email != '' or $company != '') {
//                $telladd->addTells($name, $city, $phone, $then);

                $to = "info@art-track.ru";
                $subject = "Функция ретранслятор";
                $message = " 
                        <html> 
                            <head> 
                                <title>Функция ретранслятор</title> 
                            </head> 
                            <body> 
                                <p>
                                    Имя: {$fio} <br />
                                    Компания: {$company} <br />
                                    Отрасль: {$otrasl} <br />
                                    Кол-во ТС: {$count_ts} <br />
                                    Город: {$city} <br />
                                    Телефон: {$phone} <br />
                                    Email: {$email} 
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

}
