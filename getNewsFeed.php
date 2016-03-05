<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body>

</body>
</html>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 3/4/2016
 * Time: 10:40 PM
 */

include 'DbConnection.php';

$type= $_GET["Type"];
$newsFeedQuery = "Select *from NewsFeed WHERE Type='$type'";

$conn->query("set character_set_client='utf8'");
$conn->query("set character_set_results='utf8'");
$conn->query("set collation_connection='utf8_general_ci'");

$result = $conn->query($newsFeedQuery);

$data = [];


while($row=mysqli_fetch_assoc($result)){
    $rowData = array("Id"=>$row["Id"],"Location"=>$row["Location"],"JobType"=>$row["JobType"],"AddedDate"=>$row["AddedDate"],
        "Description"=>$row["Description"],"Type"=>$row["Type"]);
    $data[]=$rowData;
}

echo json_encode($data,JSON_UNESCAPED_UNICODE);
