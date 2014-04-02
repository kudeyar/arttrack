<?php

class Application_Model_Index {
/**
 * 
 * @param type $name
 * @param type $city
 * @param type $phone
 * @param type $then
 * отправка запроса на заказ звонокa
 */
    public function addTells($name, $city, $phone, $then) {
        $table = new Application_Model_TellsMapper();

        $data = array(
            'name' => $name,
            'city' => $city,
            'phone' => $phone,
            'when' => $then
        );

        $table->insert($data);
    }
    /**
     * 
     * @param type $name
     * @param type $email
     * отправка заявки на комм. предложение
     */
    public function addCommerce($name, $email) {
        $table = new Application_Model_CommerceMapper();

        $data = array(
            'name' => $name,
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
    public function sendSupport($name, $phone, $email, $comment) {
        $table = new Application_Model_SupportMapper();

        $data = array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'comment' => $comment
        );

        $table->insert($data);
    }
    
    public function getCities(){
        $getCities = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `cities` ORDER BY id");
        return $getCities;
    }
    
}

?>