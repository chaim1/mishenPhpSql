<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
<h1 align="center" class="haeder">All worker</h1>

<table class="table">
    <tr>    
        <th>id</th>
        <th>Name</th>
         <th>Start of work date</th>
           
      </tr>
      <?php foreach ($arrayOfWorker as $item) {?>
      <tr> 
         <td><?php echo $item->getId()?></td>
        <td><?php echo $item->getName()?></td>
         <td><?php echo $item->getDate()?></td>
         

         <form action="controler.php" method="post">
         <input name="idOfWorker" style="display:none" type="number" value="<?php echo $item->getId()?>">
            <td><button name="update"  type="submit" class="btn btn-info btn-sm">Update</button></td>
         </form>
         <form action="controler.php" method="post">
         <input name="idOfWorker" style="display:none" type="number" value="<?php echo $item->getId()?>">
            <td><button name="Delete"  type="submit" class="btn btn-info btn-sm">Delete</button></td>
         </form>
    </tr>
    <?php } ?>
    </table>
</body>
</html>