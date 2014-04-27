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
            $filename = "./docs/priceANDcommerce.zip"; //Имя файла для прикрепления
            $subject  = "Прайс-лист предоставляемых товаров"; //Тема
            $message  = "Благодарим Вас за интерес, проявленный к нашей компании!<br />
			Во вложении Вы можете ознакомиться с информацией о компании и ценах.<br />
			Для составления более точного расчета цены и сроков поставки, Вы можете уточнить по единому номеру 8 (800) 500 17 14<br />
			<br /><br />
			С уважением, Группа компаний 'АРТ-ТРЭК' <br />
			Тел.: (8652) 92-17-14<br />
			8-800-500-17-14<br />
			г. Ставрополь, ул. Гражданская, д. 8<br />
			E-mail: info@art-track.ru<br />
			www.art-track.ru<br />
			"; //Текст письма
            if ($email != '') {
                $to       = $email; //Кому
                $from     = "info@art-track.ru"; //От кого
//        $subject  = "Коммерческое предложение"; //Тема
//        $message  = "Коммерческое предложение"; //Текст письма
                $boundary = "---"; //Разделитель
                /* Заголовки */
                $headers  = "From: $from\nReply-To: $from\n";
                $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
                $body     = "--$boundary\n";
                /* Присоединяем текстовое сообщение */
                $body .= "Content-type: text/html; charset='utf-8'\n";
                $body .= "Content-Transfer-Encoding: quoted-printablenn";
                $body .= "Content-Disposition: attachment; filename==?utf-8?B?" . base64_encode($filename) . "?=\n\n";
                $body .= $message . "\n";
                $body .= "--$boundary\n";
                $file     = fopen($filename, "r"); //Открываем файл
                $text     = fread($file, filesize($filename)); //Считываем весь файл
                fclose($file); //Закрываем файл
                /* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
                $body .= "Content-Type: application/octet-stream; name==?utf-8?B?" . base64_encode($filename) . "?=\n";
                $body .= "Content-Transfer-Encoding: base64\n";
                $body .= "Content-Disposition: attachment; filename==?utf-8?B?" . base64_encode($filename) . "?=\n\n";
                $body .= chunk_split(base64_encode($text)) . "\n";
                $body .= "--" . $boundary . "--\n";
                mail($to, $subject, $body, $headers); //Отправляем письмо
            } else {
                return FALSE;
            }
        }
        
        if ($this->getParam('sendbuy')) {
            $name    = trim(htmlspecialchars($this->getParam('name')));
            $phone   = trim(htmlspecialchars($this->getParam('phone')));
            $count   = trim(htmlspecialchars($this->getParam('count')));
            $city = trim(htmlspecialchars($this->getParam('city')));
            $tovar1 = trim(htmlspecialchars($this->getParam('tovar')));
			$tovar = str_replace('&lt;br&gt;', '', $tovar1);
            if ($name != '' or $phone != '' or $count != '' or $city != '') {
//                $sendsupport->sendSupport($name, $phone, $email, $comment);
                $to      = "info@art-track.ru";
                $subject = "Заказ товара";
                $message = " 
                        <html> 
                            <head> 
                                <title>Заказ товара: {$tovar}</title> 
                            </head> 
                            <body> 
                                <p>
                                    Имя: {$name} <br />
                                    Телефон: {$phone} <br />
                                    Город: {$city}  <br />
                                    Товар: {$tovar}  <br />
                                    Количество: {$count}
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

    public function dut4Action()
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
