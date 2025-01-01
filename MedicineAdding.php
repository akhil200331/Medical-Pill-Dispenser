<?php
$conn=new mysqli("localhost:3307","root","Asdfg#143","nodemcu");
if($conn->connect_error){
  die("Failed to connect ".$conn->connect_error);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <label for="med">Medicine:</label>
        <input type="text" name="med" required><br><br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="timee" required><br><br>
        <input type="submit" class="sub" name="submit">

    </form>
</body>
</html>
<?php
$medicine_name;
$timeformedicine_name;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_name = $_POST['med'];
    $timeformedicine_name = $_POST['timee'];
    $queryy = "insert into medicine_timing(medicinename,Time,Status) values('" . $medicine_name . "','" . $timeformedicine_name . "','ACTIVATED')";
    
    if ($conn->query($queryy) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $queryy . "<br>" . $conn->error;
}
}

?>