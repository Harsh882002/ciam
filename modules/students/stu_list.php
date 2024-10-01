<?php 

include_once '../../database/database.php'; 


$sql = "SELECT * FROM student_info";
$sql = $conn -> prepare($sql);
$sql -> execute();
$result = $conn->get_result();

$row = $result -> fetch_assoc();
print_r($row);
 
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
            <th>ID</th>
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
    <?php if ($result->num_rows > 0): ?>

    <?php while($row = $result -> fetch_assoc()): 
        
        ?>  

    <tr>
        <td><?php echo htmlspecialchars($row['student_name']) ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <?php endwhile; ?>
    <?php endif; ?>
    </tbody>
</table>


</body>
</html>


