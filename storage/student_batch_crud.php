<?php require_once('./storage/db.php'); ?>
<?php 

function add_student_batch($mysqli,$student_id,$batch_id){
    $sql = "INSERT INTO `student_batch`(`student_id`, `batch_id`) VALUES ('$student_id','$batch_id')";
    return $mysqli->query($sql);
}

function get_all_student_batch($mysqli){
    $sql = "SELECT * FROM `student_batch`";
    return $mysqli->query($sql);
}

function get_student_batch_id($mysqli,$student_batch_id){
    $sql = "SELECT * FROM `student_batch` WHERE `student_batch_id`=$student_batch_id";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function delete_student_batch($mysqli,$student_batch_id){
    $sql = "DELETE FROM `student_batch` WHERE `student_batch_id`=$student_batch_id";
    return $mysqli->query($sql);
}

function update_student_batch($mysqli,$id,$student_id,$batch_id) {
    $sql = "UPDATE `student_batchs` SET `student_id`='$student_id',`batch_id`='$batch_id' WHERE `student_batch_id`=$id";
    return $mysqli->query($sql);
}