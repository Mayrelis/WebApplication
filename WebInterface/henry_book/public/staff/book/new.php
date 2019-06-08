<?php

require_once('../../../private/initialize.php');


$book_code = '';
$title='';
$publisher_code = '';
$type ='';
$paperback = '';


if(is_post_request()){

$book_code = $_POST['book_code'] ?? '';
$title = $_POST['title'] ?? '';
$publisher_code = $_POST['publisher_code'] ?? '';
$type = $_POST['type'] ?? '';
$paperback = $_POST['paperback'] ?? '';


insert_book($title, $publisher_code, $type, $paperback);
echo "<h1> SUCCESS !!!</h1>";
echo '<a href="'.url_for('/staff/book/index.php').'">GO BACK</a>';
exit;
} 


?>

<?php $book_title = 'Add a new Book'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/book/index.php'); 
  ?>">&laquo; Back to List</a>

  <div class="book new">
    <h1>Add a new Book</h1>
    
      <form action="<?php echo url_for('/staff/book/new.php'); ?>" method="post">

      <dl>
        <dt>Title</dt>
       <dd><input type="text" name="title" value="<?php echo 
        h($title); ?>" /></dd>
      </dl>

       <dl>
        <dt>Publisher Code</dt>
       <dd><input type="text" name="publisher_code" value="<?php echo 
        h($publisher_code); ?>" /></dd>
      </dl>

       <dl>
        <dt>Type</dt>
       <dd><input type="text" name="type" value="<?php echo 
        h($type); ?>" /></dd>
      </dl>

       <dl>
        <dt>Paper Back</dt>
       <dd>
        <select name="paperback">
          <option value="Y">Yes</option>
          <option value="N">No</option>
        </select>
      </dd>
 <!--       <input type="text" name="paperback" value="<?php echo 
        h($paperback); ?>" /></dd> -->
      </dl>

      <dl>
      <div id="operations">
        <input type="submit" value="Add a new Book" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 