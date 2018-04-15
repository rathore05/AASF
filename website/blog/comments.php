<?php
require("config.php");
require("helper.php");
$x=new links();
$y=$x::$a;

$sql = "SELECT * FROM comment WHERE post_id ='".$y."'";

$results = dbQuery($sql);
$items = array();
while ($row = dbFetchAssoc($results)) {
    $items[] = $row;
}
$comments = format_comments($items);
?>