<?php

require_once('../../../private/initialize.php');

$book_code = '';
$branch_num ='';
$copy_num='';
$quality = '';
$price ='';


if(is_post_request()){


$book_code = $_POST['book_code'] ?? '';
$branch_num = $_POST['branch_num'] ?? '';
$copy_num = $_POST['copy_num'] ?? '';
$quality = $_POST['Quality'] ?? '';
$price = $_POST['price'] ?? '';



insert_copy($branch_num, $copy_num, $quality, $price);
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
    <h1>Add a new Copy</h1>
    
     <form action="<?php echo url_for('/staff/copy/new.php'); ?>" method="post">

       
      <dl>
        <dt>Branch Num</dt>
       <dd><input type="text" name="branch_num" value="<?php echo 
        h($branch_num); ?>" /></dd>
      </dl>

       <dl>
        <dt>Copy Num</dt>
       <dd><input type="text" name="copy_num" value="<?php echo 
        h($copy_num); ?>" /></dd>
      </dl>

       <dl>
        <dt>Quality</dt>
        <dd>
        <select name="Quality">
          <option value="Excellent">Excellent</option>
          <option value="Good">Good</option>
          <option value="Fair">Fair</option>
          <option value="Poor">Poor</option>
        </select>
      </dd>
       <dl>
        <dt>Price</dt>
       <dd><input type="text" name="price" value="<?php echo 
        h($price); ?>" /></dd>
      </dl>

      <dl>
      <div id="operations">
        <input type="submit" value="Add a new Copy" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 