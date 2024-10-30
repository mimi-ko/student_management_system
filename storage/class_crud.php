<?php require_once('./storage/db.php'); ?>
<?php 

function add_class($mysqli,$class_description,$class_name){
    $sql = "INSERT INTO `class`(`description`, `class_name`) VALUES ('$class_description','$class_name')";
    return $mysqli->query($sql);
}

function get_all_class($mysqli){
    $sql = "SELECT * FROM `class`";
    return $mysqli->query($sql);
}

function get_class_id($mysqli,$class_id){
    $sql = "SELECT * FROM `class` WHERE `class_id`=$class_id";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function delete_class($mysqli,$class_id){
    $sql = "DELETE FROM `class` WHERE class_id = $class_id";
    return $mysqli->query($sql);
}

function update_class($mysqli,$id,$class_description,$class_name) {
    $sql = "UPDATE `class` SET `description`='$class_description',`class_name`='$class_name' WHERE class_id=$id";
    return $mysqli->query($sql);
}