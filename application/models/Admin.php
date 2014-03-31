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

}

?>