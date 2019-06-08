<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// // require_once('../../../private/database.php');

require_once('../../../private/initialize.php');


if (is_get_request()){
  $id = $_GET['bookCode'];

  $book = find_book_by_id($id);

}


if(is_post_request()){

$bookCode = $_GET['id'] ?? '';
$title = $_POST['title'] ?? '';
$publisher_code = $_POST['publisher_code'] ?? '';
$type = $_POST['type'] ?? '';
$paperback = $_POST['paperback'] ?? '';



update_book($bookCode, $title, $publisher_code, $type, $paperback);
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
    <h1>Modify Book</h1>
    
      <form action="<?php echo url_for('/staff/book/edit.php?id=' . 
    h(u($id))); ?>"method="post">

       
      <dl>
        <dt>Title</dt>
       <dd><input type="text" name="title" value="<?php echo 
        h($book['title']); ?>" /></dd>
      </dl>

       <dl>
        <dt>Publisher Code</dt>
       <dd><input type="text" name="publisher_code" value="<?php echo 
        h($book['publisherCode']); ?>" /></dd>
      </dl>

       <dl>
        <dt>Type</dt>
       <dd><input type="text" name="type" value="<?php echo 
        h($book['type']); ?>" /></dd>
      </dl>

       <dl>
        <dt>Paper Back</dt>
       <dd>
        <select name="paperback">

          <option value="Y" <?php if ($book['paperback'] == 'Y') echo "selected"; ?>>Yes</option>
          <option value="N" <?php if ($book['paperback'] == 'N') echo "selected" ?>>No</option>
        </select>
      </dd>

      <dl>
      <div id="operations">
        <input type="submit" value="Update book" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 