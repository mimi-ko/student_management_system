<?php require_once("./layout/header.php"); ?>
<?php require_once('./storage/teacher_crud.php'); ?>

<?php 

    $teacher_name = $teacher_email = $teacher_experience = $teacher_name_err = $teacher_email_err = $teacher_experience_err = $invalid = '';

    if(isset($_GET['teacher_id'])){
        $teacher_id = $_GET['teacher_id'];
        $teacher = get_teacher_id($mysqli,$teacher_id);
        $teacher_name = $teacher['teacher_name'];
        $teacher_email = $teacher['teacher_email'];
        $teacher_experience = $teacher['experience'];
    }

    if(isset($_POST['submit'])){

        $teacher_name = $_POST['teacher_name'];
        $teacher_email = $_POST['teacher_email'];
        $teacher_experience = $_POST['teacher_experience'];

        if($teacher_name === ''){
            $teacher_name_err = "Teacher name can not be blank!";
        }
        
        if($teacher_email === ''){
            $teacher_email_err = "Email cannot be blank!";
        }
        if($teacher_experience === ''){
            $teacher_experience_err = "Experience cannot be blank!";
        }
        if($teacher_name_err === '' && $teacher_email_err==='' && $teacher_experience_err === ''){
            if(isset($_GET['teacher_id'])){
                if(update_teacher($mysqli,$teacher_id,$teacher_name,$teacher_email,$teacher_experience)){
                    header("location:teacher_list.php");
                    
                }else{
                    $invalid = false;
                }

            }else{

                if(add_teacher($mysqli,$teacher_name,$teacher_email, $teacher_experience)){
                    header('location:teacher_list.php');
                   }else{
                    $invalid = "New Teacher cannot be add";
                   }
            }
           
        }
    }

?>

<?php if(isset($_GET['teacher_id'])){
    echo "<h2>Update Teacher</h2>";
} else {
    echo "<h2>Teacher Registration</h2>";
} ?>

<div class="card">
    <div class="card-body">
        <form action="" method="Post" style="width:40%;">
            <div class="form-group my-3">
                <label for="teacher_name" class="form-label">Teacher Name</label>
                <input type="text" name="teacher_name" id="teacher_name" class="form-control" value="<?= $teacher_name ?>">
                <div class="text-danger" style="font-size:12px"><?= $teacher_name_err ?></div>
            </div>

            <div class="form-group my-3">
                <label for="teacher_email" class="form-label">Teacher Email</label>
                <input type="text" name="teacher_email" id="  " class="form-control" value="<?= $teacher_email ?>">
                <div class="text-danger" style="font-size:12px"><?= $teacher_email_err ?></div>
            </div>

            <div class="form-group my-3">
                <label for="teacher_experience" class="form-label">Teacher Experience</label>
                <input type="text" name="teacher_experience" id="  " class="form-control" value="<?= $teacher_experience ?>">
                <div class="text-danger" style="font-size:12px"><?= $teacher_experience_err ?></div>
            </div>

            <?php if(isset($_GET['teacher_id'])){            
                echo "<button type='submit' name='submit' class='btn btn-success'>Edit Teacher</button>";
            } else{
                echo "<button type='submit' name='submit' class='btn btn-primary'>Add Teacher</button>";
            } ?>
        </form>
    </div>
</div>
<?php require_once("./layout/footer.php"); ?>