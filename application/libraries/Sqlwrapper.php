<?php

class Sqlwrapper
{

  public function __construct(){}

  public function __destruct(){}

  public function get_customer_table() {
    $m_sql_query_string = "customer";
    return $m_sql_query_string;
  }

  public function get_restaurant_table() {
    $m_sql_query_string = "restaurant";
    return $m_sql_query_string;
  }

  public function get_date_table() {
    $m_sql_query_string = "dates";
    return $m_sql_query_string;
  }

  public function get_datesfull_table() {
    $m_sql_query_string = "datesfull";
    return $m_sql_query_string;
  }

  public function get_reserved_table() {
    $m_sql_query_string = "reservedtables";
    return $m_sql_query_string;
  }

  public function get_booking_table() {
    $m_sql_query_string = "booking";
    return $m_sql_query_string;
  }

  public function get_booking_id() {
    $m_sql_query_string = "SELECT bookingid ";
    $m_sql_query_string .= "FROM booking ";
    $m_sql_query_string .= "WHERE customerid = ? AND restableid = ? ";
    return $m_sql_query_string;
  }

  public function get_customer_id() {
    $m_sql_query_string = "SELECT customerid ";
    $m_sql_query_string .= "FROM customer ";
    $m_sql_query_string .= "ORDER BY customerid ";
    $m_sql_query_string .= "DESC LIMIT 1 ";
    return $m_sql_query_string;
  }

  public function get_matched_customer_id() {
    $m_sql_query_string = "SELECT customerid ";
    $m_sql_query_string .= "FROM customer ";
    $m_sql_query_string .= "WHERE firstname = ? AND lastname = ? AND email = ? AND phonenumber = ? ";
    return $m_sql_query_string;
  }

  public function get_restable_id() {
    $m_sql_query_string = "SELECT restableid ";
    $m_sql_query_string .= "FROM reservedtables ";
    $m_sql_query_string .= "ORDER BY restableid ";
    $m_sql_query_string .= "DESC LIMIT 1 ";
    return $m_sql_query_string;
  }

  public function get_matched_restable_id() {
    $m_sql_query_string = "SELECT restableid ";
    $m_sql_query_string .= "FROM reservedtables ";
    $m_sql_query_string .= "WHERE restaurantid = ? AND tableid = ? AND tableno = ? AND numberofpeople = ? AND dates = ? AND times = ? ";
    return $m_sql_query_string;
  }

  public function get_admin_info()
  {
    $m_sql_query_string  = "SELECT adminUsername, adminPassword ";
    $m_sql_query_string .= "FROM admin ";
    $m_sql_query_string .= "WHERE adminUsername = ? AND adminPassword = ? ";
    return $m_sql_query_string;
  }

  public function get_admin_password() {
    $m_sql_query_string  = "SELECT adminPassword ";
    $m_sql_query_string .= "FROM admin ";
    $m_sql_query_string .= "WHERE adminUsername = ? ";
    return $m_sql_query_string;
  }

  public function get_restaurant_id() {
    $m_sql_query_string = "SELECT restaurantid ";
    $m_sql_query_string .= "FROM restaurant ";
    $m_sql_query_string .= "WHERE restaurantname = ? ";
    return $m_sql_query_string;
  }

  public function get_restaurant_id_through_name() {
    $m_sql_query_string = "SELECT restaurantid ";
    $m_sql_query_string .= "FROM restaurant ";
    $m_sql_query_string .= "WHERE description = ? ";
    return $m_sql_query_string;
  }

  public function get_restaurant_time_info() {
    $m_sql_query_string  = "SELECT timeavailable, timeend ";
    $m_sql_query_string .= "FROM restaurant ";
    $m_sql_query_string .= "WHERE restaurantname = ? ";
    return $m_sql_query_string;
  }

  public function get_restaurant_time_reserved() {
    $m_sql_query_string  = "SELECT dates, times ";
    $m_sql_query_string .= "FROM reservedtables ";
    $m_sql_query_string .= "WHERE restaurantid = ? ";
    return $m_sql_query_string;
  }

