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
    
    public function addCommerce($name, $email) {
        $table = new Application_Model_CommerceMapper();

        $data = array(
            'name' => $name,
            'email' => $email
        );

        $table->insert($data);
    }
    
}

?>