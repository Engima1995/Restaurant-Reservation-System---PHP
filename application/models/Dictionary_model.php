<?php

class Dictionary_model extends CI_Model {

  private $c_arr_info;
  private $c_arr_previous_info;
  private $c_res_name;

  function Dictionary_model()
  {
      parent::__construct();

      $this->c_res_name = null;
      $this->c_arr_info = array('firstname' => '', 'lastname' => '', 'email' => '', 'phonenumber' => '', 'tableno' => '', 'numberofpeople' => '', 'dates' => '', 'times' => '', 'description' => '', 'city' => '');
      $this->c_previous_arr_info = array('firstname' => '', 'lastname' => '', 'email' => '', 'phonenumber' => '', 'description' => '', 'city' => '', 'tableno' => '', 'numberofpeople' => '', 'dates' => '', 'times' => '');
  }

  public function set_previous_info($p_info_arr) {
    $this->c_previous_arr_info['firstname'] = $p_info_arr[0]['fname'];
    $this->c_previous_arr_info['lastname'] = $p_info_arr[0]['lname'];
    $this->c_previous_arr_info['email'] = $p_info_arr[0]['mail'];
    $this->c_previous_arr_info['phonenumber'] = $p_info_arr[0]['pnumber'];
    $this->c_previous_arr_info['description'] = $p_info_arr[0]['des'];
    $this->c_previous_arr_info['city'] = $p_info_arr[0]['c'];
    $this->c_previous_arr_info['tableno'] = $p_info_arr[0]['tno'];
    $this->c_previous_arr_info['numberofpeople'] = $p_info_arr[0]['noofpeople'];
    $this->c_previous_arr_info['dates'] = $p_info_arr[0]['date'];
    $this->c_previous_arr_info['times'] = $p_info_arr[0]['time'];
  }

  public function get_previous_info() {
    return $this->c_previous_arr_info;
  }

  public function set_info($p_sanitised_obj_firstname, $p_sanitised_obj_lastname, $p_sanitised_obj_email, $p_sanitised_obj_phonenumber,$p_sanitised_obj_description, $p_sanitised_obj_city, $p_sanitised_obj_tableno, $p_sanitised_obj_numberofpeople, $p_sanitised_obj_dates, $p_sanitised_obj_times) {
    $this->c_arr_info['firstname'] = $p_sanitised_obj_firstname;
    $this->c_arr_info['lastname'] = $p_sanitised_obj_lastname;
    $this->c_arr_info['email'] = $p_sanitised_obj_email;
    $this->c_arr_info['phonenumber'] = $p_sanitised_obj_phonenumber;
    $this->c_arr_info['description'] = $p_sanitised_obj_description;
    $this->c_arr_info['city'] = $p_sanitised_obj_city;
    $this->c_arr_info['tableno'] = $p_sanitised_obj_tableno;
    $this->c_arr_info['numberofpeople'] = $p_sanitised_obj_numberofpeople;
    $this->c_arr_info['dates'] = $p_sanitised_obj_dates;
    $this->c_arr_info['times'] = $p_sanitised_obj_times;
  }

  public function get_arr_info() {
    return $this->c_arr_info;
  }

  public function get_info() {
    return $this->do_find_info();
  }

  public function get_restaurant_name() {
    $this->do_find_res_name();
    return $this->c_res_name;
  }

  public function process_add_info() {
    $this->do_add_info();
  }

  public function process_edit_info() {
    return $this->do_edit_info();
  }

  public function process_delete_info() {
    return $this->do_delete_info();
  }

