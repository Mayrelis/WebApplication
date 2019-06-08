<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../private/initialize.php'); 
?>



<?php $page_title = 'May Dreamer Library'; ?>

<div id="example1">
  <span>"" </span>
</div> 

<?php include(SHARED_PATH . '/staff_header.php'); ?>
<!-- <div id="example1">
  <span>"" </span>
</div>  -->   
<form class="example" action="search.php" method = "POST" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="query" />
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

    
  	<div id="content">
  	     <div id="main-menu">
          
            <h1>Main Menu</h1>
                <ul>
                 <h2><li><a href="<?php echo url_for('/staff/book/index.php');
                 ?>">Books</a></li></h2>
                 <h2><li><a href="<?php echo url_for('/staff/publisher/index.php');
                 ?>">Publisher</a></li></h2>
                 <h2><li><a href="<?php echo url_for('/staff/author/index.php');
                 ?>">Authors</a></li></h2>
                 <h2><li><a href="<?php echo url_for('/staff/copy/index.php');
                 ?>">Copy</a></li></h2>
        </ul>
    </div>

  	 
</div>
 <?php include(SHARED_PATH . '/staff_footer.php'); ?>

  