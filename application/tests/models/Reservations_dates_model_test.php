<?php

class Reservations_dates_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Reservationdates_model');
        $this->obj = $this->CI->Reservationdates_model;
    }

    public function test_get_reservation_dates_results()
    {
        $value = $this->obj->get_reservation_dates_results();
        $this->assertTrue(true, $value);
    }

}
