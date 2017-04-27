<?php

class Time_model extends CI_Model {

  private $c_restaurant_name;
  private $c_date;
  private $c_arr_time_data;
  private $c_arr_reserved_time_data;

  function Time_model()
  {
      parent::__construct();

      date_default_timezone_set("Europe/London");

      $this->c_restaurant_name = '';
      $this->c_date = '';
      $this->c_arr_time_data = array();
      $this->c_arr_reserved_time_data = array();

  }

  public function set_restaurant_name($p_restaurant_name) {
    $this->c_restaurant_name = $p_restaurant_name;
  }

  public function get_restaurant_name() {
    return $this->c_restaurant_name;
  }

  public function set_date($p_date) {
    $this->c_date = $p_date;
  }

  public function get_date() {
    return $this->c_date;
  }

  public function get_reserved_times() {
    $this->do_time_reserved();
    return $this->c_arr_reserved_time_data;
  }

  public function get_time_availability_of_restaurant() {

    $m_time_available_array = array();

    $m_sql_query = $this->sqlwrapper->get_restaurant_time_info();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $m_time_available = strtotime($row->timeavailable);
    $m_time_end = strtotime($row->timeend);

    $m_total_available_time = 12 - date('h', $m_time_available);
    $m_total_end_time = date('h', $m_time_end);

    $m_total_time = $m_total_available_time + $m_total_end_time + 1;

    $i = 0;
    $count = 0;

    $m_time_available_array[$i] = date('H:i ', $m_time_available);

    for($i=1; $i < $m_total_time; $i++) {
      $addHour = strtotime("+1 hour", strtotime($m_time_available_array[$count]));
      $m_time_available_array[$i] = date('H:i ', $addHour);
      $count++;
    }

    $m_time_available_array[$count] = date('H:i ', $m_time_end);

    return $m_time_available_array;

  }

  private function do_time_reserved() {

    $m_time_available_array = $this->get_time_availability_of_restaurant();
    $m_date_reserved_arr = array();
    $m_time_reserved_arr = array();
    $m_restaurant_id = '';
    $count = 0;

    $m_sql_query = $this->sqlwrapper->get_restaurant_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $m_restaurant_id = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_restaurant_time_reserved();
    $m_returned_result = $this->db->query($m_sql_query, array($m_restaurant_id));
    $row = $m_returned_result->result();

    //Store reserved dates
    foreach($row as $value) {
      $m_date_reserved_arr[$count] = $value->dates;
      $count++;
    }

    $count = 0;
    $arr_key_value = array();

    //Stores times to individual dates
    foreach($m_date_reserved_arr as $key) {
      $arr_key_value[$key] = array();
      $temp_arr = array();
      foreach($row as $value) {
        if($value->dates == $key) {
            array_push($temp_arr, $value->times);
        }
      }
      $arr_key_value[$key] = $temp_arr;
    }

    //Convert times to proper format for each date key
    foreach($m_date_reserved_arr as $key) {
      $count = 0;
      for($count; $count < sizeof($arr_key_value[$key]); $count++) {
         $arr_key_value[$key][$count] = strtotime($arr_key_value[$key][$count]);
         $arr_key_value[$key][$count] = date('H:i ', $arr_key_value[$key][$count]);
      }
    }

    $count = 0;

    //Check for differences between available times and reserved times for each date, and return array
    foreach($m_date_reserved_arr as $key) {
      $m_arr[$key] = array_diff($m_time_available_array, $arr_key_value[$key]);
    }

    $this->c_arr_reserved_time_data = $m_arr;

    return $this->c_arr_reserved_time_data;

  }

}

?>
