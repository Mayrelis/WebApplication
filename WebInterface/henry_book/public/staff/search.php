<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../../private/initialize.php');  


if (is_post_request()){

	$query = $_POST['query'];

	if (!($bookSearch = (search_by_title($query)))){
		echo "<h1>Search returned 0 Books :(</h1>";
		exit;
	}
}
?>

<?php $book_title = 'Search'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

  	<div id="content">
  		<div class="Result">
  			<h1>Search</h1>


    <!-- /Create a table list with all my authors that are in my array/ -->
  	<table class ="list" style="padding: 24px !important;">
  		<tr style="padding: 18px;">
  			<!-- headers on the table top -->
	  		<th>Title</th>
	  		<th>Book Type</th>
	        <th>Paperback</th>
	        <th>Author Last Name</th>
	        <th>Author First Name</th>
	        <th>Publisher Code </th>
	        <th>Publisher Name</th>
	        <th>Publisher City</th>

  			<th>Inventory</th>
 
     
  		</tr>
  			<?php
  				foreach($bookSearch as $index => $book){?>
  					 <tr>
		  			 <td><?=$book['bookTitle']?></td>
		             <td><?=$book['bookType']?></td>
		             <td><?=$book['bookPaperback']?></td>
		             <td><?=$book['authorNameLast']?></td>
		             <td><?=$book['authorNameFirst']?></td>
		             <td><?=$book['publisherCode']?></td>
		             <td><?=$book['publisherName']?></td>
		             <td><?=$book['publisherCity']?></td>
		             <td>
			             	<?php
			             		if (!empty($book['inventory'])){

			  						foreach($book['inventory'] as $idx => $invt){?>
			  								<table>
			  								<tr>
			  									<th>Branch Number</th>
			  									<th>Branch Name</th>
			  									<th>Branch Location</th>
			  									<th>Available Quantity</th>
			  								</tr>
			  								<tr>
			  									<td><?=$invt['branchNum']?></td>
			  									<td><?=$invt['branchName']?></td>
			  									<td><?=$invt['branchLocation']?></td>
			  									<td><?=$invt['bookInventory']?></td>
			  								</tr>
			  								</table>
			  						<?php
			  						}

			  					}
			  					else{
			  						echo "<b> OUT OF STOCK</b>";
			  					}
			  				?>
  				</td>
  				</tr>
  			<?php } 
  			?>
        
      </table>

  		</div>
    </div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>