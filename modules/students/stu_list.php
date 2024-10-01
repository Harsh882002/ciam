<?php 

include ('../../database/database.php'); 


$sql = "SELECT * FROM student_info";
$sql = $conn -> prepare($sql);
$sql -> execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<body>

<table class="table table-striped-columns">
    <thead>
        <tr>
         
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Fees</th>
            <th>Education</th>
            <th>Trainer</th>
            <th>Age</th>
            <th>Date_of_Joining</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($result as $row):?>


    <tr>
        <td><?php echo $row["student_id"]?></td>
        <td><?php echo $row["student_name"]?></td>
        <td><?php echo $row["email"]?></td>
        <td><?php echo $row["contact"]?></td>
        <td><?php echo $row["gender"]?></td>
        <td><?php echo $row["dob"]?></td>
        <td><?php echo $row["fees"]?></td>
        <td><?php echo $row["education"]?></td>
        <td><?php echo $row["trainer"]?></td>
        <td><?php echo $row["age"]?></td>
        <td><?php echo $row["doj"]?></td>
    </tr>
 
   <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>