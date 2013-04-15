<?php defined('BASEPATH') or exit; ?>

<!DOCTYPE html> 
<!--[if IE 8]> 	<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Insu Mun</title>

  <link rel="stylesheet" href="<?php print base_url(); ?>css/normalize.css" />
  
  <link rel="stylesheet" href="<?php print base_url(); ?>css/foundation.css" />
  

  <script src="<?php print base_url(); ?>js/vendor/custom.modernizr.js"></script>

</head>
<body>
    <div class="wrapper row">
        <div class="large-12 columns">
        <header id="header">
            <h1><a href="<?php print base_url(); ?>index.php/topics">CI Application</a></h1>
	    <?php if($this->session->userdata('logged_in') == TRUE) { ?>
	    <h6><?php print $this->session->userdata('user_name'); ?> is logged in now.</h6>
	    <?php } ?>
        </header>
        <serction id="main">
		<nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="<?php print base_url(); ?>index.php/topics">HOME </a></h1>
    </li>
    
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">
      <li class="divider"></li>
      <li><a href="<?php print base_url(); ?>index.php/content/about">ABOUT</a></li>
      <li class="divider"></li>
      <li><a href="<?php print base_url(); ?>index.php/content/contact">CONTACT</a></li>
      <li class="divider"></li>
      <li><a href="<?php print base_url(); ?>index.php/content/legal">LEGAL</a></li>
      <li class="divider"></li>
    </ul>

    <!-- Right Nav Section -->
    <ul class="right">
      <li class="divider hide-for-small"></li>
      <li class="has-dropdown"><a href="#">USER MENU</a>

        <ul class="dropdown">
           <li><label>Please register if you don't have your account.</label></li>
	   <?php if($this->session->userdata('logged_in') == FALSE) { ?>
           <li><a href="<?php print base_url(); ?>index.php/user/register">REGISTER ACCOUNT</a></li>
           <li><a href="<?php print base_url(); ?>index.php/user/login">LOGIN</a></li>
	   <?php } else { ?>
	   <li><a href="<?php print base_url(); ?>index.php/user/view">VIEW PROFILE</a></li>
	   <li><a href="<?php print base_url(); ?>index.php/user/edit">EDIT</a></li>
           <li><a href="<?php print base_url(); ?>index.php/user/logout">LOGOUT</a></li>
	   <?php } ?>
        </ul>
      </li>
      <li class="divider"></li>
      <li class="has-form">
        <form>
          <div class="row collapse">
            <div class="small-8 columns">
              <input type="text">
            </div>
            <div class="small-4 columns">
              <a href="#" class="alert button">Search</a>
            </div>
          </div>
        </form>
      </li>
      <li class="divider show-for-small"></li>
      <li class="has-form">
        <a class="button" href="<?php print base_url(); ?>index.php/topics/post">POST NEW TOPIC</a>
	
      </li>
      <li></li>
    </ul>
  </section>
</nav>
		
		
            
    
    
    
    
    
