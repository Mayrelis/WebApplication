<?php

require_once('../../../private/initialize.php');

if(is_post_request()){
// Handle form values sent by new.php

$menu_name = $_POST['menu_name'] ?? '';
$position = $_POST['position'] ?? '';
$visible = $_POST['visible'] ?? '';

echo "Form parameters<br />";
$book_code = $_POST['book_code'] ?? '';
$title = $_POST['title'] ?? '';
$publisher_code = $_POST['publisher_code'] ?? '';
$type = $_POST['type'] ?? '';
$paperback = $_POST['paperback'] ?? '';

}else {
	redirect_to(url_for('/staff/book/new.php'));
}

?>
