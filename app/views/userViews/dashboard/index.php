<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php include 'app/views/userViews/headerTop.php'; ?>
    <link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/dashboard.css">
    <?php include 'app/views/userViews/headerBottom.php'; ?>
    <?php include "app/views/userViews/navbars.php"; ?>
    <link rel="icon" href="public/images/icon.png" type="image/png">
    <title>Dashboard - Gestión de Proyectos</title>
</head>
<body>

<div class="main">
    <div class="projects-container">
        <div class="projects-section">
            <h3>En progreso</h3>
            <div class="tasks-container">
                <ul>
                    <li class="progress-bar" id="pendingBar"></li>
                    <?php 
                    if (!empty($this->selectPending)) {
                        foreach ($this->selectPending as $row) {
                    ?>
                    <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li><?php echo $row['TITLE'];?></li></a>
                    <?php 
                        }
                    } else {
                        echo '<a href="#"><li><b>Sin resultados!!</b></li></a>';
                    } ?>
                </ul>
            </div>
        </div>
        
        <div class="projects-section">
            <h3>Completados</h3>
            <div class="tasks-container">
                <ul>
                    <li class="progress-bar" id="completedBar"></li>
                    <?php 
                    if (!empty($this->selectCompleted)) {
                        foreach ($this->selectCompleted as $row) {
                    ?>
                    <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li><?php echo $row['TITLE'];?></li></a>
                    <?php 
                        }
                    } else {
                        echo '<a href="#"><li><b>Sin resultados!!</b></li></a>';
                    } ?>
                </ul>
            </div>
        </div>
        
        <div class="projects-section">
            <h3>Incompletos</h3>
            <div class="tasks-container">
                <ul>
                    <li class="progress-bar" id="incompleteBar"></li>
                    <?php 
                    if (!empty($this->selectIncomplete)) {
                        foreach ($this->selectIncomplete as $row) {
                    ?>
                    <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li><?php echo $row['TITLE'];?></li></a>
                    <?php 
                        }
                    } else {
                        echo '<a href="#"><li><b>Sin resultados!!</b></li></a>';
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</body>
</html>
