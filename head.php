<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="keywords" content="Canvas Printing,Canvas,website,sample,PHP,Martin Gingras" />
  <meta name="description" content="This is a sample PHP website created by Martin Gingras, mgingras.ca" />
  
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Raleway:400,700,200,300,900,800" rel="stylesheet" type="text/css">
  <title><?php echo "Canvas Printing - $title" ?></title>
  
  <!-- CSS -->
  <link rel="stylesheet" href="css/master.css" type="text/css" media="all" charset="utf-8">
  <link rel="stylesheet" href="css/font-awesome.css">
  
  <!-- ICONS N' SHIT -->
  <meta name="apple-mobile-web-app-capable" content="yes" >
  <meta name="apple-mobile-web-app-status-bar-style" content="default" >

  <link rel="apple-touch-icon" href="/images/site/canvas.png" >
  <link rel="apple-touch-icon-precomposed" href="/images/site/canvas.png" >


  <!-- VIEWPORTS... -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- standard viewport tag to set the viewport to the device's width
  , Android 2.3 devices need this so 100% width works properly and
  doesn't allow children to blow up the viewport width-->
  <meta name="viewport" id="vp" content="initial-scale=1.0,user-scalable=yes,maximum-scale=1,width=device-width" >
  <!-- width=device-width causes the iPhone 5 to letterbox the app, so
  we want to exclude it for iPhone 5 to allow full screen apps -->
  <meta name="viewport" id="vp6" content="initial-scale=1.0,user-scalable=yes,maximum-scale=1" media="(device-height: 568px)" >

  <!-- Shortcuts n' Shit -->

  <meta property="og:image" content="/images/canvas.png">


  <!-- FAVICON -->

  <!-- For IE -->
  <link rel="shortcut icon" href="images/site/favicon.ico">

  <!-- For Everything else... -->
  <link rel="icon" type="image/ico" href="images/site/favicon.ico">
  
  <!-- SCRIPTS -->
  <script type="text/javascript" src="scripts/javaScripts.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
</head>
<body>
  <div id="wrapper" class="container">
    <?php include("menu_bar.php"); ?>
    <div id="page">