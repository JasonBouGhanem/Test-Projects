<?php
/* Template Name: Custom Login Page */

global $user_ID;
global $wpdb;

if(!user_ID){

    

    if($_POST){

        $username = $wpdb->escape($_POST['username']);
        $password = $wpdb->escape($_POST['password']);

        $login_array = array();
        $login_array['user_login'] = $username;
        $login_array['user_password']= $password;

        $verify_user = wp_signon($login_array,true);
        if(!is_wp_error($verify_user)){

            echo"<script>window.location = '".site_url()."'</script>";

        }else{

            echo "<p>Invalid credentials</p>";


        
        }

    }else{ 

        //user is logged in
    }
    

    
  //user in logged out state
  get_header();

  ?>

  <form method="post">
      <p>
          <labelfor="username">Username/Email</label>
          <input type="text" id="username" name="username" placeholder="Enter Username/Email"/>
      </p>
      <p>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter Password"/>
      </p>
      <p>
          <button type="submit" name="btn_submit">Log In</button>
      </p>
  </form>

  <?php

  get_footer();

    
    
    }
   



?>



