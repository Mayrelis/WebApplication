<?php
 ob_start();
 ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once('../../../private/initialize.php');

// if(!isset($_GET['id'])) {
//   //redirect_to(url_for('/staff/subjects/index.php'));
// }
// $id = $_GET['id'];




if(is_post_request()) {
   
   $id = $_GET['id'];

  $sql = "DELETE FROM Copy ";
  $sql .= "WHERE bookCode='$id'";


  $result = mysqli_query($db, $sql);

  // for RESULT statements , $result is true/false
  if($result){
  redirect_to(url_for('/staff/copy/index.php'));

} else {
  //DELETE
  echo mysqli_error($db);
  db_disconnect($db);
  exit;
}

} 
else if (is_get_request()){
    $id = $_GET['bookCode'];
    $copy = find_copy_by_id($id);

}

?>

<?php $page_title = 'Delete Copy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/copy/index.php'); ?>">&laquo; Back to List</a>

  <div class="delete copy">
    <h1>Delete Copy</h1>
      <p>Are you sure you want to delete this copy?</p>
    <p class="item"><?php echo h($copy['bookCode']); ?></p>

    <form action="<?php echo url_for('/staff/copy/delete.php?id=' . h(u($copy['bookCode']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Copy" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>