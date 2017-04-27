<?php

class Reservationdates_model extends CI_Model {

  private $c_arr_info;

  function Reservationsdates_model()
  {
      parent::__construct();

      $this->c_arr_info = array();

  }

  public function get_reservation_dates_results() {
    $this->check_reservation_dates();
    return $this->c_arr_info;
  }

  private function check_reservation_dates() {

    $m_sql_query = $this->sqlwrapper->get_distinct_dates();
    $m_returned_result = $this->db->query($m_sql_query);
    $row = $m_returned_result->row();

    $m_dates_arr = array();
    $count = 0;

    foreach($m_returned_result->result() as $result) {

      $m_dates_arr[$count] = $result->dates;
      $count++;

    }

    $m_sql_query = $this->sqlwrapper->get_all_info();
    $m_returned_result = $this->db->query($m_sql_query);

    $m_results_based_on_dates_arr = array();

    foreach($m_dates_arr as $key) {
      $arr_key_value[$key] = array();
      $temp_arr = array();
      foreach($m_returned_result->result() as $result) {
        if($result->dates == $key) {
            $m_arr = array();
            $m_arr['firstname'] = $result->firstname;
            $m_arr['lastname'] = $result->lastname;
            $m_arr['email'] = $result->email;
            $m_arr['phonenumber'] = $result->phonenumber;
            $m_arr['description'] = $result->description;
            $m_arr['city'] = $result->city;
            $m_arr['tableno'] = $result->tableno;
            $m_arr['numberofpeople'] = $result->numberofpeople;
            $m_arr['dates'] = $result->dates;
            $m_arr['times'] = $result->times;
            array_push($temp_arr, $m_arr);
        }
      }

      array_push($arr_key_value[$key], $temp_arr);

    }

    $this->c_arr_info = $m_results_based_on_dates_arr = $arr_key_value;

  }

}

?>
