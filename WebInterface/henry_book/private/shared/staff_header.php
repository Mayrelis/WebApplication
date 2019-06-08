<?php 
if(!isset($page_title)) {$page_title = 'Henry Book Library';}
?>

<!doctype html>

<html lang="en">
  <head>
    <title> May - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel ="stylesheet" media ="all" href ="<?php echo url_for('/stylesheets/staff.css'); ?>"/>
  </head>

  <body>
  	<header>
  		<h1> Henry Book Library  </h1>

  	</header>

  	<navigation>
  		<ul>
  			<li><a href= "<?php echo url_for('/staff/index.php'); ?>"> <h1>Home</a></li>
  		</ul></h1>
  	</navigation>