  private function do_find_res_name() {

    $m_sql_query = $this->sqlwrapper->get_restaurant_name_through_description();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_arr_info['description']));
    $row = $m_returned_result->row();

    $this->c_res_name = $row->restaurantname;

  }

  private function do_find_info() {

    $m_sql_query = $this->sqlwrapper->get_all_info();
    $m_returned_result = $this->db->query($m_sql_query);

    return $m_returned_result->result();

  }

  private function do_add_info() {

    $m_arr_store_boolean = false;

    $m_sql_query = $this->sqlwrapper->get_customer_table();

    if($m_returned_result = $this->db->insert($m_sql_query, array('firstname' => $this->c_arr_info['firstname'], 'lastname' => $this->c_arr_info['lastname'], 'email' => $this->c_arr_info['email'], 'phonenumber' => $this->c_arr_info['phonenumber']))) {

      $m_arr_store_boolean = true;

    }

    $m_sql_query = $this->sqlwrapper->get_restaurant_id_through_name();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_arr_info['description']));
    $row = $m_returned_result->row();

    $m_res_id = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_table_id();
    $m_returned_result = $this->db->query($m_sql_query, array($m_res_id, $this->c_arr_info['tableno']));
    $row = $m_returned_result->row();

    $m_table_id = $row->tableid;

    $m_sql_query = $this->sqlwrapper->get_reserved_table();

    if($m_returned_result = $this->db->insert($m_sql_query, array('restaurantid' => $m_res_id, 'tableid' => $m_table_id, 'tableno' => $this->c_arr_info['tableno'], 'numberofpeople' => $this->c_arr_info['numberofpeople'], 'dates' => $this->c_arr_info['dates'], 'times' => $this->c_arr_info['times']))) {

      $m_arr_store_boolean = true;

    }

    $m_sql_query = $this->sqlwrapper->get_date_table();

    if($m_returned_result = $this->db->insert($m_sql_query, array('restaurantid' => $m_res_id, 'dates' => $this->c_arr_info['dates']))) {

      $m_arr_store_boolean = true;

    }

    $m_sql_query = $this->sqlwrapper->get_customer_id();
    $m_returned_result = $this->db->query($m_sql_query);
    $row = $m_returned_result->row();

    $m_cust_id = $row->customerid;

    $m_sql_query = $this->sqlwrapper->get_restable_id();
    $m_returned_result = $this->db->query($m_sql_query);
    $row = $m_returned_result->row();

    $m_restable_id = $row->restableid;

    $m_sql_query = $this->sqlwrapper->get_booking_table();

    if($m_returned_result = $this->db->insert($m_sql_query, array('customerid' => $m_cust_id, 'restableid' => $m_restable_id))) {

      $m_arr_store_boolean = true;

    }

    return $m_arr_store_boolean;

  }

  private function do_edit_info() {

    $m_boolean = false;

    $m_sql_query = $this->sqlwrapper->get_restaurant_id_through_name();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_previous_arr_info['description']));
    $row = $m_returned_result->row();

    $m_restaurant_id = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_table_id();
    $m_returned_result = $this->db->query($m_sql_query, array($m_restaurant_id, $this->c_previous_arr_info['tableno']));
    $row = $m_returned_result->row();

    $m_table_id = $row->tableid;

    $m_sql_query = $this->sqlwrapper->get_restaurant_id_through_name();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_arr_info['description']));
    $row = $m_returned_result->row();

    $m_new_restaurant_id = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_table_id();
    $m_returned_result = $this->db->query($m_sql_query, array($m_new_restaurant_id, $this->c_arr_info['tableno']));
    $row = $m_returned_result->row();

    $m_new_table_id = $row->tableid;

    $m_sql_query = $this->sqlwrapper->get_matched_restable_id();
    $m_returned_result = $this->db->query($m_sql_query, array($m_restaurant_id, $m_table_id, $this->c_previous_arr_info['tableno'], $this->c_previous_arr_info['numberofpeople'], $this->c_previous_arr_info['dates'], $this->c_previous_arr_info['times']));
    $row = $m_returned_result->row();

    $m_res_table_id = $row->restableid;

    $m_sql_query = $this->sqlwrapper->get_min_date_id_to_update();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_previous_arr_info['dates'], $m_restaurant_id));
    $row = $m_returned_result->row();

    $m_date_id = $row->dateid;

    $m_sql_query = $this->sqlwrapper->get_customer_id_through_booking_table_where_restable_id_is_used();
    $m_returned_result = $this->db->query($m_sql_query, array($m_res_table_id));
    $row = $m_returned_result->row();

    $m_customer_id = $row->customerid;

    $m_sql_query = $this->sqlwrapper->get_customer_table();
    $this->db->where('customerid', $m_customer_id);
    $this->db->update($m_sql_query, array('firstname' => $this->c_arr_info['firstname'], 'lastname' => $this->c_arr_info['lastname'], 'email' => $this->c_arr_info['email'], 'phonenumber' => $this->c_arr_info['phonenumber']));

    $m_sql_query = $this->sqlwrapper->get_reserved_table();
    $this->db->where('restableid', $m_res_table_id);
    $this->db->update($m_sql_query, array('restaurantid' => $m_new_restaurant_id, 'tableid' => $m_new_table_id, 'tableno' => $this->c_arr_info['tableno'], 'numberofpeople' => $this->c_arr_info['numberofpeople'], 'dates' => $this->c_arr_info['dates'], 'times' => $this->c_arr_info['times']));

    $m_sql_query = $this->sqlwrapper->get_date_table();
    $this->db->where('dateid', $m_date_id);
    $this->db->update($m_sql_query, array('restaurantid' => $m_new_restaurant_id, 'dates' => $this->c_arr_info['dates']));

    return $m_boolean = true;

  }

  private function do_delete_info() {

    $m_boolean = false;

    $m_sql_query = $this->sqlwrapper->get_restaurant_id_through_name();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_previous_arr_info['description']));
    $row = $m_returned_result->row();

    $m_restaurant_id = $row->restaurantid;

    $m_sql_query = $this->sqlwrapper->get_table_id();
    $m_returned_result = $this->db->query($m_sql_query, array($m_restaurant_id, $this->c_previous_arr_info['tableno']));
    $row = $m_returned_result->row();

    $m_table_id = $row->tableid;

    $m_sql_query = $this->sqlwrapper->get_matched_restable_id();
    $m_returned_result = $this->db->query($m_sql_query, array($m_restaurant_id, $m_table_id, $this->c_previous_arr_info['tableno'], $this->c_previous_arr_info['numberofpeople'], $this->c_previous_arr_info['dates'], $this->c_previous_arr_info['times']));
    $row = $m_returned_result->row();

    $m_res_table_id = $row->restableid;

    $m_sql_query = $this->sqlwrapper->get_min_date_id_to_update();
    $m_returned_result = $this->db->query($m_sql_query, array($this->c_previous_arr_info['dates'], $m_restaurant_id));
    $row = $m_returned_result->row();

    $m_date_id = $row->dateid;

    $m_sql_query = $this->sqlwrapper->get_customer_id_through_booking_table_where_restable_id_is_used();
    $m_returned_result = $this->db->query($m_sql_query, array($m_res_table_id));
    $row = $m_returned_result->row();

    $m_customer_id = $row->customerid;

    $m_sql_query = $this->sqlwrapper->get_booking_id();
    $m_returned_result = $this->db->query($m_sql_query, array($m_customer_id, $m_res_table_id));
    $row = $m_returned_result->row();

    $m_booking_id = $row->bookingid;

    $m_sql_query = $this->sqlwrapper->get_booking_table();
    $this->db->where('bookingid', $m_booking_id);
    $this->db->delete($m_sql_query);

    $m_sql_query = $this->sqlwrapper->get_customer_table();
    $this->db->where('customerid', $m_customer_id);
    $this->db->delete($m_sql_query);

    $m_sql_query = $this->sqlwrapper->get_reserved_table();
    $this->db->where('restableid', $m_res_table_id);
    $this->db->delete($m_sql_query);

    $m_sql_query = $this->sqlwrapper->get_date_table();
    $this->db->where('dateid', $m_date_id);
    $this->db->delete($m_sql_query);

    return $m_boolean = true;

  }

}

?>
