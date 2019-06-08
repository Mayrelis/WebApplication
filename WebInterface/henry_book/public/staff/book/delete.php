<?php
 ob_start();
 ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once('../../../private/initialize.php');


if(is_post_request()) {
   
   $id = $_GET['id'];

  $sql = "DELETE FROM Book ";
  $sql .= "WHERE bookCode='$id'";


  $result = mysqli_query($db, $sql);

  // for RESULT statements , $result is true/false
  if($result){
  redirect_to(url_for('/staff/book/index.php'));

} else {
  //DELETE
  echo mysqli_error($db);
  db_disconnect($db);
  exit;
}

} 
else if (is_get_request()){
    $id = $_GET['bookCode'];
    $book = find_book_by_id($id);

}

?>

<?php $page_title = 'Delete Book'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/book/index.php'); ?>">&laquo; Back to List</a>

  <div class="delete book">
    <h1>Delete Book</h1>
    <p>Are you sure you want to delete this book?</p>
    <p class="item"><?php echo h($book['title']); ?></p>

    <form action="<?php echo url_for('/staff/book/delete.php?id=' . h(u($book['bookCode']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Book" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>