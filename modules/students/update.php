<?php
include ('../../database/database.php'); 

//Fetching Data from databse to html page 

if(isset($_GET['student_id']) && !empty($_GET['student_id'])) {
    $student_id = intval($_GET['student_id']);
    
    // Prepare and execute the SQL statement
    $stmt = "SELECT * from student_info WHERE student_id = ?";
   
    $sql = $conn -> prepare($stmt);
    
    $sql -> bindParam(1, $student_id, PDO::PARAM_INT);
    $sql -> execute();
    
    // Fetch only a single row
    $field = $sql -> fetch(PDO::FETCH_ASSOC);
 
    if(!$field) {
        echo "Student not found!";
    }
}
else {
    echo "No student ID provided!";
}


//Update Data Code

if(isset($_POST['submit'])){

$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : "fff ";
$student_name = isset($_POST['student_name']) ? $_POST['student_name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$contact = isset($_POST['contact']) ? $_POST['contact'] : "";
$gender = isset($_POST['gender']) ? $_POST['gender'] : 'ww';
$dob =  isset($_POST['dob'])? $_POST['dob']:'';
$fees = isset($_POST['fees'])? $_POST['fees']:'';
$education = isset($_POST['education'])? $_POST['education']:'';
$trainer = isset($_POST['trainer'])? $_POST['trainer']:'';
$age = isset($_POST['age'])? $_POST['age']:'';
$doj = isset($_POST['doj'])? $_POST['doj']:'';


$stmt = "UPDATE student_info  SET student_name= ?, email=?, contact = ?, gender=?, dob=?, fees= ?, education=?, trainer=?, age=?, doj=?  WHERE student_id = ? ";
$sql =  $conn -> prepare($stmt);
// var_dump($sql);
$result = $sql -> execute([ $student_name,$email,$contact,$gender,$dob,$fees,$education,$trainer,$age ,$doj, $student_id]);

if($result){
    header('Location: stu_list.php'); // Correct header redirection
    exit(); // Stop further script execution after redirection
} else {
    echo "Error updating record.";
}
}

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


<div class="container mt-5" method>
        <div class="row justify-content-center">
            <div class="col-md-12"> <!-- Change to col-md-12 for full width -->
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Student Information Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
 
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="student_id" class="form-label">Student ID</label>
                                    <input type="text" name="student_id" class="form-control" id="student_id"  value="<?php echo isset($field['student_id']) ? $field['student_id']:""; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">student_name</label>
                                    <input type="text" name="student_name" class="form-control" id="student_name" value="<?php echo isset($field['student_name']) ? $field['student_name'] : ""; ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $field['email'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="tel" name="contact" class="form-control" id="contact" value="<?php echo $field['contact'] ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender"  required>
                                        <option selected>Select your gender</option>
                                        <option value="male" <?php echo isset($field['gender']) && $field['gende'] == 'male' ? 'selected' : "" ; ?>> Male</option>
                                        <option value="female" <?php echo isset($field['gender']) && $field['gender'] == 'female' ? 'selected' : "" ?> >Female</option>
                                        <option value="other" <?php  echo isset($field['gender']) && $field['gender']  == 'other'? 'selected': 'selected' ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" id="dob"value="<?php echo $field['dob'] ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fees" class="form-label">Fees</label>
                                    <input type="number" name="fees" class="form-control" id="fees" value="<?php echo $field['fees'] ?>"  required>
                                </div>
                                <div class="col-md-6">
                                    <label for="education" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control" id="education" value="<?php echo $field['education'] ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="trainer" class="form-label">Trainer</label>
                                    <input type="text" name="trainer" class="form-control" id="trainer" value="<?php echo $field['trainer'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control" id="age" value="<?php echo $field['age'] ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="doj" class="form-label">Date of Joining</label>
                                    <input type="date" name="doj" class="form-control" id="doj" value="<?php echo $field['doj'] ?>" required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>