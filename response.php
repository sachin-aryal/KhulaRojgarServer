<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 3/5/2016
 * Time: 12:24 PM
 */

include 'DbConnection.php';

$feedId = $_GET["feedId"];

$responseQuery = "SELECT *from Response where feedId=$feedId";


$result = $conn->query($responseQuery);

while($row=mysqli_fetch_assoc($result)){
    echo $row["Name"];
    echo $row["Gender"];
    echo $row["DOB"];
    echo $row["CitizenShipNumber"];
    echo $row["LicenseNumber"];
    echo $row["FatherName"];
    echo $row["MotherName"];
    echo $row["HusOrWifeName"];
    echo $row["Phone"];
}
