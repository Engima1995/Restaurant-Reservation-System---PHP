<?php

class Aboutus extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  public function info()
  {

    $f_html_header = $this->htmlwrapper->get_header();
    if($this->session_model->get_session_value('Username')) {
        $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
    }else {
      $f_html_navbar = $this->htmlwrapper->get_navbar();
    }
    $f_html_about_us = $this->htmlwrapper->get_about_us_page();
    $f_html_footer = $this->htmlwrapper->get_footer();

    $data = array(
      'header' => $f_html_header,
      'navbar' => $f_html_navbar,
      'about' => $f_html_about_us,
      'footer' => $f_html_footer
    );

    $this->load->view('aboutus.html', $data);
    
  }

}

?>
