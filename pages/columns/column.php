<?php

$page_title = isset($_GET['column']) ? $_GET['column'] : '???';
@require('../includes/header.html');
require('../../../svj_connect.inc.php');
$q = "SELECT id FROM columns WHERE name = \"{$_GET['column']}\"";
$r = mysqli_query($dbc, $q);
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
$columnid = $row['id'];
$q = "SELECT id, title, body, CONCAT(YEAR(`date_written`), '/', MONTH(`date_written`), '/', DAYOFMONTH(`date_written`)) FROM articles WHERE column_id = $columnid";
$result = mysqli_query($dbc, $q);
echo "<div class = 'latest-articles'>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
	echo "<div class = 'new-article'>";
	echo "<a href = \"/articles/{$_GET['column']}/{$row['name']}/{$row[3]}/{$row['title']}\">";
	echo "<h2>" . $row[1] . "</h2>";
	echo "<span>" . $row[3] . "</h2>";
	echo "</a></div>";
}
echo "</div>";
@require('../includes/footer.html');

?>
