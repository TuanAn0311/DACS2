<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container{
            margin: 10px 0px 10px 0px;
        }
        body{
            background-color: gray;
            align-items: center;
            
        }
    </style>
    <title>Job Net</title>
</head>
<body>
    <?php 
    require_once ("./layout/header.php");
    require_once ("./layout/first.php");

    ?>

    <div id="content">
        <?php
            require_once ("./layout/job.php");
        ?>
    </div>
    <?php
    require_once ("./layout/footer.php");
    
    ?>
</body>
</html>