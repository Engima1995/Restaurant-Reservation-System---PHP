<?php

class Customer_booking_model extends CI_Model {

  private $c_arr_customer_data;
  private $c_arr_customer_boolean;

  function Customer_booking_model()
  {
      parent::__construct();
      $this->c_arr_customer_data = array('firstname' => '', 'lastname' => '', 'email' => '', 'phonenumber' => '');
      $this->c_arr_customer_boolean = '';
  }

  public function set_customer_data($p_sanitised_obj_firstname, $p_sanitised_obj_lastname, $p_sanitised_obj_email, $p_sanitised_obj_telephone) {
    $this->c_arr_customer_data['firstname'] = $p_sanitised_obj_firstname;
    $this->c_arr_customer_data['lastname'] = $p_sanitised_obj_lastname;
    $this->c_arr_customer_data['email'] = $p_sanitised_obj_email;
    $this->c_arr_customer_data['phonenumber'] = $p_sanitised_obj_telephone;
  }

  public function get_customer_data() {
    $this->store_customer_info();
    return $this->c_arr_customer_boolean;
  }

  public function get_customer_id() {
    return $this->do_retrieve_customer_id();
  }

  private function store_customer_info()
  {

    $this->c_arr_customer_boolean = $m_arr_store_boolean = false;

    $m_sql_query = $this->sqlwrapper->get_customer_table();

    if($m_returned_result = $this->db->insert($m_sql_query, $this->c_arr_customer_data)) {

      $this->c_arr_customer_boolean = $m_arr_store_boolean = true;

    }

  }

  private function do_retrieve_customer_id() {

    $m_sql_query = $this->sqlwrapper->get_customer_id();
    $m_returned_result = $this->db->query($m_sql_query);
    $row = $m_returned_result->row();

    return $row->customerid;

  }

}
