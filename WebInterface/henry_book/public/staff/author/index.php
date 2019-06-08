<?php require_once('../../../private/initialize.php'); ?>


<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../../private/database.php');

$db = db_connect();
$author_set = find_all_authors();


?>

<?php $author_title = 'Authors'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

  	<div id="content">
  		<div class="author Listing">
  			<h1>Authors</h1>

  		<div class="actions">
  			<a class="action" href="<?php echo url_for('/staff/author/new.php');
  			?>">Add a New Author </a>
  	</div>
    <!-- /Create a table list with all my authors that are in my array/ -->
  	<table class ="list">
  		<tr>
  			<!-- headers on the table top -->
  			<th>author Num</th>
  			<th>author Last</th>
  			<th>author First</th>
  		<!-- 	<th>Name</th> -->
  			<th>&nbsp;</th>
  			<th>&nbsp;</th>
  			
  		</tr>
  			<!-- loop through that array using foreach, So foreach , one of the subjects in the array. Im going to make each array called author and now i can ask for the values inside that array for each value. -->
  		<?php while($author = mysqli_fetch_assoc($author_set)) { ?> 
  			<tr>
  			<td><?php echo h($author['authorNum']); ?></td>
  			<td><?php echo h($author['authorLast']);?></td>
  		  <td><?php echo h($author['authorFirst']); ?></td>
  		
  			<td><a class="action" href="<?php echo
         url_for("/staff/author/edit.php?id={$author['authorNum']}&fname={$author['authorFirst']}&lname={$author['authorLast']}");?>">Modify</a></td>
  			<td><a class="action" href="<?php echo url_for("/staff/author/delete.php?id={$author['authorNum']}");?>">Delete</a></td>
  		</tr>
  			<?php } ?>
  		</table>

  		</div>
    </div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
 
 