  public function get_restaurant_tables_reserved() {
    $m_sql_query_string  = "SELECT dates, tableno ";
    $m_sql_query_string .= "FROM reservedtables ";
    $m_sql_query_string .= "WHERE restaurantid = ? ";
    return $m_sql_query_string;
  }

  public function get_restaurantid_and_dates() {
    $m_sql_query_string  = "SELECT restaurantid, dates ";
    $m_sql_query_string .= "FROM dates ";
    $m_sql_query_string .= "WHERE restaurantid = ? AND dates = ? ";
    return $m_sql_query_string;
  }

  public function get_table_id() {
    $m_sql_query_string  = "SELECT tableid ";
    $m_sql_query_string .= "FROM tables ";
    $m_sql_query_string .= "WHERE restaurantid = ? AND tableno = ? ";
    return $m_sql_query_string;
  }

  public function get_tables_for_current_restaurant() {
    $m_sql_query_string  = "SELECT tableno, tablecapacity ";
    $m_sql_query_string .= "FROM tables ";
    $m_sql_query_string .= "WHERE restaurantid = ? ";
    return $m_sql_query_string;
  }

  public function get_reserved_tables() {
    $m_sql_query_string  = "SELECT tableno ";
    $m_sql_query_string .= "FROM reservedtables ";
    $m_sql_query_string .= "WHERE restaurantid = ? AND dates = ? ";
    return $m_sql_query_string;
  }

  public function get_table_numbers() {
    $m_sql_query_string  = "SELECT COUNT(tableno) as tn ";
    $m_sql_query_string .= "FROM tables ";
    $m_sql_query_string .= "WHERE restaurantid = ? ";
    return $m_sql_query_string;
  }

  public function get_datesfull_info() {
    $m_sql_query_string  = "SELECT restaurantid, datesfull ";
    $m_sql_query_string .= "FROM datesfull ";
    $m_sql_query_string .= "WHERE restaurantid = ? ";
    return $m_sql_query_string;
  }

  public function get_all_info() {
    $m_sql_query_string = "SELECT c."."firstname, c."."lastname, c."."email, c."."phonenumber, res."."tableno, res."."numberofpeople, res."."dates, res."."times, r."."description, city."."city ";
    $m_sql_query_string .= "FROM customer c INNER JOIN booking b ";
    $m_sql_query_string .= "ON c.customerid = b.customerid INNER JOIN reservedtables res ";
    $m_sql_query_string .= "ON res.restableid = b.restableid INNER JOIN restaurant r ";
    $m_sql_query_string .= "ON res.restaurantid = r.restaurantid INNER JOIN city ";
    $m_sql_query_string .= "ON city.cityid = r.cityid ";
    return $m_sql_query_string;
  }

  public function get_min_date_id_to_update() {
    $m_sql_query_string = "SELECT MIN(dateid) as dateid ";
    $m_sql_query_string .= "FROM dates ";
    $m_sql_query_string .= "WHERE dates = ? AND restaurantid = ?";
    return $m_sql_query_string;
  }

  public function get_distinct_dates() {
    $m_sql_query_string = "SELECT DISTINCT dates ";
    $m_sql_query_string .= "FROM dates ";
    return $m_sql_query_string;
  }

  public function get_customer_id_through_booking_table_where_restable_id_is_used() {
    $m_sql_query_string = "SELECT customerid ";
    $m_sql_query_string .= "FROM booking ";
    $m_sql_query_string .= "WHERE restableid = ? ";
    return $m_sql_query_string;
  }

  public function get_restaurant_name_through_description() {
    $m_sql_query_string = "SELECT restaurantname ";
    $m_sql_query_string .= "FROM restaurant ";
    $m_sql_query_string .= "WHERE description = ? ";
    return $m_sql_query_string;
  }

}

?>
