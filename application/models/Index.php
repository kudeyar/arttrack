<?php

class Application_Model_Index
{

    /**
     * 
     * @param type $name
     * @param type $city
     * @param type $phone
     * @param type $then
     * отправка запроса на заказ звонокa
     */
    public function addTells($name, $city, $phone, $then)
    {
        $table = new Application_Model_TellsMapper();

        $data = array(
            'name'  => $name,
            'city'  => $city,
            'phone' => $phone,
            'when'  => $then
        );

        $table->insert($data);
    }

    /**
     * 
     * @param type $name
     * @param type $email
     * отправка заявки на комм. предложение
     */
    public function addCommerce($name, $email)
    {
        $table = new Application_Model_CommerceMapper();

        $data = array(
            'name'  => $name,
            'email' => $email
        );

        $table->insert($data);
    }

    /**
     * 
     * @param type $name
     * @param type $phone
     * @param type $email
     * @param type $comment
     * отправка сообщения в тех поддержку
     */
    public function sendSupport($name, $phone, $email, $comment)
    {
        $table = new Application_Model_SupportMapper();

        $data = array(
            'name'    => $name,
            'phone'   => $phone,
            'email'   => $email,
            'comment' => $comment
        );

        $table->insert($data);
    }

    public function getCities()
    {
        $getCities = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `cities` ORDER BY id");
        return $getCities;
    }

    public function getCity($id)
    {
        $getCity = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `cities` WHERE id={$id}");
        return $getCity;
    }

    public function getNews()
    {
        $getNews = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `news` ORDER BY id DESC");
        return $getNews;
    }

    public function getNewsInfo($id)
    {
        $getNews = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `news` WHERE id = {$id}");
        return $getNews;
    }

    function bb_tags($text)
    {
        // Создаем массив bb-тегов 
        $bb  = array(
            '[B]',
            '[/B]',
            '[I]',
            '[/I]',
            '[H1]',
            '[/H1]',
            '[H2]',
            '[/H2]',
            '[H3]',
            '[/H3]',
            '[P]',
            '[/P]',
            '[UL]',
            '[/UL]',
            '[LI]',
            '[/LI]',
        );
        // Создаем массив тегов HTML 
        $tag = array(
            '<b>',
            '</b>',
            '<i>',
            '</i>',
            '<h1>',
            '</h1>',
            '<h2>',
            '</h2>',
            '<h3>',
            '</h3>',
            '<p>',
            '</p>',
            '<ul class="marker">',
            '</ul>',
            '<li>',
            '</li>',
        );
        // Заменяем элемент первого на элемент второго массива соответственно                 
        return str_ireplace($bb, $tag, $text);
    }

    public function sendEmail($email, $subject, $message, $filename)
    {
//        $filename = $filename; //Имя файла для прикрепления
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
    }

}

?>