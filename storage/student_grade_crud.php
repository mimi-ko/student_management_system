<?php require_once('./storage/db.php'); ?>
<?php 

function add_student_grade($mysqli,$student_grade,$student_batch_id){
    $sql = "INSERT INTO `student_grade`(`student_grade`, `student_ba$student_batch_id`) VALUES ('$student_grade','$student_batch_id')";
    return $mysqli->query($sql);
}

function get_all_student_grade($mysqli){
    $sql = "SELECT * FROM `student_grade`";
    return $mysqli->query($sql);
}

function get_student_grade_id($mysqli,$student_grade_id){
    $sql = "SELECT * FROM `student_grade` WHERE `student_grade_id`=$student_grade_id";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function delete_student_grade($mysqli,$student_grade_id){
    $sql = "DELETE FROM `student_grade` WHERE student_grade_id=$student_grade_id";
    return $mysqli->query($sql);
}

function update_student_grade($mysqli,$id,$student_grade,$student_batch_id) {
    $sql = "UPDATE `student_grade` SET `student_grade`='$student_grade',`student_batch_id`='$student_batch_id' WHERE `student_grade_id`=$id";
    return $mysqli->query($sql);
}