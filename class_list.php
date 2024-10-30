<?php require_once('./layout/header.php'); ?>
<?php require_once('./storage/class_crud.php'); ?>

<?php
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];
        if(!delete_class($mysqli,$delete_id)){
            echo "Cannot delete class";
        }
    }
?>

<h2>Student List</h2>
<div class="card">
    <div class="card-header d-flex">

        <a href="./add_class.php" class="btn btn-secondary ms-auto"><i class="bi bi-plus-circle me-2"></i>Add New Class</a>
    </div>
    <div class="card-body">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $class_list = get_all_class($mysqli);
                    $i=1;

                    while($class = $class_list->fetch_assoc()){ ?>

                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $class['class_name']?></td>
                        <td><?= substr($class['description'],0,80) ?>
                        <?php if(strlen($class['description'])>80){echo '...';}  ?>
                        </td>
                        <td><button class="btn btn-sm btn-danger me-2 confirmDelete" data-id="<?= $class['class_id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>
                            <a href="./add_class.php?class_id=<?= $class['class_id']; ?>"><i class="bi bi-pencil-square btn btn-sm btn-primary"></i></a> 
                        </td>    
                    </tr>

                <?php 
                    $i++;
                }?>
            </tbody>
        </table>
    </div>

<div class="modal modal-sm fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete this class?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="deleted">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>
    let deletedId = undefined;
    let confirmBtn = document.querySelectorAll('.confirmDelete');
    let deleted = document.querySelector('#deleted');
        confirmBtn.forEach(element => {
            element.addEventListener('click', () => {
                deletedId = element.getAttribute('data-id');
            })
        });
        deleted.addEventListener('click', () => {
            //console.log(deletedId);  
            location.replace("./class_list.php?delete_id="+deletedId);
        });

        
    
</script>
<?php require_once('./layout/footer.php'); ?>