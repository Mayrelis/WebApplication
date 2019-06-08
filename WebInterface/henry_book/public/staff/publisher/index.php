<?php require_once('../../../private/initialize.php'); ?>


<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../../private/database.php');

$db = db_connect();
$publisher_set = find_all_publisher();


?>


<?php $publisher_title = 'Publishers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
      <div class="publisher Listing">
        <h1>Publishers</h1>

      <div class="actions">
        <a class="action" href="<?php echo url_for('/staff/publisher/new.php');
        ?>">Add a New Publisher </a>
    </div>
    <!-- /Create a table list with all my authors that are in my array/ -->
    <table class ="list">
      <tr>
        <!-- headers on the table top -->
        <th>Publisher Code</th>
        <th>Publisher Name</th>
        <th>City</th>
      <!--  <th>Name</th> -->
        <th>&nbsp;</th>
        <th>&nbsp;</th>
       
     
      </tr>
        <!-- loop through that array using foreach, So foreach , one of the publisher in the array. Im going to make each array called publisher and now i can ask for the values inside that array for each value.. -->
     <?php while($publisher = mysqli_fetch_assoc($publisher_set)) { ?> 
        <tr>
        <td><?php echo h($publisher['publisherCode']); ?></td>
        <td><?php echo h($publisher['publisherName']);?></td>
        <td><?php echo h($publisher['city']); ?></td>
       
        <td><a class="action" href="<?php echo
         url_for("/staff/publisher/edit.php?id={$publisher['publisherCode']}
                                                &publishername={$publisher['publisherName']}
                                                &city={$publisher['city']}
         ");?>">Modify</a></td>
        <td><a class="action" href="<?php echo url_for('/staff/publisher/delete.php?publisherCode=' . h(u(
          $publisher['publisherCode'])));?>">Delete</a></td>
      </tr>
        <?php } ?>
      </table>

      </div>
    </div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
 
 