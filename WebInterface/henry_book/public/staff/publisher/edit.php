<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
  redirect_to(url_for('/staff/publisher/index.php'));
}

if (is_get_request()){
$id = $_GET['id'];
$publisher_name =$_GET['publishername'];
$city = $_GET['city'];
}

if(is_post_request()){
// Handle form values sent by new.php
$id = $_GET['id'];
$publisher_name = $_POST['publisher_name'] ?? '';
$city = $_POST['city'] ?? '';

update_publisher($id, $publisher_name, $city);
echo "<h1> SUCCESS !!!</h1>";
echo '<a href="'.url_for('/staff/publisher/index.php').'">GO BACK</a>';
exit;


} 

?>

<?php $publisher_title = 'Add a new Publisher'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/publisher/index.php'); 
  ?>">&laquo; Back to List</a>

  <div class="new publisher">
    <h1>Modify Publisher</h1>
    
      <form action="<?php echo url_for('/staff/publisher/edit.php?id=' . 
    h(u($id))); ?>"method="post">

       
      <dl>
        <dt>Publisher Name</dt>
       <dd><input type="text" name="publisher_name" value="<?php echo 
        h($publisher_name); ?>" /></dd>
      </dl>

       <dl>
        <dt>City</dt>
       <dd><input type="text" name="city" value="<?php echo 
        h($city); ?>" /></dd>
      </dl>

      

      <dl>
      <div id="operations">
        <input type="submit" value="Add a new Publisher" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 