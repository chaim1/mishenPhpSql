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
            <h1 align="center" class="haeder">Add works</h1>

    <form action="controler.php" method="post">
        <div class="form-group">
            <label for="workerNumber"></label> worker number
            <input style="" class="form-control" type="number" name="workerNumber">
        </div>

        <div class="form-group">
            <label for="workerName"></label> worker name
            <input style="" class="form-control" type="text" name="workerName">
        </div>

        <div class="form-group">
            <label for="StartDate"></label>Start of work date
            <input style="" class="form-control" type="text" name="StartDate" value="dd-mm-yyyy">
        </div>

        <div class="form-group">
            <button class="btn btn-secondary btn-lg btn-block" type="submit" name="AddWorkerFimal">Add worker</button>
        </div>                 
    </form>
    
</body>
</html>