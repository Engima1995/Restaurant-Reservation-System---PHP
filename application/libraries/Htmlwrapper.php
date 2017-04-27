<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Htmlwrapper {

  private $c_header;
  private $c_navbar;
  private $c_bhc;
  private $c_mbc;
  private $c_admin_login_input;
  private $c_admin_manage_bookings;
  private $c_admin_bookings;
  private $c_admin_add_customer;
  private $c_admin_edit_customer;
  private $c_admin_success_page;
  private $c_admin_check_reservations_page;
  private $c_about_us_page;
  private $c_email_input;
  private $c_email_sent_success_page;
  private $c_restaurants_page;
  private $c_restaurants_info_page;
  private $c_booking_page;
  private $c_booking_success_page;
  private $c_footer;

  public function __construct(){
    $c_header = null;
    $c_navbar = null;
    $c_bhc = null;
    $c_mbc = null;
    $c_admin_login_input = null;
    $c_admin_manage_bookings = null;
    $c_admin_bookings = null;
    $c_admin_add_customer = null;
    $c_admin_edit_customer = null;
    $c_admin_success_page = null;
    $c_admin_check_reservations_page = null;
    $c_about_us_page = null;
    $c_email_input = null;
    $c_email_sent_success_page = null;
    $c_restaurants_page = null;
    $c_restaurants_info_page = null;
    $c_booking_page = null;
    $c_booking_success_page = null;
    $c_footer = null;
  }

  public function __destruct(){}

  public function get_header() {
    $this->do_header();
    return $this->c_header;
  }

  public function get_navbar($p_path = 'adminpage/admin_login_form') {
    $this->do_navbar($p_path);
    return $this->c_navbar;
  }

  public function get_banner_header_content() {
    $this->do_banner_header_content();
    return $this->c_bhc;
  }

  public function get_middle_banner_content($p_image_array = array()) {
    $this->do_middle_banner_content($p_image_array);
    return $this->c_mbc;
  }

  public function get_admin_login_input() {
    $this->do_admin_login_input();
    return $this->c_admin_login_input;
  }

  public function get_admin_manage_bookings_page($p_session_key = '') {
    $this->do_admin_manage_bookings_page($p_session_key);
    return $this->c_admin_manage_bookings;
  }

  public function get_admin_bookings_page($p_info_array = array()) {
    $this->do_admin_bookings_page($p_info_array);
    return $this->c_admin_bookings;
  }

  public function get_admin_add_customer_page() {
    $this->do_admin_add_customer_page();
    return $this->c_admin_add_customer;
  }

  public function get_admin_edit_customer_page($p_array = array()) {
    $this->do_admin_edit_customer_page($p_array);
    return $this->c_admin_edit_customer;
  }

  public function get_admin_success_page($p_value = '') {
    $this->do_admin_success_page($p_value);
    return $this->c_admin_success_page;
  }

  public function get_admin_check_reservations_page() {
    $this->do_admin_check_reservations_page();
    return $this->c_admin_check_reservations_page;
  }

  public function get_about_us_page() {
    $this->do_about_us_page();
    return $this->c_about_us_page;
  }

  public function get_email_input() {
    $this->do_email_input();
    return $this->c_email_input;
  }

  public function get_email_sent_success_page() {
    $this->do_email_sent_success_page();
    return $this->c_email_sent_success_page;
  }

  public function get_restaurants_page($p_heading = null, $p_images_array = array(), $p_information_array = array(), $p_path_array = array()) {
    $this->do_restaurants_page($p_heading, $p_images_array, $p_information_array, $p_path_array);
    return $this->c_restaurants_page;
  }

  public function get_restaurants_info_page($p_review = array(), $p_menu = array(), $p_gallery = array()) {
    $this->do_restaurants_info_page($p_review, $p_menu, $p_gallery);
    return $this->c_restaurants_info_page;
  }

  public function get_booking_page() {
    $this->do_booking_page();
    return $this->c_booking_page;
  }

  public function get_booking_success_page() {
    $this->do_booking_success_page();
    return $this->c_booking_success_page;
  }

  public function get_footer() {
    $this->do_footer();
    return $this->c_footer;
  }

  private function do_header() {
    $m_header = '';
    $m_header .= '<meta charset="utf-8">';
    $m_header .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
    $m_header .= '<meta name="description" content="">';
    $m_header .= '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">';
    $m_header .= '<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">';
    $m_header .= '<link rel="stylesheet" href=' . base_url() . 'public/css/bootstrap.min.css type=text/css />';
    $m_header .= '<link rel="stylesheet" href=' . base_url() . 'public/css/bootstrap-theme.min.css type=text/css />';
    $m_header .= '<link rel="stylesheet" href=' . base_url() . 'public/css/style.css type=text/css />';
    $m_header .= '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
    $m_header .= '<link rel="stylesheet" href="/resources/demos/style.css">';
    $m_header .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
    $m_header .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    $m_header .= '<title>Restaurant Reservation System</title>';
    $this->c_header = $m_header;
  }

  private function do_navbar($p_path) {

    $m_navbar = '';
    $m_navbar .= '<nav class="navbar navbar-default">';
    $m_navbar .= '<div class="container-fluid">';
    $m_navbar .= '<div class="navbar-header">';
    $m_navbar .= '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">';
    $m_navbar .= '<span class="sr-only">Toggle navigation</span>';
    $m_navbar .= '<span class="icon-bar"></span>';
    $m_navbar .= '<span class="icon-bar"></span>';
    $m_navbar .= '<span class="icon-bar"></span>';
    $m_navbar .= '</button>';
    $m_navbar .= '<a class="navbar-brand" href=' . base_url() . 'homepage>RSS</a>';
    $m_navbar .= '</div>';
    $m_navbar .= '<div id="navbar" class="navbar-collapse collapse pull-right">';
    $m_navbar .= '<ul class="nav navbar-nav">';
    $m_navbar .= '<li><a href=' . base_url() . $p_path . '>Admin Page</a></li>';
    $m_navbar .= '<li><a href=' . base_url() . 'Aboutus/info>About Us</a></li>';
    $m_navbar .= '<li><a href=' . base_url() . 'Contactus/query>Contact Us</a></li>';
    $m_navbar .= '</ul>';
    $m_navbar .= '</div>';
    $m_navbar .= '</div>';
    $m_navbar .= '</nav>';

    $this->c_navbar = $m_navbar;

  }

  private function do_banner_header_content() {
    $m_bhc = '';
    $m_bhc = '<h1>Welcome to RSS</h1>';
    $m_bhc .= '<h3>We Provide Information On The Best Cities and Restaurants For Your Food Choice.</h3>';
    $this->c_bhc = $m_bhc;
  }

  private function do_middle_banner_content($p_image_array) {
    $m_array_of_places = array('hongkong', 'newyork', 'paris');
    $m_counter = 0;

    $m_mbc = '';
    $m_mbc .= '<h1>Browse Cities</h1>';
    $m_mbc .= '<section class=row>';
    foreach($p_image_array as $image) {
      $m_mbc .= '<section class="images">';
      $m_mbc .= '<a href=' . base_url() . 'Restaurants/' . $m_array_of_places[$m_counter] . '><img class="col-lg-4" src=' . base_url() . 'public/images/Cities/' . $image . ' /></a>';
      $m_mbc .= '</section>';
      $m_counter++;
    }
    $m_mbc .= '</section>';

    $this->c_mbc = $m_mbc;
  }

  private function do_admin_login_input() {
    $m_admin_login_input = '';
    $m_admin_login_input .= '<h1>Admin Sign In - </h1>';
    $m_admin_login_input .= '<input type="text" name="username" value="" placeholder="Username ..."/>';
    $m_admin_login_input .= '<input type="password" name="password" value="" placeholder="Password ..."/>';
    $m_admin_login_input .= '<input type="submit" value="Submit" />';
    $this->c_admin_login_input = $m_admin_login_input;
  }

  private function do_admin_manage_bookings_page($p_session_key) {
    $m_admin_manage_bookings = '';
    $m_admin_manage_bookings .= '<nav>';
    $m_admin_manage_bookings .= '<ul class="nav navbar-nav">';
    $m_admin_manage_bookings .= '<li><a href=' . base_url() . 'adminpage/admin_manage_bookings>Manage Bookings</a></li>';
    $m_admin_manage_bookings .= '<li><a href=' . base_url() . 'adminpage/admin_check_reservations_dates>Check Reservation Dates</a></li>';
    $m_admin_manage_bookings .= '<li><a href=' . base_url() . 'adminpage/admin_logout>Logout</a></li>';
    $m_admin_manage_bookings .= '</ul>';
    $m_admin_manage_bookings .= '</nav>';

    $m_admin_manage_bookings .= '<section>';
    $m_admin_manage_bookings .= '<h1>Welcome, ' . $p_session_key . '</h1>';
    $m_admin_manage_bookings .= '<p>Check for updates within Bookings to see if customers are waiting for reservations.</p>';
    $m_admin_manage_bookings .= '<p>Check dates for reservations.</p>';
    $m_admin_manage_bookings .= '</section>';
    $this->c_admin_manage_bookings = $m_admin_manage_bookings;
  }

  private function do_admin_bookings_page($p_info_array) {
    $m_admin_bookings = '';
    $m_admin_bookings .= '<nav>';
    $m_admin_bookings .= '<ul class="nav navbar-nav">';
    $m_admin_bookings .= '<li><a href=' . base_url() . 'adminpage/admin_manage_bookings>Manage Bookings</a></li>';
    $m_admin_bookings .= '<li><a href=' . base_url() . 'adminpage/admin_check_reservations_dates>Check Reservation Dates</a></li>';
    $m_admin_bookings .= '<li><a href=' . base_url() . 'adminpage/admin_logout>Logout</a></li>';
    $m_admin_bookings .= '</ul>';
    $m_admin_bookings .= '</nav>';

    $m_admin_bookings .= '<section>';
    $m_admin_bookings .= '<h1>Manage Bookings</h1>';
    $m_admin_bookings .= '<p>Select only one value, more than one will not work because of the POST update. Try to refresh if new value is required.</p>';
    $m_admin_bookings .= '<a href=' . base_url() .'adminpage/admin_add_customer>Add Customer</a>';
    $m_admin_bookings .= '<table>';
    $m_admin_bookings .= '<tr>';
    $m_admin_bookings .= '<th>Firstname</th>';
    $m_admin_bookings .= '<th>Lastname</th>';
    $m_admin_bookings .= '<th>Email</th>';
    $m_admin_bookings .= '<th>Phone Number</th>';
    $m_admin_bookings .= '<th>Restaurant Name</th>';
    $m_admin_bookings .= '<th>City</th>';
    $m_admin_bookings .= '<th>Table Number</th>';
    $m_admin_bookings .= '<th>Number of People</th>';
    $m_admin_bookings .= '<th>Date Booked</th>';
    $m_admin_bookings .= '<th>Time Booked</th>';
    $m_admin_bookings .= '<th></th>';
    $m_admin_bookings .= '<th></th>';
    $m_admin_bookings .= '<th></th>';
    $m_admin_bookings .= '</tr>';

    for($i=0; $i<sizeof($p_info_array); $i++) {
      $m_admin_bookings .= '<tr>';
      $m_admin_bookings .= '<td class="firstname">' . $p_info_array[$i]->firstname . '</td>';
      $m_admin_bookings .= '<td class="lastname">' . $p_info_array[$i]->lastname . '</td>';
      $m_admin_bookings .= '<td class="email">' . $p_info_array[$i]->email . '</td>';
      $m_admin_bookings .= '<td class="phonenumber">' . $p_info_array[$i]->phonenumber . '</td>';
      $m_admin_bookings .= '<td class="description">' . $p_info_array[$i]->description . '</td>';
      $m_admin_bookings .= '<td class="city">' . $p_info_array[$i]->city . '</td>';
      $m_admin_bookings .= '<td class="tableno">' . $p_info_array[$i]->tableno . '</td>';
      $m_admin_bookings .= '<td class="numberofpeople">' . $p_info_array[$i]->numberofpeople . '</td>';
      $m_admin_bookings .= '<td class="dates">' . $p_info_array[$i]->dates . '</td>';
      $m_admin_bookings .= '<td class="times">' . $p_info_array[$i]->times . '</td>';
      $m_admin_bookings .= '<td><input class="custinfo" type="radio" name="select"></td>';
      $m_admin_bookings .= '<td><a href='. base_url() . 'adminpage/admin_edit_customer' . '>Edit Information</a></td>';
      $m_admin_bookings .= '<td><a href='. base_url() . 'adminpage/admin_delete_success' . '>Delete Information</a></td>';
      $m_admin_bookings .= '</tr>';
    }

    $m_admin_bookings .= '</table>';
    $m_admin_bookings .= '</section>';
    $this->c_admin_bookings = $m_admin_bookings;
  }

  private function do_admin_add_customer_page() {
    $m_admin_add_customer = '';
    $m_admin_add_customer .= '<nav>';
    $m_admin_add_customer .= '<ul class="nav navbar-nav">';
    $m_admin_add_customer .= '<li><a href=' . base_url() . 'adminpage/admin_manage_bookings>Manage Bookings</a></li>';
    $m_admin_add_customer .= '<li><a href=' . base_url() . 'adminpage/admin_check_reservations_dates>Check Reservation Dates</a></li>';
    $m_admin_add_customer .= '<li><a href=' . base_url() . 'adminpage/admin_logout>Logout</a></li>';
    $m_admin_add_customer .= '</ul>';
    $m_admin_add_customer .= '</nav>';
    $m_admin_add_customer .= '<section><h1>Add Customer Information - </h1>';
    $m_admin_add_customer .= '<ul>';
    $m_admin_add_customer .= '<p>Current Version only supports the following Restaurants and Cities.</p><p>Make sure to type values exactly as it is shown. Match the numbers of restaurants and cities.</p><p>There is currently no support for error handling.</p>';
    $m_admin_add_customer .= '<h3>Restaurants</h3>';
    $m_admin_add_customer .= '<li>1. Chinese Street Food</li>';
    $m_admin_add_customer .= '<li>1. Michelin Star Restaurant</li>';
    $m_admin_add_customer .= '<li>1. Jumbo Kingdom</li>';
    $m_admin_add_customer .= '<li>2. Indian Restaurant</li>';
    $m_admin_add_customer .= '<li>2. Southern Hospitality</li>';
    $m_admin_add_customer .= '<li>2. Balthazar</li>';
    $m_admin_add_customer .= '<li>3. Pizza Palace</li>';
    $m_admin_add_customer .= '<li>3. Entrecoteone</li>';
    $m_admin_add_customer .= '<li>3. Entrecotetwo</li>';
    $m_admin_add_customer .= '</ul>';
    $m_admin_add_customer .= '<ul>';
    $m_admin_add_customer .= '<h3>City</h3>';
    $m_admin_add_customer .= '<li>1. HongKong</li>';
    $m_admin_add_customer .= '<li>2. NewYork</li>';
    $m_admin_add_customer .= '<li>3. Paris</li>';
    $m_admin_add_customer .= '</ul>';
    $m_admin_add_customer .= '<input type="text" name="firstname" value="" placeholder="Firstname ..."/>';
    $m_admin_add_customer .= '<input type="text" name="lastname" value="" placeholder="Lastname ..."/>';
    $m_admin_add_customer .= '<input type="text" name="email" value="" placeholder="Email ..."/>';
    $m_admin_add_customer .= '<input type="text" name="telephone" value="" placeholder="Phone Number ..."/>';
    $m_admin_add_customer .= '<select id="restaurantoptions" name="restaurant">';
    $m_admin_add_customer .= '<option value="Chinese Street Food">Chinese Street Food</option>';
    $m_admin_add_customer .= '<option value="Michelin Star Restaurant">Michelin Star Restaurant</option>';
    $m_admin_add_customer .= '<option value="Jumbo Kingdom">Jumbo Kingdom</option>';
    $m_admin_add_customer .= '<option value="Indian Restaurant">Indian Restaurant</option>';
    $m_admin_add_customer .= '<option value="Southern Hospitality">Southern Hospitality</option>';
    $m_admin_add_customer .= '<option value="Balthazar">Balthazar</option>';
    $m_admin_add_customer .= '<option value="Pizza Palace">Pizza Palace</option>';
    $m_admin_add_customer .= '<option value="Entrecoteone">Entrecoteone</option>';
    $m_admin_add_customer .= '<option value="Entrecotetwo">Entrecotetwo</option>';
    $m_admin_add_customer .= '</select>';
    $m_admin_add_customer .= '<select id="cityoptions" name="city">';
    $m_admin_add_customer .= '</select>';
    $m_admin_add_customer .= '<select id="dropdowntable" name="dropdowntable">';
    $m_admin_add_customer .= '<option value="1">1</option>';
    $m_admin_add_customer .= '<option value="2">2</option>';
    $m_admin_add_customer .= '<option value="3">3</option>';
    $m_admin_add_customer .= '<option value="4">4</option>';
    $m_admin_add_customer .= '<option value="5">5</option>';
    $m_admin_add_customer .= '<option value="6">6</option>';
    $m_admin_add_customer .= '<option value="7">7</option>';
    $m_admin_add_customer .= '<option value="8">8</option>';
    $m_admin_add_customer .= '<option value="9">9</option>';
    $m_admin_add_customer .= '</select>';
    $m_admin_add_customer .= '<input type="text" name="noofpeople" value="" placeholder="Number of People ..."/>';
    $m_admin_add_customer .= '<input id="myDate" type="text" name="date" placeholder="Date ...">';
    $m_admin_add_customer .= '<select id="dropdowntime" name="dropdowntime">';
    $m_admin_add_customer .= '<option value="09:00">09:00</option>';
    $m_admin_add_customer .= '<option value="10:00">10:00</option>';
    $m_admin_add_customer .= '<option value="11:00">11:00</option>';
    $m_admin_add_customer .= '<option value="12:00">12:00</option>';
    $m_admin_add_customer .= '<option value="13:00">13:00</option>';
    $m_admin_add_customer .= '<option value="14:00">14:00</option>';
    $m_admin_add_customer .= '<option value="16:00">15:00</option>';
    $m_admin_add_customer .= '<option value="16:00">16:00</option>';
    $m_admin_add_customer .= '<option value="17:00">17:00</option>';
    $m_admin_add_customer .= '<option value="18:00">18:00</option>';
    $m_admin_add_customer .= '<option value="19:00">19:00</option>';
    $m_admin_add_customer .= '<option value="20:00">20:00</option>';
    $m_admin_add_customer .= '<option value="21:00">21:00</option>';
    $m_admin_add_customer .= '<option value="22:00">22:00</option>';
    $m_admin_add_customer .= '</select>';
    $m_admin_add_customer .= '<input type="submit" value="Add Customer" /></section>';
    $this->c_admin_add_customer = $m_admin_add_customer;
  }

  private function do_admin_edit_customer_page($p_array) {
    $m_admin_edit_customer = '';
    $m_admin_edit_customer .= '<nav>';
    $m_admin_edit_customer .= '<ul class="nav navbar-nav">';
    $m_admin_edit_customer .= '<li><a href=' . base_url() . 'adminpage/admin_manage_bookings>Manage Bookings</a></li>';
    $m_admin_edit_customer .= '<li><a href=' . base_url() . 'adminpage/admin_check_reservations_dates>Check Reservation Dates</a></li>';
    $m_admin_edit_customer .= '<li><a href=' . base_url() . 'adminpage/admin_logout>Logout</a></li>';
    $m_admin_edit_customer .= '</ul>';
    $m_admin_edit_customer .= '</nav>';
    $m_admin_edit_customer .= '<section><h1>Edit Customer Information - </h1>';
    $m_admin_edit_customer .= '<ul>';
    $m_admin_edit_customer .= '<p>Current Version only supports the following Restaurants and Cities.</p><p>Make sure to type values exactly as it is shown. Match the numbers of restaurants and cities.</p><p>There is currently no support for error handling.</p>';
    $m_admin_edit_customer .= '<h3>Restaurants</h3>';
    $m_admin_edit_customer .= '<li>1. Chinese Street Food</li>';
    $m_admin_edit_customer .= '<li>1. Michelin Star Restaurant</li>';
    $m_admin_edit_customer .= '<li>1. Jumbo Kingdom</li>';
    $m_admin_edit_customer .= '<li>2. Indian Restaurant</li>';
    $m_admin_edit_customer .= '<li>2. Southern Hospitality</li>';
    $m_admin_edit_customer .= '<li>2. Balthazar</li>';
    $m_admin_edit_customer .= '<li>3. Pizza Palace</li>';
    $m_admin_edit_customer .= '<li>3. Entrecoteone</li>';
    $m_admin_edit_customer .= '<li>3. Entrecotetwo</li>';
    $m_admin_edit_customer .= '</ul>';
    $m_admin_edit_customer .= '<ul>';
    $m_admin_edit_customer .= '<h3>City</h3>';
    $m_admin_edit_customer .= '<li>1. HongKong</li>';
    $m_admin_edit_customer .= '<li>2. NewYork</li>';
    $m_admin_edit_customer .= '<li>3. Paris</li>';
    $m_admin_edit_customer .= '</ul>';
    $m_admin_edit_customer .= '<input type="text" name="firstname" value=' . $p_array[0]['fname'] . ' placeholder="Firstname ..."/>';
    $m_admin_edit_customer .= '<input type="text" name="lastname" value=' . $p_array[0]['lname'] . ' placeholder="Lastname ..."/>';
    $m_admin_edit_customer .= '<input type="text" name="email" value=' . $p_array[0]['mail'] . ' placeholder="Email ..."/>';
    $m_admin_edit_customer .= '<input type="text" name="telephone" value=' . $p_array[0]['pnumber'] . ' placeholder="Phone Number ..."/>';
    $m_admin_edit_customer .= '<select id="restaurantoptions" name="restaurant">';
    $m_admin_edit_customer .= '<option value="'. $p_array[0]['des'] .'">'. $p_array[0]['des'] .'</option>';
    $m_admin_edit_customer .= '<option value="Chinese Street Food">Chinese Street Food</option>';
    $m_admin_edit_customer .= '<option value="Michelin Star Restaurant">Michelin Star Restaurant</option>';
    $m_admin_edit_customer .= '<option value="Jumbo Kingdom">Jumbo Kingdom</option>';
    $m_admin_edit_customer .= '<option value="Indian Restaurant">Indian Restaurant</option>';
    $m_admin_edit_customer .= '<option value="Southern Hospitality">Southern Hospitality</option>';
    $m_admin_edit_customer .= '<option value="Balthazar">Balthazar</option>';
    $m_admin_edit_customer .= '<option value="Pizza Palace">Pizza Palace</option>';
    $m_admin_edit_customer .= '<option value="Entrecoteone">Entrecoteone</option>';
    $m_admin_edit_customer .= '<option value="Entrecotetwo">Entrecotetwo</option>';
    $m_admin_edit_customer .= '</select>';
    $m_admin_edit_customer .= '<select id="cityoptions" name="city">';
    $m_admin_edit_customer .= '<option value='. $p_array[0]['c'] .'>'. $p_array[0]['c'] .'</option>';
    $m_admin_edit_customer .= '</select>';
    $m_admin_edit_customer .= '<select id="dropdowntable" name="dropdowntable">';
    $m_admin_edit_customer .= '<option value=' . $p_array[0]['tno'] . '>' . $p_array[0]['tno'] . '</option>';
    $m_admin_edit_customer .= '<option value="1">1</option>';
    $m_admin_edit_customer .= '<option value="2">2</option>';
    $m_admin_edit_customer .= '<option value="3">3</option>';
    $m_admin_edit_customer .= '<option value="4">4</option>';
    $m_admin_edit_customer .= '<option value="5">5</option>';
    $m_admin_edit_customer .= '<option value="6">6</option>';
    $m_admin_edit_customer .= '<option value="7">7</option>';
    $m_admin_edit_customer .= '<option value="8">8</option>';
    $m_admin_edit_customer .= '<option value="9">9</option>';
    $m_admin_edit_customer .= '</select>';
    $m_admin_edit_customer .= '<input type="text" name="noofpeople" value=' . $p_array[0]['noofpeople'] . ' placeholder="Number of People ..."/>';
    $m_admin_edit_customer .= '<input id="myDate" type="text" name="date" value=' . $p_array[0]['date'] . ' placeholder="Date ...">';
    $m_admin_edit_customer .= '<select id="dropdowntime" name="dropdowntime">';
    $m_admin_edit_customer .= '<option value=' . $p_array[0]['time'] . '>' . $p_array[0]['time'] . '</option>';
    $m_admin_edit_customer .= '<option value="09:00">09:00</option>';
    $m_admin_edit_customer .= '<option value="10:00">10:00</option>';
    $m_admin_edit_customer .= '<option value="11:00">11:00</option>';
    $m_admin_edit_customer .= '<option value="12:00">12:00</option>';
    $m_admin_edit_customer .= '<option value="13:00">13:00</option>';
    $m_admin_edit_customer .= '<option value="14:00">14:00</option>';
    $m_admin_edit_customer .= '<option value="16:00">15:00</option>';
    $m_admin_edit_customer .= '<option value="16:00">16:00</option>';
    $m_admin_edit_customer .= '<option value="17:00">17:00</option>';
    $m_admin_edit_customer .= '<option value="18:00">18:00</option>';
    $m_admin_edit_customer .= '<option value="19:00">19:00</option>';
    $m_admin_edit_customer .= '<option value="20:00">20:00</option>';
    $m_admin_edit_customer .= '<option value="21:00">21:00</option>';
    $m_admin_edit_customer .= '<option value="22:00">22:00</option>';
    $m_admin_edit_customer .= '</select>';
    $m_admin_edit_customer .= '<input type="submit" value="Save Information" /></section>';
    $this->c_admin_edit_customer = $m_admin_edit_customer;
  }

  private function do_admin_success_page($p_value) {
    $m_admin_success_page = '';
    $m_admin_success_page .= '<h1>You have successfully' . $p_value .' the information ...</h1>';
    $m_admin_success_page .= '<a href=' . base_url() . 'adminpage/admin_manage_bookings>Return to Managing Page</a>';
    $this->c_admin_success_page = $m_admin_success_page;
  }

  private function do_admin_check_reservations_page() {
    $m_admin_check_reservations = '';
    $m_admin_check_reservations .= '<nav>';
    $m_admin_check_reservations .= '<ul class="nav navbar-nav">';
    $m_admin_check_reservations .= '<li><a href=' . base_url() . 'adminpage/admin_manage_bookings>Manage Bookings</a></li>';
    $m_admin_check_reservations .= '<li><a href=' . base_url() . 'adminpage/admin_check_reservations_dates>Check Reservation Dates</a></li>';
    $m_admin_check_reservations .= '<li><a href=' . base_url() . 'adminpage/admin_logout>Logout</a></li>';
    $m_admin_check_reservations .= '</ul>';
    $m_admin_check_reservations .= '</nav>';
    $m_admin_check_reservations .= '<section><h1>Check Reservation Dates</h1>';
    $m_admin_check_reservations .= '<input id="myDate" type="text" name="date" placeholder="Date ...">';
    $m_admin_check_reservations .= '<table id="reserveddatestable">';
    $m_admin_check_reservations .= '<thead>';
    $m_admin_check_reservations .= '<th>Firstname</th>';
    $m_admin_check_reservations .= '<th>Lastname</th>';
    $m_admin_check_reservations .= '<th>Email</th>';
    $m_admin_check_reservations .= '<th>Phone Number</th>';
    $m_admin_check_reservations .= '<th>Restaurant Name</th>';
    $m_admin_check_reservations .= '<th>City</th>';
    $m_admin_check_reservations .= '<th>Table Number</th>';
    $m_admin_check_reservations .= '<th>Number of People</th>';
    $m_admin_check_reservations .= '<th>Date Booked</th>';
    $m_admin_check_reservations .= '<th>Time Booked</th>';
    $m_admin_check_reservations .= '</thead>';
    $m_admin_check_reservations .= '<tbody>';
    $m_admin_check_reservations .= '</tbody>';
    $m_admin_check_reservations .= '</table></section>';
    $this->c_admin_check_reservations_page = $m_admin_check_reservations;
  }

  private function do_about_us_page() {
    $m_about_us_page = '';
    $m_about_us_page .= '<section>';
    $m_about_us_page .= '<h1>Our Story</h1>';
    $m_about_us_page .= '<p>We are a offline channel manager, providing information on selected cities and restaurants for customers to browse based on their likings.</p>';
    $m_about_us_page .= '<p>RRS (Restaurant Reservations Systems) is a project for the University based on Restaurant Managing Systems. It is a test version of what an actual system will look like with limited features and uses more of a static approach then a full-fledged dynamic approach which could handle all tasks autonomously.</p>';
    $m_about_us_page .= '<p>The current version of the system is still in the early stages and may be improved later on.</p>';
    $m_about_us_page .= '<p>The features provided by this system includes: </p>';
    $m_about_us_page .= '<ul>';
    $m_about_us_page .= '<li>Table Management System</li>';
    $m_about_us_page .= '<li>Admin Login System</li>';
    $m_about_us_page .= '<li>Managing Customer Bookings</li>';
    $m_about_us_page .= '<li>Browsing Restaurant Information</li>';
    $m_about_us_page .= '<li>Booking Reservations</li>';
    $m_about_us_page .= '<li>Contact via E-mail</li>';
    $m_about_us_page .= '</ul>';
    $m_about_us_page .= '<p>The Project Owner for this system and other useful information is listed below: </p>';
    $m_about_us_page .= '<p><strong>Owner:</strong> Sukhwinder Singh</p>';
    $m_about_us_page .= '<p><strong>E-mail:</strong> s.sunny_1995@hotmail.co.uk</p>';
    $m_about_us_page .= '</section>';
    $m_about_us_page .= '<img src=' . base_url() . 'public/images/Misc/aboutus-image.jpg />';
    $m_about_us_page .= '</section>';
    $this->c_about_us_page = $m_about_us_page;
  }

  private function do_email_input() {
    $m_email_input = '';
    $m_email_input .= '<h1>Contact Us - </h1>';
    $m_email_input .= '<input type="text" name="name" value="" placeholder="Name ..."/>';
    $m_email_input .= '<input type="text" name="email" value="" placeholder="Email ..."/>';
    $m_email_input .= '<textarea name="comment" placeholder="Queries ..."></textarea>';
    $m_email_input .= '<input type="submit" value="Submit" />';
    $this->c_email_input = $m_email_input;
  }

  private function do_email_sent_success_page() {
    $m_email_sent_success_page = '';
    $m_email_sent_success_page .= '<h1>You have sent a Message ...</h1>';
    $m_email_sent_success_page .= '<a href=' . base_url() . 'homepage>Return to Home Page</a>';
    $this->c_email_sent_success_page = $m_email_sent_success_page;
  }

  private function do_restaurants_page($p_heading, $p_images_array, $p_information_array, $p_path_array) {
    $m_restaurants_page = '';
    $m_restaurants_page .= '<h1>' . $p_heading . ' Restaurants</h1>';
    $m_restaurants_page .= '<section>';
    $m_restaurants_page .= '<img src=' . base_url() . 'public/images/Restaurants/' . $p_images_array[0] . ' />';
    $m_restaurants_page .= '<div>';
    $m_restaurants_page .= '<p>' . $p_information_array[0] . '</p>';
    $m_restaurants_page .= '<a href=' . base_url() . $p_path_array[0] .'>Find out more</a>';
    $m_restaurants_page .= '</div>';
    $m_restaurants_page .= '</section>';
    $m_restaurants_page .= '<section>';
    $m_restaurants_page .= '<img src=' . base_url() . 'public/images/Restaurants/' . $p_images_array[1] . ' />';
    $m_restaurants_page .= '<div>';
    $m_restaurants_page .= '<p>' . $p_information_array[1] . '</p>';
    $m_restaurants_page .= '<a href=' . base_url() . $p_path_array[1] .'>Find out more</a>';
    $m_restaurants_page .= '</div>';
    $m_restaurants_page .= '</section>';
    $m_restaurants_page .= '<section>';
    $m_restaurants_page .= '<img src=' . base_url() . 'public/images/Restaurants/' . $p_images_array[2] . ' />';
    $m_restaurants_page .= '<div>';
    $m_restaurants_page .= '<p>' . $p_information_array[2] . '</p>';
    $m_restaurants_page .= '<a href=' . base_url() . $p_path_array[2] .'>Find out more</a>';
    $m_restaurants_page .= '</div>';
    $m_restaurants_page .= '</section>';
    $this->c_restaurants_page = $m_restaurants_page;
  }

  private function do_restaurants_info_page($p_review, $p_menu, $p_gallery) {
    $m_restaurants_info_page = '';
    $m_restaurants_info_page .= '<nav class="navbar navbar-default">';
    $m_restaurants_info_page .= '<input class="state" type="radio" title="Review" name="tab-navigation" id="review" checked/>';
    $m_restaurants_info_page .= '<input class="state" type="radio" title="Menu" name="tab-navigation" id="menu" />';
    $m_restaurants_info_page .= '<input class="state" type="radio" title="Gallery" name="tab-navigation" id="gallery" />';
    $m_restaurants_info_page .= '<input class="state" type="radio" title="Book Now" name="tab-navigation" id="booknow" />';
    $m_restaurants_info_page .= '<section class="nav tabs Content">';
    $m_restaurants_info_page .= '<label for="review" id="review-tab" class="tab">Review</label>';
    $m_restaurants_info_page .= '<label for="menu" id="menu-tab" class="tab"><span>Menu</span></label>';
    $m_restaurants_info_page .= '<label for="gallery" id="gallery-tab" class="tab"><span>Gallery</span></label>';
    $m_restaurants_info_page .= '<label for="booknow" id="booknow-tab" class="tab"><span>Book Now</span></label>';
    $m_restaurants_info_page .= '</section>';
    $m_restaurants_info_page .= '<section class="tab-content nav panels">';
    $m_restaurants_info_page .= '<section id="review-panel" class="tab-content nav panel">';
    $m_restaurants_info_page .= '<h1>Review</h1>';
    $m_restaurants_info_page .= '<img id="review-stars" src=' . base_url() . 'public/images/Ratings/' . $p_review['rating-star'] . ' />';
    $m_restaurants_info_page .= '<h2>' . $p_review['rating'] . ' Overall Rating</h2>';
    $m_restaurants_info_page .= '<table>';
    $m_restaurants_info_page .= '<tr>';
    $m_restaurants_info_page .= '<th>Food</th>';
    $m_restaurants_info_page .= '<th>Service</th>';
    $m_restaurants_info_page .= '<th>Ambience</th>';
    $m_restaurants_info_page .= '<th>Value</th>';
    $m_restaurants_info_page .= '<th>Noise</th>';
    $m_restaurants_info_page .= '</tr>';
    $m_restaurants_info_page .= '<tr>';
    $m_restaurants_info_page .= '<td id="food-rating">' . $p_review['food-rating'] . '</td>';
    $m_restaurants_info_page .= '<td id="service-rating">' . $p_review['service-rating'] . '</td>';
    $m_restaurants_info_page .= '<td id="ambience-rating">' . $p_review['ambience-rating'] . '</td>';
    $m_restaurants_info_page .= '<td id="value-rating">' . $p_review['value-rating'] . '</td>';
    $m_restaurants_info_page .= '<td id="noise-rating">' . $p_review['noise-rating'] . '</td>';
    $m_restaurants_info_page .= '</tr>';
    $m_restaurants_info_page .= '</table>';
    $m_restaurants_info_page .= '<p><span id="thumb-up"></span> ' . $p_review['percentage'] . ' would recommend it to a friend</p>';
    $m_restaurants_info_page .= '</section>';
    $m_restaurants_info_page .= '<section id="menu-panel" class="tab-content nav panel">';
    $m_restaurants_info_page .= '<h1>Menu</h1>';
    $m_restaurants_info_page .= '<table>';
    $m_restaurants_info_page .= '<tr>';
    $m_restaurants_info_page .= '<th>Food</th>';
    $m_restaurants_info_page .= '<th>Drinks</th>';
    $m_restaurants_info_page .= '<th>Deserts</th>';
    $m_restaurants_info_page .= '</tr>';

    foreach($p_menu as $array) {
      $m_restaurants_info_page .= '<tr>';
      foreach($array as $value) {
        $m_restaurants_info_page .= '<td>' . $value . '</td>';
      }
      $m_restaurants_info_page .= '</tr>';
    }

    $m_restaurants_info_page .= '</table>';
    $m_restaurants_info_page .= '</section>';
    $m_restaurants_info_page .= '<section id="gallery-panel" class="tab-content nav panel">';
    $m_restaurants_info_page .= '<h1>Gallery</h1>';
    $m_restaurants_info_page .= '<div class="w3-content w3-display-container">';
    foreach($p_gallery as $value) {
      $m_restaurants_info_page .= '<img class="mySlides" src=' . base_url() . 'public/images/RestaurantGallery/' . $value .' />';
    }
    $m_restaurants_info_page .= '<a class="w3-btn-floating w3-display-left" onclick="plusDivs(-1)">&#10094;</a>';
    $m_restaurants_info_page .= '<a class="w3-btn-floating w3-display-right" onclick="plusDivs(1)">&#10095;</a>';
    $m_restaurants_info_page .= '</div>';
    $m_restaurants_info_page .= '</section>';
    $m_restaurants_info_page .= '<section id="booknow-panel" class="tab-content nav panel">';
    $m_restaurants_info_page .= '<h1>Book Now</h1>';
    $m_restaurants_info_page .= '<p>Make a booking now. It is free, secure and managed by the admin so your added to the reservations panel.</p>';
    $m_restaurants_info_page .= '<p>All information on time and date along with table information will be provided in the link below.</p>';
    $m_restaurants_info_page .= '<a href=' . base_url() . 'Booking/customer_booking>Book Now</a>';
    $m_restaurants_info_page .= '</section>';
    $m_restaurants_info_page .= '</section>';
    $m_restaurants_info_page .= '</nav>';
    $this->c_restaurants_info_page = $m_restaurants_info_page;
  }

  private function do_booking_page() {
    $m_booking_page = '';
    $m_booking_page .= '<div id="tabs">';
    $m_booking_page .= '<ul class="tab-list">';
    $m_booking_page .= '<li class="active"><a class="tab-control" href="#tab-1"><h3>Customer Details</h3></a></li>';
    $m_booking_page .= '<li><a class="tab-control" href="#tab-2"><h3>Book a Table</h3></a></li>';
    $m_booking_page .= '<li><a class="tab-control" href="#tab-3"><h3>Confirmation</h3></a></li>';
    $m_booking_page .= '</ul>';
    $m_booking_page .= '<div class="tab-panel active" id="tab-1">';
    $m_booking_page .= '<h1>Customer Details</h1>';
    $m_booking_page .= '<div class="container">';
    $m_booking_page .= '<div class="formdiv"><p>FirstName:</p><input type="text" name="firstname" value="" placeholder="Firstname ..."/></div>';
    $m_booking_page .= '<div class="formdiv"><p>LastName:</p><input type="text" name="lastname" value="" placeholder="Lastname ..."/></div>';
    $m_booking_page .= '<div class="formdiv"><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspE-Mail:</p><input type="text" name="email" value="" placeholder="Email ..."/></div>';
    $m_booking_page .= '<div class="formdiv"><p>Telephone:</p><input type="text" name="telephone" value="" placeholder="Telephone ..."/></div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '<div class="tab-panel" id="tab-2">';
    $m_booking_page .= '<div id="bookatable">';
    $m_booking_page .= '<h1>Book a Table</h1>';
    $m_booking_page .= '<div class="container">';
    $m_booking_page .= '<div class="formdiv"><p>Pick a Date:</p>';
    $m_booking_page .= '<input id="myDate" type="text" name="date" placeholder="Date ..."></div>';
    $m_booking_page .= '<div class="formdiv"><p>Pick a Time:</p>';
    $m_booking_page .= '<select id="dropdowntime" name="dropdowntime">';
    $m_booking_page .= '</select></div>';
    $m_booking_page .= '<div class="formdiv"><p>Choose a table from option or from the right:</p>';
    $m_booking_page .= '<select id="dropdowntable" name="dropdowntable">';
    $m_booking_page .= '</select></div>';
    $m_booking_page .= '<div class="formdiv">';
    $m_booking_page .= '<p>Number of People:</p>';
    $m_booking_page .= '<input type="text" name="noofpeople" value="" placeholder="Number of People ..."/>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '<div class="formdiv"><p>Table Capacity:</p>';
    $m_booking_page .= '<input id="tableCapacity" type="text" name="tablecapacity" placeholder="Select Table First ..."/></div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '<div class="table-view">';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '<div class="tab-panel" id="tab-3">';
    $m_booking_page .= '<h1>Confirmation</h1>';
    $m_booking_page .= '<div class="container">';
    $m_booking_page .= '<input type="checkbox" name="agree">';
    $m_booking_page .= '<div class="formdiv"><p>Accept the following Terms and Conditions to proceed to the next step.</p>';
    $m_booking_page .= '<p>All information will be saved if you agree and this will allow you to confirm your booking.</p>';
    $m_booking_page .= '<a data-toggle="modal" data-target="#myModal">Terms and Conditions</a>';
    $m_booking_page .= '<input type="submit" value="Complete Booking" /></div>';
    $m_booking_page .= '<div id="myModal" class="modal fade" role="dialog">';
    $m_booking_page .= '<div class="modal-dialog">';
    $m_booking_page .= '<div class="modal-content">';
    $m_booking_page .= '<div class="modal-header">';
    $m_booking_page .= '<button type="button" class="close" data-dismiss="modal">&times;</button>';
    $m_booking_page .= '<h4 class="modal-title">Terms and Conditions</h4>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '<div class="modal-body">';
    $m_booking_page .= '<p>These Terms and Conditions, as may be amended from time to time, apply to all our services directly or indirectly';
    $m_booking_page .= 'made available online, through any mobile device, by email or by telephone. By accessing, browsing and using our mobile';
    $m_booking_page .= ' website or any of our applications through whatever platform and or by completing a reservation, you acknowledge and agree to have read, understood and agreed to the Terms and Conditions set out below.';
    $m_booking_page .= '</p>';
    $m_booking_page .= '<h5>Information Security</h5>';
    $m_booking_page .= '<p>If you wish to book through RSS, all information provided within this application will be understood as an agreement, to store user information within the RSS databases.';
    $m_booking_page .= 'The information stored in our databases will not be used for commerical use or be sold to third party companies. Any information stored regarding the user, will only be used for testing purposes.';
    $m_booking_page .= '</p>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '<div class="modal-footer">';
    $m_booking_page .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';
    $m_booking_page .= '</div>';

    $this->c_booking_page = $m_booking_page;
  }

  private function do_booking_success_page() {
    $m_booking_success_page = '';
    $m_booking_success_page .= '<h1>You have successfully made a booking ...</h1>';
    $m_booking_success_page .= '<a href=' . base_url() . 'homepage>Return to Home Page</a>';
    $this->c_booking_success_page = $m_booking_success_page;
  }

  private function do_footer() {
    $m_footer = '<p class="copyright">&copy; Copyright RSS 2016</p>';
    $this->c_footer = $m_footer;
  }

}
