<?php
require('../../svj_connect.inc.php');

$result = mysqli_query($dbc, "SELECT * FROM articles WHERE title = \"{$_GET['name']}\"");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = mysqli_real_escape_string($dbc, trim($_POST['new-body']));
    $q = "UPDATE articles SET body = '$body' WHERE id = {$row[0]}";
    $r = mysqli_query($dbc, $q);
    if (mysqli_affected_rows($dbc) == 1)
        echo "<script>alert('The article has been updated');</script>";
}

$page_title = str_replace('-', " ", $row[1]);
include('includes/header.html');
echo '<div id="article-' . $row['id'] . '" class = "article-body">' . $row[2] . '</div>';
include('includes/footer.html');

?>
