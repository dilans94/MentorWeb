<?php
require 'dp.php';
$mentorID = $_GET['mentorID'];
$sql = 'DELETE FROM mentor WHERE mentorID=:mentorID';
$statement = $connection->prepare($sql);
if ($statement->execute([':mentorID' => $mentorID])) {
  header("Location:  http://localhost/Mentor/manage-mentors.php");
}
?>