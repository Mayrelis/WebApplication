<?php require_once('../../../private/initialize.php'); ?>

<?php

//$id = $_GET['id'] ?? '1';
$id = isset($_GET['id']) == true ? $_GET['id'] : 1;
?>

<?php $author_title = 'Show Copy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

	<a class="back-link" href="<?php echo url_for('/staff/copy/index.php');?>">
	&laquo; Back to list</a>

	<div class="copy show">
		COPY ID: <?php echo h($id); ?>

	</div>

</div>

	<?php include(SHARED_PATH . '/staff_footer.php'); ?>
 