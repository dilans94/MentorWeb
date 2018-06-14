<?php
require 'dp.php';
$startupID = $_GET['startupID'];
$sql = 'DELETE FROM startup WHERE startupID=:startupID';
$statement = $connection->prepare($sql);
if ($statement->execute([':startupID' => $startupID])) {
  header("Location: manage-startup.php");
}
?>