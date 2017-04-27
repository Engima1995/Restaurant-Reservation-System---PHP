<?php

class Time_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Time_model');
        $this->obj = $this->CI->Time_model;
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

    public function test_get_restaurant_times()
    {
        $this->obj->set_restaurant_name('NY_Res_1');
        $arr_values = $this->obj->get_time_availability_of_restaurant();
        $expected_arr = array(
          '09:00 ',
          '10:00 ',
          '11:00 ',
          '12:00 ',
          '13:00 ',
          '14:00 ',
          '15:00 ',
          '16:00 ',
          '17:00 ',
          '18:00 ',
          '19:00 ',
          '20:00 ',
          '21:00 ',
          '22:00 '
        );
        $this->assertEquals($expected_arr, $arr_values);
    }

    public function test_get_reserved_restaurant_times()
    {
        $this->obj->set_restaurant_name('NY_Res_1');
        $arr_values = $this->obj->get_reserved_times();
        $expected_arr = array(
          '10:00 ',
          '11:00 ',
          '12:00 ',
          '13:00 ',
          '14:00 ',
          '15:00 ',
          '16:00 ',
          '17:00 ',
          '18:00 ',
          '19:00 ',
          '20:00 ',
          '21:00 ',
          '22:00 '
        );
        $this->assertEquals($expected_arr[0], $arr_values['2017-03-13'][1]);
        $this->assertEquals($expected_arr[1], $arr_values['2017-03-13'][2]);
        $this->assertEquals($expected_arr[2], $arr_values['2017-03-13'][3]);
        $this->assertEquals($expected_arr[3], $arr_values['2017-03-13'][4]);
        $this->assertEquals($expected_arr[4], $arr_values['2017-03-13'][5]);
        $this->assertEquals($expected_arr[5], $arr_values['2017-03-13'][6]);
        $this->assertEquals($expected_arr[6], $arr_values['2017-03-13'][7]);
        $this->assertEquals($expected_arr[7], $arr_values['2017-03-13'][8]);
        $this->assertEquals($expected_arr[8], $arr_values['2017-03-13'][9]);
        $this->assertEquals($expected_arr[9], $arr_values['2017-03-13'][10]);
        $this->assertEquals($expected_arr[10], $arr_values['2017-03-13'][11]);
        $this->assertEquals($expected_arr[11], $arr_values['2017-03-13'][12]);
    }

}
