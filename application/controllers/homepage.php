<?php

class Homepage extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

    $f_images = array(
      'image1' => 'HK-thumb.jpg',
      'image2' => 'NY-thumb.jpg',
      'image3' => 'Paris-thumb.jpg'
    );

    $f_html_header = $this->htmlwrapper->get_header();
    if($this->session_model->get_session_value('Username')) {
        $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
    }else {
      $f_html_navbar = $this->htmlwrapper->get_navbar();
    }
    $f_html_bhc = $this->htmlwrapper->get_banner_header_content();
    $f_html_mbc = $this->htmlwrapper->get_middle_banner_content($f_images);
    $f_html_footer = $this->htmlwrapper->get_footer();

    $data = array(
      'header' => $f_html_header,
      'navbar' => $f_html_navbar,
      'bhc' => $f_html_bhc,
      'mbc' => $f_html_mbc,
      'footer' => $f_html_footer
    );

    $this->load->view('index.html', $data);
  }

}

?>
