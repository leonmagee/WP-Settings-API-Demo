<?php

/* ------------------------------------------------------------------------ *
 * WordPress Settings API DEMO
 * ------------------------------------------------------------------------ */ 

// link function to action hook

add_action( 'admin_init', 'settings_hook_function' );


 
// function wraps register_setting, add_settings_section, add_settings_field

function settings_hook_function() {
    
    register_setting(  
        'general', 
        'input_name_array',
        'validation_function'
    );
     

    add_settings_section(
        'section_id',			
        __( 'Settings Section Title' ),					
        'section_callback',	
        'general'
    );


    add_settings_field(
        'phone_number_id',			
        __( 'Phone Number' ),					
        'phone_callback',	
        'general',
        'section_id'
    );
    
    add_settings_field(
        'email_id',			
        __( 'Email Address' ),					
        'email_callback',	
        'general',
        'section_id'
    );
    
}

// callback functions

function section_callback() {
    
    _e( "Section Callback Header" );
}

function phone_callback() {
    
    $array = get_option( 'input_name_array' );
    
    $value = $array['phone'];
    
    echo "<input type='text' name='input_name_array[phone]' value='" . $value . "' />";
}

function email_callback() {
    
    $array = get_option( 'input_name_array' );
    
    $value = $array['email'];
    
    echo "<input type='text' name='input_name_array[email]' value='" . $value . "' />";
}



// validation function


function validation_function( $input ) {
    
    $valid = array();
    
    $current_settings = get_option( 'input_name_array' );
    
    $valid['phone'] = preg_replace( '/[^0-9-]/', '', $input['phone'] );
    
    
    if ( $valid['phone'] != $input['phone'] ) {
        
        add_settings_error(

           'phone_number_id', 
           'css_id', 
           __( 'Must be a valid phone number!' )
    );
        
        $valid['phone'] = $current_settings['phone'];
    }
     
    
    $valid['email'] = preg_replace( '/[^a-zA-Z0-9_.@]/', '', $input['email'] );
    
    if ( $valid['email'] != $input['email'] ) {
        
        add_settings_error(

           'email_id', 
           'css_id', 
           __( 'Must be a valid email address!' )
    );
        
        $valid['email'] = $current_settings['email'];
    }
    
    
    
    return $valid;
}
