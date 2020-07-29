<?php
require('../../svj_connect.inc.php');

$result = mysqli_query($dbc, "SELECT * FROM articles WHERE id = \"{$_GET['id']}\" LIMIT 1");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$result = mysqli_query($dbc, "SELECT name FROM columns WHERE id = \"{$row['column_id']}\"");
$colrow = mysqli_fetch_array($result, MYSQLI_BOTH);

$page_title = str_replace('-', " ", $row[1]);
include('includes/header.html');
$date = str_replace('-', '/', $row[3]);
$url = "/articles/{$colrow['name']}/$date/{$row['title']}";
echo '<form action="' . $url . '" method="post">';
echo '<textarea name="new-body" id = "article-' . $row[0] . '" class = "article-body">' . $row[2] . '</textarea>';
echo '<input type="submit" value="Submit Edits">';
echo '</form>';
include('includes/footer.html');

?>
