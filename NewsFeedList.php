<html>
<head>
    <title>Nepal Government</title>
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
        function saveToData(){
            var data = $("#feedForm").serialize();
            console.log(data);
            $.ajax({
                type:"POST",
                url:"saveNewsFeed.php",
                data:data,
                success:function(data){
                        alert("Added Successfully");
                        document.location.reload(true);
                },
                error:function(error){

                }
            });
            return false;
        }

    </script>
    <style>
        body{color:#000000}
    </style>
</head>
<body>
<?php

include 'DbConnection.php';

$type= $_GET["type"];
$newsFeedQuery = "Select *from NewsFeed WHERE Type='$type' ORDER BY Id DESC";

$conn->query("set character_set_client='utf8'");
$conn->query("set character_set_results='utf8'");
$conn->query("set collation_connection='utf8_general_ci'");

$result = $conn->query($newsFeedQuery);

while($row=mysqli_fetch_assoc($result)){
    echo "<a href=response.php?feedId=" . $row["Id"], ">JobType:".$row["JobType"].'</a><br>';
    echo "Location:".$row["Location"].'<br>';
    echo "Required Number:".$row["RequiredNumber"].'<br>';
    echo "AddedDate:".$row["AddedDate"].'<br>';
    echo "Description:".$row["Description"].'<br>';
}
?>

<form onsubmit="return saveToData()" id="feedForm">
    <input type="hidden" name="type" value='<?php echo $type ?>' id="type"/>
    <input type="text" name="jobType" id="jobType" placeholder="Job Type"/>
    <input type="text" name="location" id="location" placeholder="Location"/>
    <input type="text" name="requiredNumber" id="requiredNumber" placeholder="Required Number"/>
    <input type="text" name="description" id="description" placeholder="Description"/>
    <input type="submit" value="Post"/>
</form>

</body>
</html>