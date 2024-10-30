<?php require_once("./layout/header.php"); ?>
<?php require_once('./storage/student_crud.php'); ?>

<?php 

    $student_name = $student_address = $student_email = $student_age = $student_name_err = $student_address_err = $student_email_err = $student_age_err = $invalid = '';

    if(isset($_GET['student_id'])){
        $student_id = $_GET['student_id'];
        $student = get_student_id($mysqli,$student_id);
        $student_name = $student['student_name'];
        $student_address = $student['student_address'];
        $student_age = $student['student_age'];
        $student_email = $student['student_email'];
    }

    if(isset($_POST['submit'])){

        $student_name = $_POST['student_name'];
        $student_address = $_POST['student_address'];
        $student_age = $_POST['student_age'];
        $student_email = $_POST['student_email'];

        if($student_name === ''){
            $student_name_err = "Student name can not be blank!";
        }
        if($student_address === ''){
            $student_address_err = "Address cannot be blank!";
        }
        if($student_age === ''){
            $student_age_err = "Age cannot be blank!";
        }
        if($student_email === ''){
            $student_email_err = "Email cannot be blank!";
        }
        if($student_name_err === '' && $student_address_err === '' && $student_email_err==='' && $student_age_err === ''){
            if(isset($_GET['student_id'])){
                if(update_student($mysqli,$student_id,$student_name,$student_address,$student_age,$student_email)){
                    header("location:student_list.php");
                    
                }else{
                    $invalid = false;
                }

            }else{

                if(add_student($mysqli,$student_name,$student_address,$student_age, $student_email)){
                    header('location:student_list.php');
                   }else{
                    $invalid = "New Student cannot be add";
                   }
            }
           
        }
    }

?>

<?php if(isset($_GET['student_id'])){
    echo "<h2>Update Student</h2>";
} else {
    echo "<h2>Student Registration</h2>";
} ?>

<div class="card">
    <div class="card-body">
        <form action="" method="Post" style="width:40%;">
            <div class="form-group my-3">
                <label for="student_name" class="form-label">Student Name</label>
                <input type="text" name="student_name" id="student_name" class="form-control" value="<?= $student_name ?>">
                <div class="text-danger" style="font-size:12px"><?= $student_name_err ?></div>
            </div>

            <div class="form-group my-3">
                <label for="student_address" class="form-label">Student Address</label>
                <input type="text" name="student_address" id="  " class="form-control" value="<?= $student_address ?>">
                <div class="text-danger" style="font-size:12px"><?= $student_address_err ?></div>
            </div>

            <div class="form-group my-3">
                <label for="student_age" class="form-label">Student Age</label>
                <input type="text" name="student_age" id="  " class="form-control" value="<?= $student_age ?>">
                <div class="text-danger" style="font-size:12px"><?= $student_age_err ?></div>
            </div>

            <div class="form-group my-3">
                <label for="student_email" class="form-label">Student Email</label>
                <input type="text" name="student_email" id="  " class="form-control" value="<?= $student_email ?>">
                <div class="text-danger" style="font-size:12px"><?= $student_email_err ?></div>
            </div>
            <?php if(isset($_GET['student_id'])){            
                echo "<button type='submit' name='submit' class='btn btn-success'>Edit Student</button>";
            } else{
                echo "<button type='submit' name='submit' class='btn btn-primary'>Add Student</button>";
            } ?>
        </form>
    </div>
</div>
<?php require_once("./layout/footer.php"); ?>