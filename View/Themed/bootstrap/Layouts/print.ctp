<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo Configure::read('App.name'); ?>: <?php echo $title_for_layout; ?></title>
    <meta name="description" content="<?php echo Configure::read('App.description'); ?>">
    <meta name="author" content="<?php echo Configure::read('App.author'); ?>">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Le styles -->
	  <?php
		  if (isset($assets)) {
			  echo $this->AssetLoader->required($assets);
		  }
	  ?>
      <?php echo $scripts_for_layout; ?>

	  <style>
		  body {
			  padding-top: 0px; /* 0px to make the container go all the way to the top of the topbar */
		  }
	  </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="container">

		<?php echo $content_for_layout; ?>

    </div> <!-- /container -->

    <?php echo $this->element('sql_dump'); ?>
  </body>
</html>