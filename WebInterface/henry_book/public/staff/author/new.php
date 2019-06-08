<?php

require_once('../../../private/initialize.php');

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// require_once('../../../private/database.php');

$authorNum = '';
$author_last='';
$author_first = '';

if(is_post_request()){

$author_last = $_POST['author_last'] ?? '';
$author_first = $_POST['author_first'] ?? '';


insert_author($author_last, $author_first);
echo "<h1> SUCCESS !!!</h1>";
echo '<a href="'.url_for('/staff/author/index.php').'">GO BACK</a>';
exit;
} 


?>

<?php $author_title = 'Add a new Author'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/author/index.php'); 
  ?>">&laquo; Back to List</a>

  <div class="author new">
    <h1>Add a new Author</h1>
    
  <form action="<?php echo url_for('/staff/author/new.php'); ?>" method="post">

        <dt>Last Name </dt>
         <dd><input type="text" name="author_last" value="<?php echo 
        h($author_last); ?>" /></dd>

      </dl>
      <dl>
        <dt>First Name</dt>
       <dd><input type="text" name="author_first" value="<?php echo 
        h($author_first); ?>" /></dd>

      </dl>
      <dl>
      <div id="operations">
        <input type="submit" value="Add a new Author" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 