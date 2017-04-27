<?php

class Booking extends CI_Controller{

  private $f_date;
  private $f_arr_time_info;
  private $f_arr_reserved_time_info;
  private $f_dates_full;

  public function __construct()
  {
    parent::__construct();

  }

  public function customer_booking() {

    $f_res_name = $this->session_model->get_session_value('Restaurant');
    $this->booking_model->set_restaurant_name($this->session_model->get_session_value('Restaurant'));

    $f_arr_time_info = $this->booking_model->get_restaurant_times();
    $f_arr_table_info = $this->booking_model->get_tables();

    $this->form_validation->set_rules('firstname', 'Firstname', 'callback_field_check');
    $this->form_validation->set_rules('lastname', 'Lastname', 'callback_field_check');
    $this->form_validation->set_rules('email', 'E-mail', 'callback_field_check');
    $this->form_validation->set_rules('telephone', 'Telephone', 'callback_field_check');
    $this->form_validation->set_rules('date', 'Date', 'callback_field_check');
    $this->form_validation->set_rules('dropdowntime', 'Time', 'callback_field_check');
    $this->form_validation->set_rules('dropdowntable', 'Table', 'callback_field_check');
    $this->form_validation->set_rules('noofpeople', 'Number of People', 'callback_field_check');
    $this->form_validation->set_rules('tablecapacity', 'Number of People', 'callback_capacity_check');
    $this->form_validation->set_rules('tablecapacity', 'Table Capacity', 'callback_field_check');
    $this->form_validation->set_rules('agree', 'Agree', 'callback_field_check');

    if($this->input->post('firstname') || $this->input->post('lastname') || $this->input->post('email') || $this->input->post('telephone') || $this->input->post('date') || $this->input->post('noofpeople') || $this->input->post('tablecapacity') || $this->input->post('agree')) {

      $f_xss_cleaned_firstname = $this->security->xss_clean($this->input->post('firstname'), TRUE);
      $f_xss_cleaned_lastname = $this->security->xss_clean($this->input->post('lastname'), TRUE);
      $f_xss_cleaned_email = $this->security->xss_clean($this->input->post('email'), TRUE);
      $f_xss_cleaned_telephone = $this->security->xss_clean($this->input->post('telephone'), TRUE);
      $f_xss_cleaned_date = $this->security->xss_clean($this->input->post('date'), TRUE);
      $f_xss_cleaned_noofpeople = $this->security->xss_clean($this->input->post('noofpeople'), TRUE);
      $f_xss_cleaned_dropdowntime = $this->security->xss_clean($this->input->post('dropdowntime'), TRUE);
      $f_xss_cleaned_dropdowntable = $this->security->xss_clean($this->input->post('dropdowntable'), TRUE);
      $f_xss_cleaned_tablecapacity = $this->security->xss_clean($this->input->post('tablecapacity'), TRUE);
      $f_xss_cleaned_agree = $this->security->xss_clean($this->input->post('agree'), TRUE);

      $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|max_length[255]|min_length[4]|alpha');
      $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|max_length[255]|min_length[4]|alpha');
      $this->form_validation->set_rules('email', 'E-mail', 'trim|required|max_length[255]|min_length[4]|valid_email');
      $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|max_length[11]|min_length[11]|numeric');
      $this->form_validation->set_rules('date', 'Date', 'trim|required');
      $this->form_validation->set_rules('dropdowntime', 'Time', 'trim|required');
      $this->form_validation->set_rules('dropdowntable', 'Table', 'trim|required');
      $this->form_validation->set_rules('noofpeople', 'Number of People', 'trim|required|max_length[2]|min_length[1]|numeric');
      $this->form_validation->set_rules('tablecapacity', 'Table Capacity', 'trim|required|max_length[2]|min_length[1]|numeric');
      $this->form_validation->set_rules('agree', 'Agree', 'trim|required');

      if($f_xss_cleaned_firstname === TRUE && $f_xss_cleaned_lastname === TRUE && $f_xss_cleaned_email === TRUE && $f_xss_cleaned_telephone === TRUE && $f_xss_cleaned_date === TRUE && $f_xss_cleaned_noofpeople === TRUE && $f_xss_cleaned_agree === TRUE && $f_xss_cleaned_dropdowntime === TRUE && $f_xss_cleaned_dropdowntable === TRUE && $f_xss_cleaned_tablecapacity === TRUE) {
          $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|max_length[255]|min_length[4]|alpha', array('required' => 'You must provide a %s.'));
          $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|max_length[255]|min_length[4]|alpha', array('required' => 'You must provide a %s.'));
          $this->form_validation->set_rules('email', 'E-mail', 'trim|required|max_length[255]|min_length[4]|valid_email', array('required' => 'You must provide an %s.'));
          $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|max_length[11]|min_length[11]|numeric', array('required' => 'You must provide a %s number.'));
          $this->form_validation->set_rules('date', 'Date', 'trim|required', array('required' => 'You must provide a %s.'));
          $this->form_validation->set_rules('dropdowntime', 'Time', 'trim|required', array('required' => 'You must provide a %s.'));
          $this->form_validation->set_rules('dropdowntable', 'Table', 'trim|required', array('required' => 'You must provide a %s number.'));
          $this->form_validation->set_rules('noofpeople', 'Number of People', 'trim|required|max_length[2]|min_length[1]|numeric', array('required' => 'You must provide %s.'));
          $this->form_validation->set_rules('tablecapacity', 'Table Capacity', 'trim|required|max_length[2]|min_length[1]|numeric', array('required' => 'You must provide %s.'));
          $this->form_validation->set_rules('agree', 'Agree', 'trim|required', array('required' => 'You must agree before you can confirm booking.'));
      }
    }

      if($this->form_validation->run() == FALSE) {

        $f_html_header = $this->htmlwrapper->get_header();
        if($this->session_model->get_session_value('Username')) {
            $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
        }else {
          $f_html_navbar = $this->htmlwrapper->get_navbar();
        }

        $f_html_booking = $this->htmlwrapper->get_booking_page();
        $f_html_footer = $this->htmlwrapper->get_footer();
        $f_js_script = '<script src=' . base_url() . 'public/js/jquery-3.1.1.min.js></script>';
        $f_js_script .= '<script src=' . base_url() . 'public/js/jquery-ui.js></script>';

        if($this->booking_model->get_time_reserved()) {
          $f_arr_reserved_time_info = $this->booking_model->get_time_reserved();
        }else {
          $f_arr_reserved_time_info = array();
        }

        if($this->booking_model->get_tables_reserved()) {
          $f_arr_reserved_table_info = $this->booking_model->get_tables_reserved();
        }else {
          $f_arr_reserved_table_info = array();
        }

        if(isset($_SESSION['NYDatesFull1']) && $this->session_model->get_session_value('Restaurant') == 'NY_Res_1') {
           $f_dates_full = $_SESSION['NYDatesFull1'];
        }else if(isset($_SESSION['NYDatesFull2']) && $this->session_model->get_session_value('Restaurant') == 'NY_Res_2'){
          $f_dates_full = $_SESSION['NYDatesFull2'];
        }else if(isset($_SESSION['NYDatesFull3']) && $this->session_model->get_session_value('Restaurant') == 'NY_Res_3'){
          $f_dates_full = $_SESSION['NYDatesFull3'];
        }else if(isset($_SESSION['HKDatesFull1']) && $this->session_model->get_session_value('Restaurant') == 'HK_Res_1'){
          $f_dates_full = $_SESSION['HKDatesFull1'];
        }else if(isset($_SESSION['HKDatesFull2']) && $this->session_model->get_session_value('Restaurant') == 'HK_Res_2'){
          $f_dates_full = $_SESSION['HKDatesFull2'];
        }else if(isset($_SESSION['HKDatesFull3']) && $this->session_model->get_session_value('Restaurant') == 'HK_Res_3'){
          $f_dates_full = $_SESSION['HKDatesFull3'];
        }else if(isset($_SESSION['ParisDatesFull1']) && $this->session_model->get_session_value('Restaurant') == 'Paris_Res_1'){
          $f_dates_full = $_SESSION['ParisDatesFull1'];
        }else if(isset($_SESSION['ParisDatesFull2']) && $this->session_model->get_session_value('Restaurant') == 'Paris_Res_2'){
          $f_dates_full = $_SESSION['ParisDatesFull2'];
        }else if(isset($_SESSION['ParisDatesFull3']) && $this->session_model->get_session_value('Restaurant') == 'Paris_Res_3'){
          $f_dates_full = $_SESSION['ParisDatesFull3'];
        }else {
          $f_dates_full = array();
        }

        $data = array(
          'header' => $f_html_header,
          'navbar' => $f_html_navbar,
          'booking' => $f_html_booking,
          'footer' => $f_html_footer,
          'datesfull' => $f_dates_full,
          'reservedtimes' => $f_arr_reserved_time_info,
          'times' => $f_arr_time_info,
          'reservedtables' => $f_arr_reserved_table_info,
          'table' => $f_arr_table_info,
          'js' => $f_js_script
        );

        $this->load->view('bookingpage.html', $data);

      }else {

        $f_booked = false;

        $this->booking_model->set_restaurant_name($this->session_model->get_session_value('Restaurant'));
        $this->booking_model->set_customer_data($this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('email'), $this->input->post('telephone'));
        $this->booking_model->set_date($this->input->post('date'));
        $this->booking_model->set_time($this->input->post('dropdowntime'));
        $this->booking_model->set_tableno($this->input->post('dropdowntable'));
        $this->booking_model->set_number_of_people($this->input->post('noofpeople'));
        $this->booking_model->process_info();

        if($this->booking_model->get_dates_full()) {
          if($this->session_model->get_session_value('Restaurant') == 'NY_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull1'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'NY_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull2'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'NY_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['NYDatesFull3'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'HK_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull1'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'HK_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull2'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'HK_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['HKDatesFull3'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'Paris_Res_1') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull1'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'Paris_Res_2') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull2'] = $f_dates_full;
          }
          if($this->session_model->get_session_value('Restaurant') == 'Paris_Res_3') {
            $f_dates_full = $this->booking_model->get_arr_dates_full();
            $_SESSION['ParisDatesFull3'] = $f_dates_full;
          }
        }

        $f_booked = true;

        if($f_booked) {

          redirect('booking/booking_success');

        }else {

          redirect('booking/customer_booking');

        }

      }

  }

  public function booking_success() {

    $f_html_header = $this->htmlwrapper->get_header();
    if($this->session_model->get_session_value('Username')) {
        $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
    }else {
      $f_html_navbar = $this->htmlwrapper->get_navbar();
    }
    $f_html_booking_success = $this->htmlwrapper->get_booking_success_page();
    $f_html_footer = $this->htmlwrapper->get_footer();

    $data = array(
      'header' => $f_html_header,
      'navbar' => $f_html_navbar,
      'booking_success' => $f_html_booking_success,
      'footer' => $f_html_footer
    );

    $this->load->view('booking-bookingsuccess.html', $data);

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

  public function capacity_check($p_tc)
  {

    $noofpeople = $this->input->post('noofpeople');

    if ($noofpeople < 1 || $noofpeople > $p_tc)
    {
      $this->form_validation->set_message('capacity_check', 'The {field} field is less than or greater than the actual table capacity.');
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }

}

?>
