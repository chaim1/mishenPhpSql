<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    require_once 'controler.php';
    $bl = new BusinessLogicWorker;
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
    <?php if ($hasErrors) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>

                    <?php foreach ($arreyOfErrors as $error) { ?>
                    <li><strong><?php echo $error; ?></strong> </li>
                    <?php } ?>

                </ul>
            </div>
            <?php } ?>
        <!--  for successful -->
            <?php if ($successful) { ?>
            <div class="alert alert-success" role="alert">
                <ul>

                    <?php foreach ($arreyOfSuccess as $successful) { ?>
                    <li><strong></strong> <?php echo $successful; ?></li>
                    <?php } ?>

                </ul>
            </div>
            <?php } ?>
<?php
if($_SESSION['status2']=='Update'){
    
    $arrayOfWorker = $bl->getOne($_SESSION['id']);
?>
            <h1 align="center" class="haeder">worker</h1>

    <form action="controler.php" method="post">

        <div class="form-group">
            <label for="workerName"></label> worker name
            <input style="" class="form-control" type="text" name="workerName" value="<?php echo $arrayOfWorker->getName()?>">
        </div>

        <div class="form-group">
            <label for="StartDate"></label>Start of work date
            <input style="" class="form-control" type="text" name="StartDate" value="<?php echo $arrayOfWorker->getDate()?>">
        </div>

        <div class="form-group">
            <input name="idOfWorker" style="display:none" type="number" value="<?php echo $arrayOfWorker->getId()?>">
            <button class="btn btn-secondary btn-lg btn-block" type="submit" name="UpdateWorker">Save</button>
        </div>                 
    </form>
    
<?php }else if($_SESSION['status']=='Search'){
        $arrayOfWorker = $bl->getOne($_SESSION['id']);

    ?>

    <h1 align="center" class="haeder">All worker</h1>

<table class="table">
    <tr>    
        <th>id</th>
        <th>Name</th>
         <th>Start of work date</th>
           
      </tr>
      <tr> 
         <td><?php echo $arrayOfWorker->getId()?></td>
        <td><?php echo $arrayOfWorker->getName()?></td>
         <td><?php echo $arrayOfWorker->getDate()?></td>
         

         <form action="controler.php" method="post">
         <input name="idOfWorker" style="display:none" type="number" value="<?php echo $arrayOfWorker->getId()?>">
            <td><button name="update"  type="submit" class="btn btn-info btn-sm">Update</button></td>
         </form>
         <form action="controler.php" method="post">
         <input name="idOfWorker" style="display:none" type="number" value="<?php echo $arrayOfWorker->getId()?>">
            <td><button name="Delete"  type="submit" class="btn btn-info btn-sm">Delete</button></td>
         </form>
    </tr>
    </table>
<?php }?>
</body>

</html>