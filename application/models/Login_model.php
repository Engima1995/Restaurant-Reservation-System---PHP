<?php

class Login_model extends CI_Model {

  private $c_arr_admin_data;

  function Login_model()
  {
      parent::__construct();
      $this->c_arr_admin_data = array('Username' => '', 'Password' => '');
  }

  public function set_admin_credintials($p_sanitised_obj_username, $p_sanitised_obj_password) {
    $this->c_arr_admin_data['Username'] = $p_sanitised_obj_username;
    $this->c_arr_admin_data['Password'] = $p_sanitised_obj_password;
  }

  public function get_admin_info()
  {
    $m_username = $this->c_arr_admin_data['Username'];
    $m_password = $this->c_arr_admin_data['Password'];

    $m_arr_store_boolean = false;

    $m_sql_query = $this->sqlwrapper->get_admin_password();
    $m_returned_result = $this->db->query($m_sql_query, array($m_username));
    $row = $m_returned_result->row();

    if($this->encryption->decrypt($row->adminPassword) === $m_password) {

      $m_encrypted_password = $row->adminPassword;

      $m_sql_query = $this->sqlwrapper->get_admin_info();
      $m_returned_result = $this->db->query($m_sql_query, array($m_username, $m_encrypted_password));

      foreach($m_returned_result->result() as $row) {

        if($row->adminUsername === $m_username && $this->encryption->decrypt($row->adminPassword) === $m_password);
          $m_arr_store_boolean = true;
          break;
        }

    }

    return $m_arr_store_boolean;

  }

}

?>
