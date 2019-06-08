<?php require_once('../../../private/initialize.php'); ?>


<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../../private/database.php');

$db = db_connect();
$copy_set = find_all_copy();


?>


<?php $author_title = 'Copy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

  	<div id="content">
  		<div class="author Listing">
  			<h1>Copy</h1>

  		<div class="actions">
  			<a class="action" href="<?php echo url_for('/staff/copy/new.php');
  			?>">Add a New Copy </a>
  	</div>
    <!-- /Create a table list with all my authors that are in my array/ -->
  	<table class ="list">
  		<tr>
  			<!-- headers on the table top -->
        <th>Book Code</th>
  			<th>Branch Num</th>
  			<th>Copy Num</th>
  			<th>Quality</th>
        <th>Price</th>
  		<!-- 	<th>Name</th> -->
  			<th>&nbsp;</th>
  			<th>&nbsp;</th>
  			

    
  		</tr>
  			<!-- loop through that array using foreach, So foreach , one of the copy in the array. Im going to make each array called copy and now i can ask for the values inside that array for each value. -->
  		<?php while($copy = mysqli_fetch_assoc($copy_set)) { ?> 
  			<tr>
        <td><?php echo h($copy['bookCode']); ?></td> 
  			<td><?php echo h($copy['branchNum']); ?></td>
  			<td><?php echo h($copy['copyNum']);?></td>
  		  <td><?php echo h($copy['quality']); ?></td>
        <td><?php echo h($copy['price']); ?></td>


         <td><a class="action" href="<?php echo 
        url_for('/staff/copy/edit.php?bookCode=' . h(u($copy['bookCode'])));
        ?>">Modify</a></td>

        <td><a class="action" href="<?php echo url_for('/staff/copy/delete.php?bookCode=' . h(u(
          $copy['bookCode'])));?>">Delete</a></td>
      </tr>
        <?php } ?>
      </table>

  		</div>
    </div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
 
 