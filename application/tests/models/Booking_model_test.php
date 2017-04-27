<?php

class Booking_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Booking_model');
        $this->obj = $this->CI->Booking_model;
    }

    public function test_booking()
    {
      $this->obj->set_restaurant_name('NY_RES_2');
      $this->obj->set_customer_data('TEST', 'TEST', 'TEST@gmail.com', '12345678911');
      $this->obj->set_date('2017-03-14');
      $this->obj->set_time('10:00');
      $this->obj->set_tableno('7');
      $this->obj->set_number_of_people('2');
      $value = $this->obj->process_info();
      $this->assertEquals(true, $value);
    }

}
