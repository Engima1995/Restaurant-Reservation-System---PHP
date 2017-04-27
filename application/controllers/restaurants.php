<?php

class Restaurants extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  public function hongkong($param = null)
  {

    $f_htmlloader = '';

    $f_html_header = $this->htmlwrapper->get_header();
    if($this->session_model->get_session_value('Username')) {
        $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
    }else {
      $f_html_navbar = $this->htmlwrapper->get_navbar();
    }
    $f_html_footer = $this->htmlwrapper->get_footer();

    if($param === 'HK_Res_1') {

      $this->session_model->set_session_value('Restaurant', 'HK_Res_1');

      $f_review = array(
        'rating-star' => '4star.jpg',
        'rating' => '4.0',
        'food-rating' => '4.3',
        'service-rating' => '4.0',
        'ambience-rating' => '3.5',
        'value-rating' => '3.8',
        'noise-rating' => '3.9',
        'percentage' => '81%'
      );

      $f_menu = array(
        'item1' => array('$5.80 - Crispy Shredded Beef with Chilli Sauce', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$5.50 - Sweet & Sour Chicken Balls', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$5.70 - Sweet & Sour Chicken Hong Kong Style', '$2 - Fanta', ''),
        'item4' => array('$5.70 - Chicken Chow Mein', '', '')
      );

      $f_gallery = array('HK_Res_1_Gallery_1.jpg', 'HK_Res_1_Gallery_2.jpg', 'HK_Res_1_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else if($param === 'HK_Res_2') {

      $this->session_model->set_session_value('Restaurant', 'HK_Res_2');

      $f_review = array(
        'rating-star' => '4halfstar.jpg',
        'rating' => '4.5',
        'food-rating' => '4.6',
        'service-rating' => '4.2',
        'ambience-rating' => '4.0',
        'value-rating' => '4.0',
        'noise-rating' => '3.7',
        'percentage' => '86%'
      );

      $f_menu = array(
        'item1' => array('$4.30 - King Prawn Chow Mein', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$3.70 - Rice Noodles', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$3.80 - Sliced Chicken Breast Chow Mein with Barbecue Sauce', '$2 - Fanta', '$2.50 - Strawberry Cake'),
        'item4' => array('$3.70 - Roast Port Singapore Rice Noodles', '$2 - Cream Soda', '')
      );

      $f_gallery = array('HK_Res_2_Gallery_1.jpg', 'HK_Res_2_Gallery_2.jpg', 'HK_Res_2_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';


    }else if($param === 'HK_Res_3') {

      $this->session_model->set_session_value('Restaurant', 'HK_Res_3');

      $f_review = array(
        'rating-star' => '3halfstar.jpg',
        'rating' => '3.7',
        'food-rating' => '3.6',
        'service-rating' => '4.0',
        'ambience-rating' => '3.8',
        'value-rating' => '3.7',
        'noise-rating' => '3.9',
        'percentage' => '76%'
      );

      $f_menu = array(
        'item1' => array('$3.80 - Special Foo Yung', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$4.60 - King Prawn Foo Yung', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$3.10 - Fried Chicken Breast with Plain Omlette', '$2 - Fanta', '$2.50 - Strawberry Cake'),
        'item4' => array('$3.70 - Sliced Chicken Breast with Chips in Barbecue Sauce', '$2 - Cream Soda', '')
      );

      $f_gallery = array('HK_Res_3_Gallery_1.jpg', 'HK_Res_3_Gallery_2.jpg', 'HK_Res_3_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else {

      $this->session_model->set_session_value('City', 'HongKong');

      $f_images = array('HK_Res_1.jpg', 'HK_Res_2.jpg', 'HK_Res_3.jpg');
      $f_information = array('The sizzling dishes, the clatter, the aromas, the crowds... Dai Pai Dongs and the street food hawkers are one of Hong Kongs best food experiences. Come along to people watch, share a table with a stranger and be totally inundated with great flavors. Find out more below.',
                             'Michelin Star Restaurant Renowned as one of the best Cantonese restaurants in the world, Executive Chef Lau Yiu-hui uses the finest ingredients and fresh seasonal ingredients to create the finest Chinese cuisine. The à la carte menu features a wide range of lunch and dinner options, as well as a selection of seasonal Cantonese dishes. Find out more below.',
                             'Jumbo Kingdom is an internationally renowned tourist attraction in Hong Kong, providing a unique dining experience for its customers in the past three decades. We are best known for fresh seafood, traditional Cantonese cuisine and dim sum. Jumbo is also an ideal venue for business entertaining, corporate meetings and banquets. Find out more below.');
      $f_path = array('Restaurants/hongkong/HK_Res_1', 'Restaurants/hongkong/HK_Res_2', 'Restaurants/hongkong/HK_Res_3');
      $f_html_hongkong = $this->htmlwrapper->get_restaurants_page('Hong Kong', $f_images, $f_information, $f_path);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurants' => $f_html_hongkong,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurants.html';

    }

    $this->load->view($f_htmlloader, $data);

  }

  public function newyork($param = null)
  {

    $f_htmlloader = '';

    $f_html_header = $this->htmlwrapper->get_header();
    if($this->session_model->get_session_value('Username')) {
        $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
    }else {
      $f_html_navbar = $this->htmlwrapper->get_navbar();
    }
    $f_html_footer = $this->htmlwrapper->get_footer();

    if($param === 'NY_Res_1') {

      $this->session_model->set_session_value('Restaurant', 'NY_Res_1');

      $f_review = array(
        'rating-star' => '4halfstar.jpg',
        'rating' => '4.3',
        'food-rating' => '4.1',
        'service-rating' => '4.0',
        'ambience-rating' => '3.9',
        'value-rating' => '4.5',
        'noise-rating' => '4.3',
        'percentage' => '88%'
      );

      $f_menu = array(
        'item1' => array('$0.50 - Papadom (Plain or Spicy)', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$2.50 - Chicken Porkora', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$1.95 - Lamb Tikka', '$2 - Fanta', ''),
        'item4' => array('$1.95 - Onion Bhaji', '', '')
      );

      $f_gallery = array('NY_Res_1_Gallery_1.jpg', 'NY_Res_1_Gallery_2.jpg', 'NY_Res_1_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else if($param === 'NY_Res_2') {

      $this->session_model->set_session_value('Restaurant', 'NY_Res_2');

      $f_review = array(
        'rating-star' => '5star.jpg',
        'rating' => '4.8',
        'food-rating' => '4.6',
        'service-rating' => '4.7',
        'ambience-rating' => '4.5',
        'value-rating' => '4.6',
        'noise-rating' => '4.6',
        'percentage' => '95%'
      );

      $f_menu = array(
        'item1' => array('$5.32 - Vive le Poutine', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$5.75 - Loaded Poutine', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$7.96 - The Classic Pizza', '$2 - Fanta', ''),
        'item4' => array('$8.18 - The Poutine Pizza', '', '')
      );

      $f_gallery = array('NY_Res_2_Gallery_1.jpg', 'NY_Res_2_Gallery_2.jpg', 'NY_Res_2_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else if($param === 'NY_Res_3') {

      $this->session_model->set_session_value('Restaurant', 'NY_Res_3');

      $f_review = array(
        'rating-star' => '4star.jpg',
        'rating' => '4.0',
        'food-rating' => '3.9',
        'service-rating' => '4.1',
        'ambience-rating' => '3.8',
        'value-rating' => '3.9',
        'noise-rating' => '4.0',
        'percentage' => '80%'
      );

      $f_menu = array(
        'item1' => array('$10.75 - Granola with Fruit & Yoghurt', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$4.25 - Bagel with Cream Cheese', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$13.75 - Bagel with Smoke Salmon', '$2 - Fanta', ''),
        'item4' => array('$2.50 - Toast with Butter & Jam', '', '')
      );

      $f_gallery = array('NY_Res_3_Gallery_1.jpg', 'NY_Res_3_Gallery_2.jpg', 'NY_Res_3_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else {

      $this->session_model->set_session_value('City', 'NewYork');

      $f_images = array('NY_Res_1.jpg', 'NY_Res_3.jpg', 'NY_Res_2.jpg');
      $f_information = array('Indian Restaurant provides authentic dishes, orignating from India. Ranging from curry to other well known dishes. Find out more below.',
                             'Southern Hospitality Restaurant offers Ribs & pub grub with beer and booze, they are the stars at this celebrity owned joint. Find out more below. ',
                             'Belthazar Restaurant offers a spinoff of the famed brasserie, this busting take-out spot serves French cafe & pastries. Find out more below.');
      $f_path = array('Restaurants/newyork/NY_Res_1', 'Restaurants/newyork/NY_Res_2', 'Restaurants/newyork/NY_Res_3');
      $f_html_newyork = $this->htmlwrapper->get_restaurants_page('New York', $f_images, $f_information, $f_path);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurants' => $f_html_newyork,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurants.html';

    }

    $this->load->view($f_htmlloader, $data);

  }

  public function paris($param = null)
  {

    $f_htmlloader = '';

    $f_html_header = $this->htmlwrapper->get_header();
    if($this->session_model->get_session_value('Username')) {
        $f_html_navbar = $this->htmlwrapper->get_navbar('adminpage/admin_managing_page');
    }else {
      $f_html_navbar = $this->htmlwrapper->get_navbar();
    }
    $f_html_footer = $this->htmlwrapper->get_footer();

    if($param === 'Paris_Res_1') {

      $this->session_model->set_session_value('Restaurant', 'Paris_Res_1');

      $f_review = array(
        'rating-star' => '4halfstar.jpg',
        'rating' => '4.3',
        'food-rating' => '4.1',
        'service-rating' => '4.0',
        'ambience-rating' => '3.9',
        'value-rating' => '4.5',
        'noise-rating' => '4.3',
        'percentage' => '88%'
      );

      $f_menu = array(
        'item1' => array('$6.99 - Eggplant Stacker', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$6.99 - Spinach and Artichoke Dip', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$5.99 - Roasted Red Pepper Hummus', '$2 - Fanta', ''),
        'item4' => array('$7.99 - Meat Feast', '', '')
      );

      $f_gallery = array('Paris_Res_1_Gallery_1.jpg', 'Paris_Res_1_Gallery_2.jpg', 'Paris_Res_1_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else if($param === 'Paris_Res_2') {

      $this->session_model->set_session_value('Restaurant', 'Paris_Res_2');

      $f_review = array(
        'rating-star' => '3halfstar.jpg',
        'rating' => '4.1',
        'food-rating' => '3.9',
        'service-rating' => '3.5',
        'ambience-rating' => '3.7',
        'value-rating' => '3.8',
        'noise-rating' => '4.0',
        'percentage' => '83%'
      );

      $f_menu = array(
        'item1' => array('$2.75 - Chicken Sandwich', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$3.25 - Chedder Cheese Sandwich', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$2.95 - Ham and Tomatoe Sandwich', '$2 - Fanta', ''),
        'item4' => array('$4.75 - Ham and Cheese Sandwich', '', '')
      );

      $f_gallery = array('Paris_Res_2_Gallery_1.jpg', 'Paris_Res_2_Gallery_2.jpg', 'Paris_Res_2_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else if($param === 'Paris_Res_3') {

      $this->session_model->set_session_value('Restaurant', 'Paris_Res_3');

      $f_review = array(
        'rating-star' => '3halfstar.jpg',
        'rating' => '4.1',
        'food-rating' => '3.9',
        'service-rating' => '3.5',
        'ambience-rating' => '3.7',
        'value-rating' => '3.8',
        'noise-rating' => '4.0',
        'percentage' => '83%'
      );

      $f_menu = array(
        'item1' => array('$2.75 - Chicken Sandwich', '$2 - Coke', '$1.50 - Vanilla Sunday'),
        'item2' => array('$3.25 - Chedder Cheese Sandwich', '$2 - Pepsi', '$1.50 - Chocolate Sunday'),
        'item3' => array('$2.95 - Ham and Tomatoe Sandwich', '$2 - Fanta', ''),
        'item4' => array('$4.75 - Ham and Cheese Sandwich', '', '')
      );

      $f_gallery = array('Paris_Res_2_Gallery_1.jpg', 'Paris_Res_2_Gallery_2.jpg', 'Paris_Res_2_Gallery_3.jpg');

      $f_html_restaurants_info = $this->htmlwrapper->get_restaurants_info_page($f_review, $f_menu, $f_gallery);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurantsinfo' => $f_html_restaurants_info,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurant-info.html';

    }else {

      $this->session_model->set_session_value('City', 'Paris');

      $f_images = array('Paris_Res_1.jpg', 'Paris_Res_2.jpg', 'Paris_Res_3.jpg');
      $f_information = array('Dans la plus pure des traditions des pizzas à la pâte fraîche. Find out more below.',
                             'The Relais de l Entrecote include the refinement of a true Parisian bistro, elegant and effective.
  For decades, the formula of the Sirloin relay ensures success with green salad with walnuts, against his steak tasty and tender with his famous sauce and fries thin and golden. Find out more below.',
                             'The Relais de l Entrecote include the refinement of a true Parisian bistro, elegant and effective.
  For decades, the formula of the Sirloin relay ensures success with green salad with walnuts, against his steak tasty and tender with his famous sauce and fries thin and golden. Find out more below.');
      $f_path = array('Restaurants/paris/Paris_Res_1', 'Restaurants/paris/Paris_Res_2', 'Restaurants/paris/Paris_Res_3');
      $f_html_paris = $this->htmlwrapper->get_restaurants_page('Paris', $f_images, $f_information, $f_path);

      $data = array(
        'header' => $f_html_header,
        'navbar' => $f_html_navbar,
        'restaurants' => $f_html_paris,
        'footer' => $f_html_footer
      );

      $f_htmlloader = 'restaurants.html';
    }

    $this->load->view($f_htmlloader, $data);
  }

}

?>
