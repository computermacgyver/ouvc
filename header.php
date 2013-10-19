<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                          <link rel="shortcut icon" href="ico/favicon.png">
  <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
  </head>

  <body>


<!--          <div class="row-fluid">
          	<div class="span12" style="font-family: 'IM Fell French Canon SC', serif; height:150px;margin-bottom:10px;">
          		<div class="span8 offset2" style="margin-top:25px;">
		        <h1 style="color:#FFF;">Oxford University Volleyball Club</h1>
		        <p style="color:#EEE">OUVC is a volleyball club with teams that cater for students and non-students, and we're also involved with teaching volleyball in UK schools. If you'd like to learn more about the club, please visit our Club Info page.</p>
		        </div>
          </div>
          </div>-->


<div class="navbar navbar-inverse">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="/ouvcv3/">OUVC</a>
                  <div class="nav-collapse collapse navbar-inverse-collapse">
                  <?php ouvc_main_nav(); // Adjust using Menus in Wordpress Admin ?>
                    
                    <form class="navbar-search pull-right" action="">
                      <input type="text" class="search-query span2" placeholder="Search">
                    </form>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div><!-- /navbar -->

