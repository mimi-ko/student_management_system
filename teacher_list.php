<?php require_once('./layout/header.php'); ?>
<?php require_once('./storage/teacher_crud.php'); ?>

<?php

    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];
        if(!delete_teacher($mysqli,$delete_id)){
            echo "Cannot delete Teacher";
        }
    }

?>

<h2>Teachers List</h2>
<div class="card">
    <div class="card-header d-flex">

        <a href="./add_teacher.php" class="btn btn-secondary ms-auto"><i class="bi bi-plus-circle me-2"></i>Add New Teacher</a>
    </div>
    <div class="card-body">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Experience</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $teacher_list = get_all_teacher($mysqli);
               // var_dump($teacher_list);
                
                    $i=1;

                    while($teacher = $teacher_list->fetch_assoc()){ ?>

                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $teacher['teacher_name']?></td>
                        <td><?= $teacher['teacher_email']?></td>
                        <td><?= $teacher['experience']?></td>
                        <td><button class="btn btn-danger btn-sm me-2 confirmDelete" data-id="<?= $teacher['teacher_id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>
                            <a href="./add_teacher.php?teacher_id=<?= $teacher['teacher_id']; ?>"><i class="bi bi-pencil-square btn btn-sm btn-primary"></i></a>
                        </td>
                    </tr>

                <?php 
                    $i++;
                }?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal modal-sm fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete this teacher?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="deleted">Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
    $deletedId =undefined;
    let deleteBtn = document.querySelectorAll('.confirmDelete');
    let deleted = document.querySelector('#deleted');
    deleteBtn.forEach(element => {
        element.addEventListener('click', () => {
            deletedId = element.getAttribute('data-id');
        })
    });
    deleted.addEventListener('click',() => {
        location.replace("./teacher_list.php?delete_id="+deletedId);
    })

</script>
<?php require_once('./layout/footer.php'); ?>