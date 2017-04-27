<?php

class Customer_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Customer_booking_model');
        $this->obj = $this->CI->Customer_booking_model;
    }

    public function test_insert_and_get_customer_information_to_and_from_database()
    {
        $this->obj->set_customer_data('Sukh', 'Singh', 'sukh@gmail.com', '12345678911');
        $value = $this->obj->get_customer_data();
        $this->assertEquals(true, $value);
    }

}
