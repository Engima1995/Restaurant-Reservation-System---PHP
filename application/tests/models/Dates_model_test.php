<?php

class Dates_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Dates_model');
        $this->obj = $this->CI->Dates_model;
    }

    public function test_set_and_get_restaurant_name()
    {
        $this->obj->set_restaurant_name('NY_Res_1');
        $value = $this->obj->get_restaurant_name();
        $this->assertEquals('NY_Res_1', $value);
    }

    public function test_set_and_get_date()
    {
        $this->obj->set_date('2017-03-14');
        $value = $this->obj->get_date();
        $this->assertEquals('2017-03-14', $value);
    }

    public function test_insert_date_to_database()
    {
      $this->obj->set_restaurant_name('NY_Res_1');
      $this->obj->set_date('2017-03-14');
      $value = $this->obj->get_stored_date();
      $this->assertTrue(true, $value);
    }

    public function test_date_full() {
      $this->obj->set_restaurant_name('NY_Res_1');
      $this->obj->set_date('2017-03-14');
      $value = $this->obj->get_dates_availabe('6', '9');
      $this->assertEquals(false, $value);
    }

}
