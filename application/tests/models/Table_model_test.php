<?php

class Table_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Tables_model');
        $this->obj = $this->CI->Tables_model;
    }

    public function test_set_and_get_restaurant_name()
    {
        $this->obj->set_restaurant_name('NY_Res_1');
        $value = $this->obj->get_restaurant_name();
        $this->assertEquals('NY_Res_1', $value);
    }

    public function test_set_and_get_date()
    {
        $this->obj->set_date('2017-03-13');
        $value = $this->obj->get_date();
        $this->assertEquals('2017-03-13', $value);
    }

    public function test_set_and_get_table_number()
    {
        $this->obj->set_tableno('9');
        $value = $this->obj->get_tableno();
        $this->assertEquals('9', $value);
    }

    public function test_set_and_get_time()
    {
        $this->obj->set_time('09:00');
        $value = $this->obj->get_time();
        $this->assertEquals('09:00', $value);
    }

    public function test_set_and_get_number_of_people()
    {
        $this->obj->set_number_of_people('2');
        $value = $this->obj->get_number_of_people();
        $this->assertEquals('2', $value);
    }

    public function test_set_reserved_table_information()
    {
        $this->obj->set_restaurant_name('NY_Res_1');
        $this->obj->set_date('2017-03-13');
        $this->obj->set_tableno('9');
        $this->obj->set_time('09:00');
        $this->obj->set_number_of_people('2');
        $value = $this->obj->get_stored_tableno();
        $this->assertEquals(true, $value);
    }

    public function test_get_number_of_reserved_tables()
    {
        $this->obj->set_restaurant_name('NY_Res_1');
        $this->obj->set_date('2017-03-13');
        $value = $this->obj->get_number_of_reserved_tables();
        $this->assertEquals('2', $value);
    }

    public function test_get_total_number_of_tables_in_a_restaurant()
    {
        $this->obj->set_restaurant_name('NY_Res_1');
        $this->obj->set_date('2017-03-13');
        $this->obj->get_number_of_reserved_tables();
        $value = $this->obj->get_max_tables();
        $this->assertEquals('9', $value);
    }

}
