<?php
require_once('admin.php');
bb_get_admin_header();

// Query the users
$bb_user_search = new BB_User_Search($_GET['usersearch'], $_GET['userspage']);
$bb_user_search->display();

bb_get_admin_footer();
?>
