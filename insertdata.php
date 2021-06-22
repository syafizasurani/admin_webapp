<?php
$conn = mysqli_connect("localhost", "root", "", "universityrankingadmin");
$uni_name = $_POST['uni_name'];
$overall_score = $_POST['overall_score'];
$academic_reputation = $_POST['academic_reputation'];
$employee_reputation = $_POST['employee_reputation'];
$student_ratio = $_POST['student_ratio'];

$sql = "INSERT INTO `university_data`(`uni_name`, `overall_score`, `academic_reputation`, `employee_reputation`, `student_ratio`) 
        VALUES ('$uni_name','$overall_score','$academic_reputation','$employee_reputation','$student_ratio')";
$insert = mysqli_query($conn, $sql);
if(!$insert){
    echo "failed";
}
else {
    header("Location: /admin%20webapp/");
}

?>