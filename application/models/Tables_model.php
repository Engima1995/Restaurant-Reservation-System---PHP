<?php

class Tables_model extends CI_Model {

  private $c_restaurant_name;
  private $c_max_tables;
  private $c_reserved_tables;
  private $c_arr_reserved_tables_data;
  private $c_arr_tables_data;
  private $c_arr_tables_boolean;
  private $c_tables_array;

  function Tables_model()
  {
      parent::__construct();

      $this->c_restaurant_name = '';
      $this->c_max_tables = '';
      $this->c_reserved_tables = '';
      $this->c_arr_reserved_tables_data = array('restaurantid' => '', 'tableid' => '', 'tableno' => '', 'numberofpeople' => '', 'dates' => '', 'times' => '');
      $this->c_arr_tables_data = array('restaurantid' => '');
      $this->c_arr_tables_boolean = '';
      $this->c_tables_array = array();

  }

  public function set_restaurant_name($p_restaurant_name) {
    $this->c_restaurant_name = $p_restaurant_name;
  }

  public function get_restaurant_name() {
    return $this->c_restaurant_name;
  }

  public function set_date($p_date) {
    $this->c_arr_reserved_tables_data['dates'] = $p_date;
  }

  public function get_date() {
    return $this->c_arr_reserved_tables_data['dates'];
  }

  public function set_tableno($p_tableno) {
    $this->c_arr_reserved_tables_data['tableno'] = $p_tableno;
  }

  public function get_tableno() {
    return $this->c_arr_reserved_tables_data['tableno'];
  }

  public function set_time($p_time) {
    $this->c_arr_reserved_tables_data['times'] = $p_time;
  }

  public function get_time() {
    return $this->c_arr_reserved_tables_data['times'];
  }

  public function set_number_of_people($p_number_of_people) {
    $this->c_arr_reserved_tables_data['numberofpeople'] = $p_number_of_people;
  }

  public function get_number_of_people() {
    return $this->c_arr_reserved_tables_data['numberofpeople'];
  }

  public function get_stored_tableno() {
    $this->store_table();
    return $this->c_arr_reserved_tables_boolean;
  }

  public function get_number_of_reserved_tables() {
    return $this->calculate_tables_reserved_for_restaurant();
  }

  public function get_tables() {
    $this->calculate_table_numbers();
    return $this->c_tables_array;
  }

  //gets actual tables that are reserved:: NEW
  public function get_tables_reserved() {
    return $this->do_tables_reserved();
  }

  //gets number of tables reserved:: OLD
  public function get_reserved_tables() {
    return $this->c_reserved_tables;
  }

  public function get_max_tables() {
    return $this->c_max_tables;
  }

  public function get_reserved_table_id() {
    return $this->do_retrieve_reserved_table_id();
  }

  private function store_table() {

    $m_sql_query = $this->sqlwrapper->get_restaurant_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $this->c_arr_reserved_tables_boolean = $m_arr_store_boolean = false;

    $this->c_arr_reserved_tables_data['restaurantid'] = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_table_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_arr_reserved_tables_data['restaurantid'], $this->c_arr_reserved_tables_data['tableno']));
    $row = $m_returned_result->row();

    $this->c_arr_reserved_tables_data['tableid'] = $row->tableid;

    $m_sql_query = $this->sqlwrapper->get_reserved_table();

    if($m_returned_result = $this->db->insert($m_sql_query, $this->c_arr_reserved_tables_data)) {

      $this->c_arr_tables_boolean = $m_arr_store_boolean = true;

    }

  }

  private function do_retrieve_reserved_table_id() {

    $m_sql_query = $this->sqlwrapper->get_restable_id();
    $m_returned_result = $this->db->query($m_sql_query);
    $row = $m_returned_result->row();

    return $row->restableid;

  }

  //generates table number from 1 to whatever the total number of tables are
  private function calculate_table_numbers() {

    $m_sql_query = $this->sqlwrapper->get_restaurant_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $this->c_arr_tables_data['restaurantid'] = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_table_numbers();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_arr_tables_data['restaurantid']));
    $row = $m_returned_result->row();

    $counter = 1;

    for($i=0; $i<$row->tn; $i++) {
      $this->c_tables_array[$i] = $counter;
      $counter++;
    }

  }

  private function do_tables_reserved() {
    $this->calculate_table_numbers();
    $m_tables_available_array = $this->c_tables_array;
    $m_date_reserved_arr = array();
    $m_tables_reserved_arr = array();
    $m_restaurant_id = '';
    $count = 0;

    $m_sql_query = $this->sqlwrapper->get_restaurant_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $m_restaurant_id = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_restaurant_tables_reserved();
    $m_returned_result = $this->db->query($m_sql_query, array($m_restaurant_id));
    $row = $m_returned_result->result();

    //Store reserved dates
    foreach($row as $value) {
      $m_date_reserved_arr[$count] = $value->dates;
      $count++;
    }

    $count = 0;
    $arr_key_value = array();

    //Stores tables to individual dates
    foreach($m_date_reserved_arr as $key) {
      $arr_key_value[$key] = array();
      $temp_arr = array();
      foreach($row as $value) {
        if($value->dates == $key) {
            array_push($temp_arr, $value->tableno);
        }
      }
      $arr_key_value[$key] = $temp_arr;
    }

    $m_arr = array();

    foreach($m_date_reserved_arr as $key) {
      $m_arr[$key] = array_diff($m_tables_available_array, $arr_key_value[$key]);
    }

    return $m_arr;

  }

  private function calculate_tables_reserved_for_restaurant() {

    $m_sql_query = $this->sqlwrapper->get_restaurant_id();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_restaurant_name));
    $row = $m_returned_result->row();

    $this->c_arr_tables_data['restaurantid'] = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_tables_for_current_restaurant();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_arr_tables_data['restaurantid']));
    $row = $m_returned_result->row();

    $m_total_arr_tables = array();
    $m_total_reserved_arr_tables = array();
    $m_total_tables = 0;
    $m_total_reserved_tables = 0;

    foreach($m_returned_result->result() as $result) {
      $m_total_arr_tables[$m_total_tables] = $result->tableno;
      $m_total_tables++;
    }

    $m_sql_query = $this->sqlwrapper->get_reserved_tables();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_arr_tables_data['restaurantid'], $this->c_arr_reserved_tables_data['dates']));
    $row = $m_returned_result->row();

    foreach($m_returned_result->result() as $result) {
      $m_total_reserved_arr_tables[$m_total_reserved_tables] = $result->tableno;
      $m_total_reserved_tables++;
    }

    $this->c_reserved_tables = $m_total_reserved_tables;
    $this->c_max_tables = $m_total_tables;

    return $m_total_reserved_tables;

  }

}

?>
