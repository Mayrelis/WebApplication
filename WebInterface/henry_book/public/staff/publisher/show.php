<?php require_once('../../../private/initialize.php'); ?>

<?php

//$id = $_GET['id'] ?? '1';
$id = isset($_GET['id']) == true ? $_GET['id'] : 1;
?>

<?php $author_title = 'Show Publishers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

	<a class="back-link" href="<?php echo url_for('/staff/publisher/index.php');?>">
	&laquo; Back to list</a>

	<div class="author show">
		PUBLISHER ID: <?php echo h($id); ?>

	</div>

</div>

	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 