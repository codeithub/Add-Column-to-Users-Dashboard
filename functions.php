add_filter( 'manage_users_columns', 'codeithub_add_new_user_column' );
  
function codeithub_add_new_user_column( $columns ) {
    $columns['billing_country'] = 'Billing Country';
    return $columns;
}
  
add_filter( 'manage_users_custom_column', 'codeithub_add_new_user_column_content', 10, 3 );
  
function codeithub_add_new_user_column_content( $content, $column, $user_id ) {
    
    if ( 'billing_country' === $column ) {
   $customer = new WC_Customer( $user_id );
        $content = $customer->get_billing_country();
    }
    
    return $content;
}
