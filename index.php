<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();  
    }
    
    if(!isset($_SESSION['status'])){
         $_SESSION['status']=' ';
    }
    
require_once 'controler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Document</title>
</head>
<body class="container">
    <?php if ($hasErrorsIndex) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>

                    <?php foreach ($arreyOfErrorsIndex as $error) { ?>
                    <li><strong><?php echo $error; ?></strong> </li>
                    <?php } ?>

                </ul>
            </div>
            <?php } ?>
        <!--  for successful -->
            <?php if ($successfulIndex) { ?>
            <div class="alert alert-success" role="alert">
                <ul>

                    <?php foreach ($arreyOfSuccessIndex as $successfulIndex) { ?>
                    <li><strong></strong> <?php echo $successfulIndex; ?></li>
                    <?php } ?>

                </ul>
            </div>
            <?php } ?>

            <h1 align="center" class="haeder">Search works</h1>
    <form action="controler.php" method="post">
            <div class="input-group">
                <input name="contentSearch" type="number" class="form-control" placeholder="Search worker">
                <div class="input-group-append">
                 <button name="searchWorker" class="btn btn-primary" type="submit">
                  <i class="fa fa-search">Search</i>
                </button>
               </div>
            </div>
    </form>

    <hr>
    <form action="controler.php" method="post">
    <div class="col-md-12">
        <td><button name="getALL"  type="submit" class="col-md-12 btn btn-secondary btn-lg">Get all</button></td>
        </div>
    </form>
    <hr>
    <form action="controler.php" method="post">
    <div class="col-md-12">
        <td><button name="AddWorker"  type="submit" class="col-md-12 btn btn-secondary btn-lg">Add worker</button></td>
        </div>
    </form>
    <?php
        if($_SESSION['status']=='Search'){
            require_once 'showUpdateDelete.php';

        }elseif($_SESSION['status']=='add'){
            require_once 'addWorker.php';

        }elseif($_SESSION['status']=='getAll'){
            require_once 'showAllWorker.php';

        }
    ?>
    
    
</body>
</html>
