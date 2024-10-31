<?php require_once('./storage/db.php'); ?>
<?php 

function add_marking_type($mysqli,$type_name,$min_mark,$max_mark){
    $sql = "INSERT INTO `marking_type`(`type_name`,`min_mark`,`max_mark`) VALUES ('$type_name','$min_mark','$max_mark')";
    return $mysqli->query($sql);
}

function get_all_marking_type($mysqli){
    $sql = "SELECT * FROM `marking_type`";
    return $mysqli->query($sql);
}

function get_marking_type_id($mysqli,$marking_type_id){
    $sql = "SELECT * FROM `marking_type` WHERE `marking_type_id`=$marking_type_id";
    $result = $mysqli->query($sql);
    return $result->fetch_assoc();
}

function delete_marking_type($mysqli,$marking_type_id){
    $sql = "DELETE FROM `marking_type` WHERE marking_type_id = $marking_type_id";
    return $mysqli->query($sql);
}

function update_marking_type($mysqli,$id,$type_name,$min_mark,$max_mark) {
    $sql = "UPDATE `marking_type` SET `type_name`='$type_name',`min_mark`='$min_mark',`max_mark`='$max_mark', WHERE marking_type_id=$id";
    return $mysqli->query($sql);
}