<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 3/5/2016
 * Time: 11:57 AM
 */

include 'DbConnection.php';

$jobType=$_POST["jobType"];
$location=$_POST["location"];
$description=$_POST["description"];
$addedDate=date('Y-m-d');
$type=$_POST["type"];
$requiredNumber=$_POST["requiredNumber"];

$insertQuery = "INSERT INTO newsFeed VALUES(null,'$jobType','$location','$requiredNumber','$addedDate','$description','$type')";
$conn->query($insertQuery);

echo json_encode(array("success"=>true));
