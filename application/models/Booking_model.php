<?php

class Booking_model extends CI_Model {

  private $c_restaurant_name;
  private $c_arr_booking_data;
  private $c_booked_boolean;

  function Booking_model()
  {
      parent::__construct();

      $this->c_restaurant_name = '';
      $this->c_booked_boolean = false;
      $this->c_arr_booking_data = array('restaurantid' => '', 'customerid' => '', 'timeid' => '', 'tableid' => '', 'dateid' => '');

  }

  public function set_customer_data($p_sanitised_obj_firstname, $p_sanitised_obj_lastname, $p_sanitised_obj_email, $p_sanitised_obj_telephone) {
    $this->customer_booking_model->set_customer_data($p_sanitised_obj_firstname, $p_sanitised_obj_lastname, $p_sanitised_obj_email, $p_sanitised_obj_telephone);
  }

  public function set_restaurant_name($p_restaurant_name) {
    $this->dates_model->set_restaurant_name($p_restaurant_name);
    $this->time_model->set_restaurant_name($p_restaurant_name);
    $this->tables_model->set_restaurant_name($p_restaurant_name);
  }

  public function set_date($p_date) {
    $this->dates_model->set_date($p_date);
    $this->tables_model->set_date($p_date);
    $this->time_model->set_date($p_date);
  }

  public function set_tableno($p_tableno) {
    $this->tables_model->set_tableno($p_tableno);
  }

  public function set_time($p_time) {
    $this->tables_model->set_time($p_time);
  }

  public function set_number_of_people($p_number_of_people) {
    $this->tables_model->set_number_of_people($p_number_of_people);
  }

  public function process_info() {
    $this->dates_model->get_stored_date();
    $this->tables_model->get_stored_tableno();
    $this->customer_booking_model->get_customer_data();
    $customer_id = $this->customer_booking_model->get_customer_id();
    $restable_id = $this->tables_model->get_reserved_table_id();
    $this->do_store_booking_info($customer_id, $restable_id);
    return true;
  }

  public function get_dates_full() {
    $this->get_number_of_reserved_tables();
    return $this->dates_model->get_dates_availabe($this->tables_model->get_reserved_tables(), $this->tables_model->get_max_tables());
  }

  public function get_arr_dates_full() {
    $this->get_number_of_reserved_tables();
    return $this->dates_model->get_arr_dates_full($this->tables_model->get_reserved_tables(), $this->tables_model->get_max_tables());
  }

  public function get_time_reserved() {
    return $this->time_model->get_reserved_times();
  }

  public function get_number_of_reserved_tables() {
    return $this->tables_model->get_number_of_reserved_tables();
  }

  public function get_tables_reserved() {
    return $this->tables_model->get_tables_reserved();
  }

  public function get_tables() {
    return $this->tables_model->get_tables();
  }

  public function get_max_tables() {
    return $this->tables_model->get_max_tables();
  }

  public function get_restaurant_times() {
    return $this->time_model->get_time_availability_of_restaurant();
  }

  private function do_store_booking_info($p_customer_info, $p_restable_info) {

    $m_sql_query = $this->sqlwrapper->get_booking_table();

    if($m_returned_result = $this->db->insert($m_sql_query, array('customerid' => $p_customer_info, 'restableid' => $p_restable_info))) {

      $this->c_booked_boolean = true;

    }

  }

}

?>
