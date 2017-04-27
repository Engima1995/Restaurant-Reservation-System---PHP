<?php

class Adminpage extends CI_Controller {

  public function admin_login_form() {

    $this->form_validation->set_rules('username', 'Username', 'callback_field_check');
    $this->form_validation->set_rules('password', 'Password', 'callback_field_check');

    if($this->input->post('username') || $this->input->post('password')) {

      $f_xss_cleaned_username = $this->security->xss_clean($this->input->post('username'), TRUE);
      $f_xss_cleaned_password = $this->security->xss_clean($this->input->post('password'), TRUE);

      $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[255]|min_length[4]|alpha_numeric');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[255]|min_length[4]|alpha_numeric');

      if($f_xss_cleaned_username === TRUE && $f_xss_cleaned_password === TRUE) {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[255]|min_length[4]|alpha_numeric', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[255]|min_length[4]|alpha_numeric', array('required' => 'You must provide a %s.'));
      }

    }

    if($this->form_validation->run() == FALSE) {

      $f_html_header = $this->htmlwrapper->get_header();
      if($this->session_model->get_session_value('Username')) {
          $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      }else {
        $f_html_navbar = $this->htmlwrapper->get_navbar();
      }
      $f_html_admin_login_input = $this->htmlwrapper->get_admin_login_input();
      $f_html_footer = $this->htmlwrapper->get_footer();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'admin_login_input' => $f_html_admin_login_input,
        'footer' => $f_html_footer
      );

      $this->load->view('adminpage-login.html', $data);

    }else {

      $this->login_model->set_admin_credintials($this->input->post('username'), $this->input->post('password'));
      $f_admin_result = $this->login_model->get_admin_info();

      if($f_admin_result === TRUE) {

        $this->session_model->set_session_value('Username', $this->input->post('username'));
        redirect('adminpage/admin_managing_page');

      }else {
        $this->session->set_flashdata('incorrect_user', 'User cannot be signed in because User does not exist.');
        redirect('adminpage/admin_login_form');
      }
    }

  }

  public function admin_managing_page() {

    header(base_url() . 'adminpage/admin_login_form');

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {
      $f_html_header = $this->htmlwrapper->get_header();
      $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      $f_html_admin_manage_bookings = $this->htmlwrapper->get_admin_manage_bookings_page($this->session_model->get_session_value('Username'));
      $f_html_footer = $this->htmlwrapper->get_footer();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'admin_manage_bookings' => $f_html_admin_manage_bookings,
        'footer' => $f_html_footer
      );

      $this->load->view('adminpage-loginsuccess.html', $data);
    }

  }

  public function admin_manage_bookings() {

    header(base_url() . 'adminpage/admin_login_form');

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {

      $f_info_array = $this->dictionary_model->get_info();

      $f_html_header = $this->htmlwrapper->get_header();
      if($this->session_model->get_session_value('Username')) {
          $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      }else {
        $f_html_navbar = $this->htmlwrapper->get_navbar();
      }
      $f_html_admin_bookings = $this->htmlwrapper->get_admin_bookings_page($f_info_array);
      $f_html_footer = $this->htmlwrapper->get_footer();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'admin_bookings' => $f_html_admin_bookings,
        'footer' => $f_html_footer
      );

      $this->load->view('adminpage-bookings.html', $data);

    }

  }

  public function admin_add_customer() {

    header(base_url() . 'adminpage/admin_login_form');

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {

    $this->form_validation->set_rules('firstname', 'Firstname', 'callback_field_check');
    $this->form_validation->set_rules('lastname', 'Lastname', 'callback_field_check');
    $this->form_validation->set_rules('email', 'E-mail', 'callback_field_check');
    $this->form_validation->set_rules('telephone', 'Telephone', 'callback_field_check');
    $this->form_validation->set_rules('restaurant', 'Restaurant', 'callback_field_check');
    $this->form_validation->set_rules('city', 'City', 'callback_field_check');
    $this->form_validation->set_rules('dropdowntable', 'Table', 'callback_field_check');
    $this->form_validation->set_rules('noofpeople', 'Number of People', 'callback_field_check');
    $this->form_validation->set_rules('date', 'Date', 'callback_field_check');
    $this->form_validation->set_rules('dropdowntime', 'Time', 'callback_field_check');

    if($this->input->post('firstname') || $this->input->post('lastname') || $this->input->post('email') || $this->input->post('telephone') || $this->input->post('restaurant') || $this->input->post('city') || $this->input->post('dropdowntable') || $this->input->post('noofpeople') || $this->input->post('date') || $this->input->post('dropdowntime')) {

        $f_xss_cleaned_firstname = $this->security->xss_clean($this->input->post('firstname'), TRUE);
        $f_xss_cleaned_lastname = $this->security->xss_clean($this->input->post('lastname'), TRUE);
        $f_xss_cleaned_email = $this->security->xss_clean($this->input->post('email'), TRUE);
        $f_xss_cleaned_telephone = $this->security->xss_clean($this->input->post('telephone'), TRUE);
        $f_xss_cleaned_restaurant = $this->security->xss_clean($this->input->post('restaurant'), TRUE);
        $f_xss_cleaned_city = $this->security->xss_clean($this->input->post('city'), TRUE);
        $f_xss_cleaned_dropdowntable = $this->security->xss_clean($this->input->post('dropdowntable'), TRUE);
        $f_xss_cleaned_noofpeople = $this->security->xss_clean($this->input->post('noofpeople'), TRUE);
        $f_xss_cleaned_date = $this->security->xss_clean($this->input->post('date'), TRUE);
        $f_xss_cleaned_dropdowntime = $this->security->xss_clean($this->input->post('dropdowntime'), TRUE);

        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|max_length[255]|min_length[4]|alpha');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|max_length[255]|min_length[4]|alpha');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|max_length[255]|min_length[4]|valid_email');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|max_length[11]|min_length[11]|numeric');
        $this->form_validation->set_rules('restaurant', 'Restaurant', 'trim|required|max_length[255]|min_length[4]|alpha_numeric_spaces');
        $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[128]|min_length[4]|alpha_numeric_spaces');
        $this->form_validation->set_rules('dropdowntable', 'Table', 'trim|required');
        $this->form_validation->set_rules('noofpeople', 'Number of People', 'trim|required|max_length[2]|min_length[1]|numeric');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('dropdowntime', 'Time', 'trim|required');

        if($f_xss_cleaned_firstname === TRUE && $f_xss_cleaned_lastname === TRUE && $f_xss_cleaned_email === TRUE && $f_xss_cleaned_telephone === TRUE && $f_xss_cleaned_restaurant === TRUE && $f_xss_cleaned_city === TRUE && $f_xss_cleaned_dropdowntable === TRUE && $f_xss_cleaned_noofpeople === TRUE && $f_xss_cleaned_date === TRUE && $f_xss_cleaned_dropdowntime === TRUE) {
            $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|max_length[255]|min_length[4]|alpha', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|max_length[255]|min_length[4]|alpha', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|max_length[255]|min_length[4]|valid_email', array('required' => 'You must provide an %s.'));
            $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|max_length[11]|min_length[11]|numeric', array('required' => 'You must provide a %s number.'));
            $this->form_validation->set_rules('restaurant', 'Restaurant', 'trim|required|max_length[255]|min_length[4]|alpha_numeric_spaces', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[128]|min_length[4]|alpha_numeric_spaces', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('dropdowntable', 'Table', 'trim|required', array('required' => 'You must provide a %s number.'));
            $this->form_validation->set_rules('noofpeople', 'Number of People', 'trim|required|max_length[2]|min_length[1]|numeric', array('required' => 'You must provide %s.'));
            $this->form_validation->set_rules('date', 'Date', 'trim|required', array('required' => 'You must provide %s.'));
            $this->form_validation->set_rules('dropdowntime', 'Time', 'trim|required', array('required' => 'You must provide $s.'));
        }
      }

      if($this->form_validation->run() == FALSE) {

        $f_html_header = $this->htmlwrapper->get_header();
        if($this->session_model->get_session_value('Username')) {
            $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
        }else {
          $f_html_navbar = $this->htmlwrapper->get_navbar();
        }
        $f_html_admin_add_customer_page = $this->htmlwrapper->get_admin_add_customer_page();
        $f_html_footer = $this->htmlwrapper->get_footer();

        $data = array(
          'header' => $f_html_header,
          'navbar' => $f_html_navbar,
          'admin_add_customer' => $f_html_admin_add_customer_page,
          'footer' => $f_html_footer
        );

        $this->load->view('adminpage-addcustomer.html', $data);

      }else {

        $this->dictionary_model->set_info($this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('email'), $this->input->post('telephone'), $this->input->post('restaurant'), $this->input->post('city'), $this->input->post('dropdowntable'), $this->input->post('noofpeople'), $this->input->post('date'), $this->input->post('dropdowntime'));
        $this->dictionary_model->process_add_info();

        $this->booking_model->set_restaurant_name($this->dictionary_model->get_restaurant_name());
        $this->booking_model->set_date($this->input->post('date'));

        if($this->booking_model->get_dates_full()) {
          if($this->dictionary_model->get_restaurant_name() == 'NY_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull1'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'NY_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull2'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'NY_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull3'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'HK_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull1'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'HK_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull2'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'HK_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull3'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'Paris_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull1'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'Paris_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull2'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'Paris_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull3'] = $f_dates_full;
          }
        }

        redirect('adminpage/admin_add_success');

      }

    }

  }

  public function admin_edit_customer() {

    header(base_url() . 'adminpage/admin_login_form');

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {

    $this->form_validation->set_rules('firstname', 'Firstname', 'callback_field_check');
    $this->form_validation->set_rules('lastname', 'Lastname', 'callback_field_check');
    $this->form_validation->set_rules('email', 'E-mail', 'callback_field_check');
    $this->form_validation->set_rules('telephone', 'Telephone', 'callback_field_check');
    $this->form_validation->set_rules('restaurant', 'Restaurant', 'callback_field_check');
    $this->form_validation->set_rules('city', 'City', 'callback_field_check');
    $this->form_validation->set_rules('dropdowntable', 'Table', 'callback_field_check');
    $this->form_validation->set_rules('noofpeople', 'Number of People', 'callback_field_check');
    $this->form_validation->set_rules('date', 'Date', 'callback_field_check');
    $this->form_validation->set_rules('dropdowntime', 'Time', 'callback_field_check');

    if($this->input->post('firstname') || $this->input->post('lastname') || $this->input->post('email') || $this->input->post('telephone') || $this->input->post('restaurant') || $this->input->post('city') || $this->input->post('dropdowntable') || $this->input->post('noofpeople') || $this->input->post('date') || $this->input->post('dropdowntime')) {

        $f_xss_cleaned_firstname = $this->security->xss_clean($this->input->post('firstname'), TRUE);
        $f_xss_cleaned_lastname = $this->security->xss_clean($this->input->post('lastname'), TRUE);
        $f_xss_cleaned_email = $this->security->xss_clean($this->input->post('email'), TRUE);
        $f_xss_cleaned_telephone = $this->security->xss_clean($this->input->post('telephone'), TRUE);
        $f_xss_cleaned_restaurant = $this->security->xss_clean($this->input->post('restaurant'), TRUE);
        $f_xss_cleaned_city = $this->security->xss_clean($this->input->post('city'), TRUE);
        $f_xss_cleaned_dropdowntable = $this->security->xss_clean($this->input->post('dropdowntable'), TRUE);
        $f_xss_cleaned_noofpeople = $this->security->xss_clean($this->input->post('noofpeople'), TRUE);
        $f_xss_cleaned_date = $this->security->xss_clean($this->input->post('date'), TRUE);
        $f_xss_cleaned_dropdowntime = $this->security->xss_clean($this->input->post('dropdowntime'), TRUE);

        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|max_length[255]|min_length[3]|alpha');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|max_length[255]|min_length[4]|alpha');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|max_length[255]|min_length[4]|valid_email');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|max_length[11]|min_length[11]|numeric');
        $this->form_validation->set_rules('restaurant', 'Restaurant', 'trim|required|max_length[255]|min_length[4]|alpha_numeric_spaces');
        $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[128]|min_length[4]|alpha_numeric_spaces');
        $this->form_validation->set_rules('dropdowntable', 'Table', 'trim|required');
        $this->form_validation->set_rules('noofpeople', 'Number of People', 'trim|required|max_length[2]|min_length[1]|numeric');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('dropdowntime', 'Time', 'trim|required');

        if($f_xss_cleaned_firstname === TRUE && $f_xss_cleaned_lastname === TRUE && $f_xss_cleaned_email === TRUE && $f_xss_cleaned_telephone === TRUE && $f_xss_cleaned_restaurant === TRUE && $f_xss_cleaned_city === TRUE && $f_xss_cleaned_dropdowntable === TRUE && $f_xss_cleaned_noofpeople === TRUE && $f_xss_cleaned_date === TRUE && $f_xss_cleaned_dropdowntime === TRUE) {
            $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|max_length[255]|min_length[3]|alpha', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|max_length[255]|min_length[4]|alpha', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|max_length[255]|min_length[4]|valid_email', array('required' => 'You must provide an %s.'));
            $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|max_length[11]|min_length[11]|numeric', array('required' => 'You must provide a %s number.'));
            $this->form_validation->set_rules('restaurant', 'Restaurant', 'trim|required|max_length[255]|min_length[4]|alpha_numeric_spaces', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[128]|min_length[4]|alpha_numeric_spaces', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('dropdowntable', 'Table', 'trim|required', array('required' => 'You must provide a %s number.'));
            $this->form_validation->set_rules('noofpeople', 'Number of People', 'trim|required|max_length[2]|min_length[1]|numeric', array('required' => 'You must provide %s.'));
            $this->form_validation->set_rules('date', 'Date', 'trim|required', array('required' => 'You must provide %s.'));
            $this->form_validation->set_rules('dropdowntime', 'Time', 'trim|required', array('required' => 'You must provide $s.'));
        }
      }

      if($this->form_validation->run() == FALSE) {

        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['mail']) && isset($_POST['pnumber']) && isset($_POST['des']) && isset($_POST['c']) && isset($_POST['tno']) && isset($_POST['noofpeople']) && isset($_POST['date']) && isset($_POST['time'])) {
            $this->session->set_userdata('fname', $this->input->post('fname'));
            $this->session->set_userdata('lname', $this->input->post('lname'));
            $this->session->set_userdata('mail', $this->input->post('mail'));
            $this->session->set_userdata('pnumber', $this->input->post('pnumber'));
            $this->session->set_userdata('des', $this->input->post('des'));
            $this->session->set_userdata('c', $this->input->post('c'));
            $this->session->set_userdata('tno', $this->input->post('tno'));
            $this->session->set_userdata('noofpeople', $this->input->post('noofpeople'));
            $this->session->set_userdata('date', $this->input->post('date'));
            $this->session->set_userdata('time', $this->input->post('time'));
        }

        $f_info_array = array();

        $f_info_array[0] = $this->session->get_userdata('');

        $f_html_header = $this->htmlwrapper->get_header();
        if($this->session_model->get_session_value('Username')) {
            $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
        }else {
          $f_html_navbar = $this->htmlwrapper->get_navbar();
        }
        $f_html_admin_edit_customer_page = $this->htmlwrapper->get_admin_edit_customer_page($f_info_array);
        $f_html_footer = $this->htmlwrapper->get_footer();

        $data = array(
          'header' => $f_html_header,
          'navbar' => $f_html_navbar,
          'admin_edit_customer' => $f_html_admin_edit_customer_page,
          'footer' => $f_html_footer
        );

        $this->load->view('adminpage-editcustomer.html', $data);

      }else {

        $f_info_array = array();

        $f_info_array[0] = $this->session->get_userdata('');

        $this->dictionary_model->set_previous_info($f_info_array);
        $this->dictionary_model->set_info($this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('email'), $this->input->post('telephone'), $this->input->post('restaurant'), $this->input->post('city'), $this->input->post('dropdowntable'), $this->input->post('noofpeople'), $this->input->post('date'), $this->input->post('dropdowntime'));
        $this->dictionary_model->process_edit_info();

        $this->booking_model->set_restaurant_name($this->dictionary_model->get_restaurant_name());
        $this->booking_model->set_date($this->input->post('date'));

        if($this->booking_model->get_dates_full()) {
          if($this->dictionary_model->get_restaurant_name() == 'NY_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull1'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'NY_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull2'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'NY_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull3'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'HK_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull1'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'HK_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull2'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'HK_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull3'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'Paris_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull1'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'Paris_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull2'] = $f_dates_full;
          }
          if($this->dictionary_model->get_restaurant_name() == 'Paris_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull3'] = $f_dates_full;
          }
        }

        redirect('adminpage/admin_edit_success');

      }

    }

  }

  public function admin_add_success() {

    header(base_url() . 'adminpage/admin_login_form');

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {
      $f_html_header = $this->htmlwrapper->get_header();
      $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      $f_html_admin_success_page = $this->htmlwrapper->get_admin_success_page(' added');
      $f_html_footer = $this->htmlwrapper->get_footer();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'admin_success_page' => $f_html_admin_success_page,
        'footer' => $f_html_footer
      );

      $this->load->view('admin-success.html', $data);
    }

  }

  public function admin_edit_success() {

    header(base_url() . 'adminpage/admin_login_form');

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {
      $f_html_header = $this->htmlwrapper->get_header();
      $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      $f_html_admin_success_page = $this->htmlwrapper->get_admin_success_page(' edited');
      $f_html_footer = $this->htmlwrapper->get_footer();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'admin_success_page' => $f_html_admin_success_page,
        'footer' => $f_html_footer
      );

      $this->load->view('admin-success.html', $data);
    }

  }

  public function admin_delete_success() {

    header(base_url() . 'adminpage/admin_login_form');

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['mail']) && isset($_POST['pnumber']) && isset($_POST['des']) && isset($_POST['c']) && isset($_POST['tno']) && isset($_POST['noofpeople']) && isset($_POST['date']) && isset($_POST['time'])) {
        $this->session->set_userdata('fname', $this->input->post('fname'));
        $this->session->set_userdata('lname', $this->input->post('lname'));
        $this->session->set_userdata('mail', $this->input->post('mail'));
        $this->session->set_userdata('pnumber', $this->input->post('pnumber'));
        $this->session->set_userdata('des', $this->input->post('des'));
        $this->session->set_userdata('c', $this->input->post('c'));
        $this->session->set_userdata('tno', $this->input->post('tno'));
        $this->session->set_userdata('noofpeople', $this->input->post('noofpeople'));
        $this->session->set_userdata('date', $this->input->post('date'));
        $this->session->set_userdata('time', $this->input->post('time'));
    }

    $f_info_array = array();

    $f_info_array[0] = $this->session->get_userdata('');

    $this->dictionary_model->set_previous_info($f_info_array);
    $this->dictionary_model->process_delete_info();

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {
      $f_html_header = $this->htmlwrapper->get_header();
      $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      $f_html_admin_success_page = $this->htmlwrapper->get_admin_success_page(' deleted');
      $f_html_footer = $this->htmlwrapper->get_footer();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'admin_success_page' => $f_html_admin_success_page,
        'footer' => $f_html_footer
      );

      $this->load->view('admin-success.html', $data);
    }

  }

  public function admin_check_reservations_dates() {

    if($this->session_model->get_session_value('Username') === FALSE) {
      redirect('adminpage/admin_login_form');
    }else {
      $f_html_header = $this->htmlwrapper->get_header();
      $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      $f_html_admin_check_reservations_page = $this->htmlwrapper->get_admin_check_reservations_page();
      $f_html_footer = $this->htmlwrapper->get_footer();

      $f_reservation_dates = $this->reservationdates_model->get_reservation_dates_results();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'admin_check_reservations_page' => $f_html_admin_check_reservations_page,
        'reservation_dates' => $f_reservation_dates,
        'footer' => $f_html_footer
      );

      $this->load->view('admin_check_reservations.html', $data);
    }

  }

  public function admin_logout() {

    $this->session_model->unset_session_value('Username');
    redirect('adminpage/admin_login_form');

  }

  public function field_check($p_field)
  {
    if ($p_field == '')
    {
      $this->form_validation->set_message('field_check', 'The {field} field is empty');
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
}

 ?>
