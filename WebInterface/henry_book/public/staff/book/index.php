<?php require_once('../../../private/initialize.php'); ?>


<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../../private/database.php');

$db = db_connect();
$book_set = find_all_book();


?>


<?php $book_title = 'Book'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

  	<div id="content">
  		<div class="book Listing">
  			<h1>Book</h1>

  		<div class="actions">
  			<a class="action" href="<?php echo url_for('/staff/book/new.php');?>
        ">Add a New Book </a>
  	</div>
    <!-- /Create a table list with all my authors that are in my array/ -->
  	<table class ="list">
  		<tr>
  			<!-- headers on the table top -->
  			<th>book Code</th>
  			<th>Title</th>
  			<th>Publisher Code</th>
        <th>Type</th>
        <th>Paperback</th>

  		<!-- 	<th>Name</th> -->
  			<th>&nbsp;</th>
  			<th>&nbsp;</th>
        
          


  		</tr>
  			<!-- loop through that array using foreach, So foreach , one of the books in the array. Im going to make each array called book and now i can ask for the values inside that array for each value. -->
  		<?php while($book = mysqli_fetch_assoc($book_set)) { ?> 
  			<tr>
  			<td><?php echo h($book['bookCode']); ?></td>
  			<td><?php echo h($book['title']);?></td>
  		  <td><?php echo h($book['publisherCode']); ?></td>
        <td><?php echo h($book['type']); ?></td>
        <td><?php echo h($book['paperback']); ?></td>


        <td><a class="action" href="<?php echo 
        url_for('/staff/book/edit.php?bookCode=' . h(u($book['bookCode'])));
        ?>">Modify</a></td>
        <td><a class="action" href="<?php echo url_for('/staff/book/delete.php?bookCode=' . h(u(
          $book['bookCode'])));?>">Delete</a></td>
      </tr>
        <?php } ?>
      </table>

  		</div>
    </div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
 
 