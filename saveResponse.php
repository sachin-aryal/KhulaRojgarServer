<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 3/5/2016
 * Time: 1:00 PM
 */

include 'DbConnection.php';

$name=$_POST["fullName"];
$dob=$_POST["birthDay"]."-".$_POST["birthMonth"]."-".$_POST["birthYear"];
$gender=$_POST["gender"];
$citizenshipNo=$_POST["citizenshipNo"];
$citizenDistrict=$_POST["citizenDistrict"];
$licenseNo=$_POST["licenceNo"];
$fatherName=$_POST["fatherFullName"];
$motherName=$_POST["motherFullName"];
$partnerName=$_POST["partnerFullName"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$feedId = $_POST["feedId"];

$insertResponse = "INSERT INTO Response VALUES(null,'$name','$gender','$dob','$citizenshipNo','$citizenDistrict','$licenseNo',
'$fatherName','$motherName','$partnerName','$mobile','$email',$feedId)";

$conn->query($insertResponse);

echo json_encode(array("success"=>true));


