<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../../../private/initialize.php');


if (is_get_request()){
  $id = $_GET['bookCode'];

  $copy = find_copy_by_id($id);

}


if(is_post_request()){

$bookCode = $_GET['id'];
$quality = $_POST['quality'] ?? '';
$price = $_POST['price'] ?? '';


update_copy($bookCode, $quality, $price);
echo "<h1> SUCCESS !!!</h1>";
echo '<a href="'.url_for('/staff/copy/index.php').'">GO BACK</a>';
exit;
} 


?>

<?php $book_title = 'Add a new Copy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/copy/index.php'); 
  ?>">&laquo; Back to List</a>

  <div class="copy new">
    <h1>Modify Copy</h1>
    
      <form action="<?php echo url_for('/staff/copy/edit.php?id=' . 
    h(u($id))); ?>"method="post">


       <dl>
        <dt>Quality</dt>
       <dd>
        <select name="quality">

          <option value="Excellent"<?php if ($copy['quality'] == 'Excellent') echo "selected"; ?>>Excellent</option>
          <option value="Good"<?php if ($copy['quality'] == 'Good') echo "selected"; ?>>Good</option>
          <option value="Fair"<?php if ($copy['quality'] == 'Fair') echo "selected"; ?>>Fair</option>
          <option value="Poor"<?php if ($copy['quality'] == 'Poor') echo "selected"; ?>>Poor</option>
        </select>
      </dd>

       <dl>
        <dt>Price</dt>
       <dd><input type="text" name="price" value="<?php echo 
        h($copy['price']); ?>" /></dd>
      </dl>

      <dl>
      <div id="operations">
        <input type="submit" value="Add a new Copy" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 