<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php include 'app/views/userViews/headerTop.php'; ?>
    <link rel="stylesheet" type='text/css' href="<?php echo constant('PUBLIC');?>css/users/home.css">
    <?php include 'app/views/userViews/headerBottom.php'; ?>
    <?php include "app/views/userViews/navbars.php"; ?>
    
    <title>Mis Proyectos - Gestión de Proyectos</title>
</head>
<body>

<div class="main">
    <div class="projectsDiv">
        <h2>Mis Proyectos</h2>
        <div class="content">
            <?php 
            $selProj= $this->selectProjects;
            if (empty($selProj)) {
                echo '<h3 class="no-projects">No tiene proyectos!</h3>';
            } else {
                foreach ($selProj as $row) { 
            ?>
            <div class="project-td">
                <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>">
                    <div class="left">
                        <p class="pTitle"><?php echo $row['TITLE'];?></p>
                        <p class="pDate"><i class="fas fa-calendar-alt"></i><?php echo $row['DELIVDATE'];?></p>
                    </div>
                    <div class="right">
                        <p class="pBtn"><i class="fas fa-pen"></i></p>
                        <p class="pBtn"><i class="fas fa-clipboard-list"></i></p>
                        <p class="pBtn"><i class="fas fa-trash-alt"></i></p>
                    </div>
                </a>
            </div>
            <div class="lineDiv"></div>
            <?php } } ?>
        </div>
    </div>
</div>

<script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</body>
</html>
