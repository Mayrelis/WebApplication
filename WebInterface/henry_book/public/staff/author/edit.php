<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
	redirect_to(url_for('/staff/author/index.php'));
}

$id = $_GET['id'];
$author_lname =$_GET['lname'];
$author_fname = $_GET['fname'];

if(is_post_request()){
// Handle form values sent by new.php

$author_last = $_POST['author_last'] ?? '';
$author_first = $_POST['author_first'] ?? '';


update_author($id, $author_last, $author_first);
echo "<h1> SUCCESS !!!</h1>";
echo '<a href="'.url_for('/staff/author/index.php').'">GO BACK</a>';
exit;


} 

?>

<?php $author_title = 'Edit Author'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/author/index.php'); ?>">&laquo; Back to List</a>

  <div class="author edit">
    <h1>Modify Author</h1>

    <form action="<?php echo url_for('/staff/author/edit.php?id=' . 
    h(u($id))); ?>"method="post">
     
        <dt>Last Name</dt>
        <dd><input type="text" name="author_last" value="<?=$author_lname?>" /></dd>
      </dl>
      <dl>
      <dl>
        <dt>First Name</dt>
         <dd><input type="text" name="author_first" value="<?=$author_fname?>" /></dd>
      </dl>
      <dl>
      <div id="operations">
        <input type="submit" value="Author Edit" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 
