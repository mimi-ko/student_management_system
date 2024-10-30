<?php require_once("./layout/header.php"); ?>
<?php require_once('./storage/class_crud.php'); ?>

<?php 

    $class_name = $class_description = $class_name_err = $description_err = $invalid = '';

    if(isset($_GET['class_id'])){
        $class_id = $_GET['class_id'];
        $class = get_class_id($mysqli,$class_id);
        $class_name = $class['class_name'];
        $class_description = $class['description'];
    }

    if(isset($_POST['submit'])){

        $class_name = $_POST['class_name'];
        $class_description = $_POST['class_description'];

        if($class_name === ''){
            $class_name_err = "Class name can not be blank!";
        }
        if($class_description === ''){
            $description_err = "Description cannot be blank!";
        }
        if($class_name_err === '' && $description_err === ''){
            if(isset($_GET['class_id'])){
                if(update_class($mysqli,$class_id,$class_description,$class_name)){
                    header('location:./class_list.php');
                }else{
                    $invalid = true;
                }
            }else{ 
                
                $invalid = true;
                if(add_class($mysqli,$class_description,$class_name)){
                 header('location:class_list.php');
                }else{
                 $invalid = true;
                }
            }
        }
    }

?>
<?php if(isset($_GET['class_id'])){
    echo "<h2>Update Class</h2>";
    }else {
        echo "<h2>Class Registration</h2>";
    }
 ?>

<div class="card">
    <div class="card-body">
        <form action="" method="Post" style="width:40%;">
            <div class="form-group my-3">
                <label for="class_name" class="form-label">Class Name</label>
                <input type="text" name="class_name" id="class_name" class="form-control" value="<?= $class_name; ?>">
                <div class="text-danger" style="font-size:12px"><?= $class_name_err ?></div>
            </div>
            <div class="form-group my-3">
                <label for="class_description" class="form-label">Class Description</label>
                <textarea class="form-control" name="class_description" id="class_description" rows="5"><?= $class_description; ?></textarea>
            </div>
            <div class="text-danger" style="font-size:12px"><?= $description_err ?></div>
            <?php if(isset($_GET['class_id'])){
                echo "<button type='submit' name='submit' class='btn btn-success'>Edit Class</button>";
            } else{
                echo "<button type='submit' name='submit' class='btn btn-primary'>Edit Class</button>";
            } ?>
        </form>
    </div>
</div>
<?php require_once("./layout/footer.php"); ?>