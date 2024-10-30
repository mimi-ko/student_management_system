<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/javascript/bootstrap.js"></script>

    <title>Student Management System</title>
</head>
<body>
    <div class="main">
        <?php require_once('./layout/sidebar.php'); ?>
        
        <div class="content">
            <nav class="bg-white d-flex justify-content-between p-3 px-4">
                <form action="">
                    <div class="d-flex search">
                        <i class="bi bi-search"></i>
                        <input type="text" name="" id="" placeholder="Search">
                    </div>
                </form>
                
                <div>
                    <div>
                        <div class="dropdown">
                            <div type="button"data-bs-toggle="dropdown">
                                <img class="profile" src="./image/images.png">
                            </div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Profile</a></li>
                              <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                          </div>
                </div>
            </nav>
            <div class="page p-4">
                
        