<?php

class Application_Model_Admin
{

    /**
     * 
     * @return type
     * получаем заказы на обратный звонок
     */
    public function getTells()
    {
        $getTells = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `tells` ORDER BY datetime DESC");
        return $getTells;
    }
    
    public function getCommerce()
    {
        $getCommerce = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `commerce_pred` ORDER BY datetime DESC");
        return $getCommerce;
    }
    
    public function getSupport()
    {
        $getSupport = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `support` ORDER BY datetime DESC");
        return $getSupport;
    }
    
    public function getCities()
    {
        $getCities = Zend_Db_Table::getDefaultAdapter()->fetchAll("SELECT * FROM `cities` ORDER BY id");
        return $getCities;
    }
    
    public function addCity($name, $addres, $phone, $email, $yandex) {
        $table = new Application_Model_CitiesMapper();

        $data = array(
            'name' => $name,
            'addres' => $addres,
            'phone' => $phone,
            'email' => $email,
            'yandex' => $yandex
        );

        $table->insert($data);
        return Zend_Db_Table::getDefaultAdapter()->lastInsertId('cities');
    }

}

?>