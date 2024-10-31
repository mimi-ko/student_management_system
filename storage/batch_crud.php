<?php require_once('./storage/db.php'); ?>
<?php 

function add_batch($mysqli,$batch_name,$start_date,$end_date,$fees,$description,$teacher_id,$class_id){
    $sql = "INSERT INTO `batch`(`batch_name`, `start_date`, `end_date`, `fees`,`description`,`teacher_id`,`class_id`) VALUES ('$batch_name','$start_date','$end_date','$fees','$description','$teacher_id','$class_id')";
    return $mysqli->query($sql);
}

function get_all_batch($mysqli){
    $sql = "SELECT * FROM `batch`";
    return $mysqli->query($sql);
}

function get_batch_id($mysqli,$batch_id){
    $sql = "SELECT * FROM `batch` WHERE batch_id=$batch_id";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function delete_batch($mysqli,$batch_id){
    $sql = "DELETE FROM `batch` WHERE batch_id=$batch_id";
    return $mysqli->query($sql);
}

function update_batch($mysqli,$id,$batch_name,$start_date,$end_date,$fees,$description,$teacher_id,$class_id) {
    $sql = "UPDATE `batch` SET `batch_name`='$batch_name',`start_date`='$start_date',`end_date`='$end_date',`fees`='$fees',`description`='$description',`teacher_id`='$teacher_id',`class_id`='$class_id' WHERE batch_id=$id";
    return $mysqli->query($sql);
}