<?php require_once('./storage/db.php'); ?>
<?php 

function add_teacher($mysqli,$teacher_name,$teacher_email,$teacher_experience){
    $sql = "INSERT INTO `teachers`(`teacher_name`, `teacher_email`, `experience`) VALUES ('$teacher_name','$teacher_email','$teacher_experience')";
    return $mysqli->query($sql);
}

function get_all_teacher($mysqli){
    $sql = "SELECT * FROM `teachers`";
    return $mysqli->query($sql);
}

function get_teacher_id($mysqli,$teacher_id){
    $sql = "SELECT * FROM `teachers` WHERE teacher_id=$teacher_id";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function delete_teacher($mysqli,$teacher_id){
    $sql = "DELETE FROM `teachers` WHERE teacher_id=$teacher_id";
    return $mysqli->query($sql);
}

function update_teacher($mysqli,$id,$teacher_name,$teacher_email,$teacher_experience) {
    $sql = "UPDATE `teachers` SET `teacher_name`='$teacher_name',`teacher_email`='$teacher_email',`experience`='$teacher_experience' WHERE teacher_id=$id";
    return $mysqli->query($sql);
}