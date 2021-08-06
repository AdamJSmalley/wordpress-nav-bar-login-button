add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );

function add_loginout_link( $items, $args ) {
 
  if (is_user_logged_in()) {
    //Add "My Account" and "Log out" when user is logged in
	$items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">My Account</a></li>';
    $items .= '<li><a href="'. wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) .'">Log Out</a></li>';
  }

  elseif (!is_user_logged_in()) {
    //Add "Log In / Register" when the user is not logged in.
    $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Log In / Register</a></li>';
  }
	
  return $items;
}