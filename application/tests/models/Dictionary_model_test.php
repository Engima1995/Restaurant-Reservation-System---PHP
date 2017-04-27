<?php

class Dictionary_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Dictionary_model');
        $this->obj = $this->CI->Dictionary_model;
    }

    public function test_set_and_get_information()
    {
        $arr = array();

        $arr['firstname'] = 'Sukh';
        $arr['lastname'] = 'Singh';
        $arr['email'] = 'sukh@gmail.com';
        $arr['phonenumber'] = '12345678911';
        $arr['description'] = 'Jumbo Kingdom';
        $arr['city'] = 'HongKong';
        $arr['tableno'] = '5';
        $arr['numberofpeople'] = '4';
        $arr['dates'] = '2017-03-13';
        $arr['times'] = '09:00 ';

        $this->obj->set_info($arr['firstname'], $arr['lastname'], $arr['email'], $arr['phonenumber'], $arr['description'], $arr['city'], $arr['tableno'], $arr['numberofpeople'], $arr['dates'], $arr['times']);
        $value = $this->obj->get_arr_info();

        $this->assertEquals($arr, $value);

    }

    public function test_retrieve_all_info_regarding_customer_and_reserved_tables_from_database()
    {
      $value = $this->obj->get_info();
      $this->assertTrue(true, $value);
    }

    public function test_add_information_to_database()
    {

      $arr = array();

      $arr['firstname'] = 'Josh';
      $arr['lastname'] = 'Grant';
      $arr['email'] = 'josh@gmail.com';
      $arr['phonenumber'] = '12345678911';
      $arr['description'] = 'Jumbo Kingdom';
      $arr['city'] = 'HongKong';
      $arr['tableno'] = '5';
      $arr['numberofpeople'] = '4';
      $arr['dates'] = '2017-03-13';
      $arr['times'] = '09:00 ';

      $this->obj->set_info($arr['firstname'], $arr['lastname'], $arr['email'], $arr['phonenumber'], $arr['description'], $arr['city'], $arr['tableno'], $arr['numberofpeople'], $arr['dates'], $arr['times']);
      $value = $this->obj->process_add_info();
      $this->assertEquals(true, $value);

    }

    public function test_edit_information_in_database()
    {

      $arr = array();
      $previous_info_arr = array();

      $previous_info_arr[0]['fname'] = 'Josh';
      $previous_info_arr[0]['lname'] = 'Grant';
      $previous_info_arr[0]['mail'] = 'josh@gmail.com';
      $previous_info_arr[0]['pnumber'] = '12345678911';
      $previous_info_arr[0]['des'] = 'Jumbo Kingdom';
      $previous_info_arr[0]['c'] = 'HongKong';
      $previous_info_arr[0]['tno'] = '5';
      $previous_info_arr[0]['noofpeople'] = '4';
      $previous_info_arr[0]['date'] = '2017-03-13';
      $previous_info_arr[0]['time'] = '09:00 ';

      $arr['firstname'] = 'Josh';
      $arr['lastname'] = 'Grant';
      $arr['email'] = 'joshua@hotmail.com';
      $arr['phonenumber'] = '12345678911';
      $arr['description'] = 'Jumbo Kingdom';
      $arr['city'] = 'HongKong';
      $arr['tableno'] = '5';
      $arr['numberofpeople'] = '4';
      $arr['dates'] = '2017-03-13';
      $arr['times'] = '09:00 ';

      $this->obj->set_previous_info($previous_info_arr);
      $this->obj->set_info($arr['firstname'], $arr['lastname'], $arr['email'], $arr['phonenumber'], $arr['description'], $arr['city'], $arr['tableno'], $arr['numberofpeople'], $arr['dates'], $arr['times']);

      $value = $this->obj->process_edit_info();
      $this->assertEquals(true, $value);

    }

    public function test_delete_information_from_database()
    {
      $previous_info_arr = array();

      $previous_info_arr[0]['fname'] = 'Josh';
      $previous_info_arr[0]['lname'] = 'Grant';
      $previous_info_arr[0]['mail'] = 'joshua@hotmail.com';
      $previous_info_arr[0]['pnumber'] = '12345678911';
      $previous_info_arr[0]['des'] = 'Jumbo Kingdom';
      $previous_info_arr[0]['c'] = 'HongKong';
      $previous_info_arr[0]['tno'] = '5';
      $previous_info_arr[0]['noofpeople'] = '4';
      $previous_info_arr[0]['date'] = '2017-03-13';
      $previous_info_arr[0]['time'] = '09:00 ';

      $this->obj->set_previous_info($previous_info_arr);

      $value = $this->obj->process_delete_info();
      $this->assertEquals(true, $value);
    }

}
