<?php

class Contactus extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = 465;
    $config['smtp_user'] = 'rrs.uniproject@gmail.com';
    $config['smtp_pass'] = 'rrsproject123';

    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
  }

  public function query()
  {

    $this->form_validation->set_rules('name', 'Name', 'callback_field_check');
    $this->form_validation->set_rules('email', 'Email', 'callback_field_check');
    $this->form_validation->set_rules('comment', 'Comment', 'callback_field_check');

    if($this->input->post('name') || $this->input->post('email') || $this->input->post('comment')) {

      $f_xss_cleaned_username = $this->security->xss_clean($this->input->post('username'), TRUE);
      $f_xss_cleaned_password = $this->security->xss_clean($this->input->post('password'), TRUE);
      $f_xss_cleaned_password = $this->security->xss_clean($this->input->post('comment'), TRUE);

      $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|min_length[4]|alpha_numeric');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[255]|min_length[4]|valid_email');
      $this->form_validation->set_rules('comment', 'Comment', 'trim|required|max_length[255]|min_length[4]|alpha_numeric_spaces');

      if($f_xss_cleaned_username === TRUE && $f_xss_cleaned_password === TRUE) {

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|min_length[4]|alpha_numeric', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[255]|min_length[4]|valid_email', array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|max_length[255]|min_length[4]', array('required' => 'You must provide a %s.'));
      }

    }

    if($this->form_validation->run() == FALSE) {

      $f_html_header = $this->htmlwrapper->get_header();
      if($this->session_model->get_session_value('Username')) {
          $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
      }else {
        $f_html_navbar = $this->htmlwrapper->get_navbar();
      }
      $f_html_email_input = $this->htmlwrapper->get_email_input();
      $f_html_footer = $this->htmlwrapper->get_footer();

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'email_input' => $f_html_email_input,
        'footer' => $f_html_footer
      );

      $this->load->view('contactus.html', $data);

    }else {

      $m_sender = $this->input->post('name');
      $m_sender_email = $this->input->post('email');
      $m_sender_comment = $this->input->post('comment');

      $this->email->from($m_sender_email, $m_sender);
      $this->email->to('rrs.uniproject@gmail.com');
      $this->email->subject('Query by - ' . $m_sender . ' ' . $m_sender_email);
      $this->email->message($m_sender_comment);
      $this->email->send();

      redirect('Contactus/sent_success');

    }

  }

  public function sent_success() {

    header(base_url() . 'Contactus/query');

    $f_html_header = $this->htmlwrapper->get_header();
    if($this->session_model->get_session_value('Username')) {
        $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
    }else {
      $f_html_navbar = $this->htmlwrapper->get_navbar();
    }
    $f_html_email_sent_success = $this->htmlwrapper->get_email_sent_success_page();
    $f_html_footer = $this->htmlwrapper->get_footer();

    $data = array(
      'header' => $f_html_header,
      'navbar' => $f_html_navbar,
      'email_sent_success' => $f_html_email_sent_success,
      'footer' => $f_html_footer
    );

    $this->load->view('contactus-emailsentsuccess.html', $data);

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
