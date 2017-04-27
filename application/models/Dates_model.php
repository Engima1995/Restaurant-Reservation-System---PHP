<?php

class Dates_model extends CI_Model {

  private $c_restaurant_name;
  private $c_arr_date_data;
  private $c_arr_date_full;
  private $c_date_boolean;

  function Dates_model()
  {
      parent::__construct();

      date_default_timezone_set("Europe/London");

      $this->c_restaurant_name = '';
      $this->c_arr_date_data = array('restaurantid' => '', 'dates' => '');
      $this->c_arr_date_full = array();
      $this->c_date_boolean = '';

  }

  public function set_restaurant_name($p_restaurant_name) {
    $this->c_restaurant_name = $p_restaurant_name;
  }

  public function get_restaurant_name() {
    return $this->c_restaurant_name;
  }

  public function set_date($p_date) {
    $this->c_arr_date_data['dates'] = $p_date;
  }

  public function get_date() {
    return $this->c_arr_date_data['dates'];
  }

  public function get_stored_date() {
    $this->store_date();
    return $this->c_date_boolean;
  }

  public function get_dates_availabe($res_table = null, $max_tables = null) {
    return $this->check_date_available($res_table, $max_tables);
  }

  public function get_arr_dates_full($res_table = null, $max_tables = null) {
    $this->add_to_array_date_full($res_table, $max_tables);
    return $this->c_arr_date_full;
  }

  private function store_date() {

    $m_sql_query = $this->sqlwrapper->get_restaurant_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $m_arr_store_boolean = false;
    $this->c_date_boolean = $m_arr_store_boolean;

    $m_sql_query = $this->sqlwrapper->get_date_table();

    $this->c_arr_date_data['restaurantid'] = $row->restaurantid;

    if($m_returned_result = $this->db->insert($m_sql_query, $this->c_arr_date_data)) {

      $this->c_date_boolean = $m_arr_store_boolean = true;

    }

  }

  private function check_date_available($res_table, $max_tables) {

    $m_sql_query = $this->sqlwrapper->get_restaurant_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $m_restaurant_id = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_restaurantid_and_dates();
    $m_returned_result = $this->db->query($m_sql_query, array($m_restaurant_id, $this->c_arr_date_data['dates']));
    $row = $m_returned_result->row();

    $count = 0;

    $m_dates_full_boolean = false;

    foreach($m_returned_result->result() as $result) {
      if($result->restaurantid == $m_restaurant_id) {
        $count++;
      }
    }

    if($res_table == $max_tables) {
      $m_dates_full_boolean = true;
    }

    return $m_dates_full_boolean;

  }

  private function add_to_array_date_full($res_table, $max_tables) {

    $m_date_added = false;
    $m_arr=array();

    if($this->check_date_available($res_table, $max_tables)) {

      $m_sql_query = $this->sqlwrapper->get_restaurant_id();
      $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
      $row = $m_returned_result->row();

      $m_restaurant_id = $row->restaurantid;

      $m_sql_query = $this->sqlwrapper->get_datesfull_table();
      $m_returned_result = $this->db->insert($m_sql_query, array('restaurantid' => $m_restaurant_id, 'datesfull' => $this->c_arr_date_data['dates']));

      $m_sql_query = $this->sqlwrapper->get_datesfull_info();
      $m_returned_result = $this->db->query($m_sql_query, $m_restaurant_id);
      $row = $m_returned_result->result();

      if($row) {
        $m_date_added = true;
      }

      if($m_date_added) {

        $count=0;
        foreach($m_returned_result->result() as $result) {
          $count++;
        }
        foreach($m_returned_result->result() as $result) {
          $m_arr['Date' . $count] = $result->datesfull;
          $count--;
        }

      }

      $this->c_arr_date_full = $m_arr;

    }
  }
}

?>
