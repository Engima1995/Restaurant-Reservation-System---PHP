<?php

class Session_model extends CI_Model {

  function Session_model()
  {
    parent::__construct();
  }

  public function set_session_value($p_key, $p_sanitised_value) {
    return $this->do_setting_session_value($p_key, $p_sanitised_value);
  }

  public function unset_session_value($p_key) {
    return $this->do_unsetting_session_value($p_key);
  }

  public function get_session_value($p_key) {
    return $this->do_getting_session_value($p_key);
  }

  private function do_setting_session_value($p_key, $p_sanitised_value) {

    $m_session_value_set_successfully = false;

    if(!empty($p_sanitised_value)) {

      $this->session->set_userdata(array(
        $p_key => $p_sanitised_value,
      ));

      $m_session_value_set_successfully = true;

    }

    return $m_session_value_set_successfully;

  }

  private function do_unsetting_session_value($p_key) {

    $m_unset_session = false;

		if (isset($_SESSION[$p_key]))
		{
			unset($_SESSION[$p_key]);
		}
		if (!isset($_SESSION[$p_key]))
		{
			$m_unset_session = true;
		}

    return $m_unset_session;

  }

  private function do_getting_session_value($p_key) {

    $m_session_value = false;

		if (isset($this->session->$p_key))
		{
			$m_session_value = $this->session->$p_key;
		}
		return $m_session_value;

  }

}
