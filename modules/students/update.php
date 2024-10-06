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
                        <form  method="POST">
 
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
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="tel" name="contact" class="form-control" id="contact" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option selected>Select your gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" id="dob" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fees" class="form-label">Fees</label>
                                    <input type="number" name="fees" class="form-control" id="fees" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="education" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control" id="education" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="trainer" class="form-label">Trainer</label>
                                    <input type="text" name="trainer" class="form-control" id="trainer" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control" id="age" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="doj" class="form-label">Date of Joining</label>
                                    <input type="date" name="doj" class="form-control" id="doj" required>
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