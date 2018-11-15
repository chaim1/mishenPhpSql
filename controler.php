<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
include_once 'business-logic-workers.php';
$bl = new BusinessLogicWorker;
$arrayOfWorker = $bl->get();
// if(empty($arreyOfErrors)){
$arreyOfErrors = [];
$hasErrors = false;
// }

// if(empty($arreyOfErrors)){
$arreyOfSuccess = [];
$successful =false;
// }

// if(empty($arreyOfErrors)){
$arreyOfErrorsIndex = [];
$hasErrorsIndex = false;
// }
// if(empty($arreyOfErrors)){
$arreyOfSuccessIndex = [];
$successfulIndex =false;
// }

// if(!isset($_POST['searchWorker'])){
    $valid = false;
// }





// id
// name
// beginningWork

if(isset($_POST['AddWorker'])){
    $_SESSION['status']='add';
    header("location: index.php");
}

if(isset($_POST['getALL'])){
    $_SESSION['status']='getAll';
    header("location: index.php");
}


if(isset($_POST['AddWorkerFimal'])){
    if(!empty($_POST['workerNumber'])&&!empty($_POST['workerName'])&&!empty($_POST['StartDate'])){
        $id=$_POST['workerNumber'];
     foreach ($arrayOfWorker as $item) {
        if($item->getId()==$id){
            $hasErrors = true;
        array_push($arreyOfErrors, "An employee already exists");
        include_once 'index.php';
        return;
        }}
    $worker = new WorkersModel([
        'id'=> $_POST['workerNumber'],
        'name'=> $_POST['workerName'],
        'beginningWork'=> $_POST['StartDate']
    ]);
        
    $bl->set($worker);
    $_SESSION['status']='getAll';
    $successful = true;
        array_push($arreyOfSuccess, "successful");
    include_once 'index.php';

    // header("location: index.php");
}else{
        $hasErrors = true;
        array_push($arreyOfErrors, "All must be full");
        // header("location: index.php");

        include_once 'index.php';
    }

}

if(isset($_POST['Delete'])){
    $id=$_POST['idOfWorker'];
    $bl->delete($id);
    $_SESSION['status']='getAll';
    header("location: index.php");
}
if(isset($_POST['update'])){
    $id=$_POST['idOfWorker'];
    $_SESSION['status']='Search';
    $_SESSION['id']=$id;
    $_SESSION['status2']='Update';
    header("location: index.php");

}
if(isset($_POST['UpdateWorker'])){
    
    array_push($arreyOfSuccess, "Update Success");
        $successful =true;
        $worker = new WorkersModel([
            'id'=> $_POST['idOfWorker'],
            'name'=> $_POST['workerName'],
            'beginningWork'=> $_POST['StartDate']
        ]);
        $bl->uupdate($worker);
        $_SESSION['status']='getAll';
        $successful = true;
        array_push($arreyOfSuccess, "successful");
    include_once 'index.php';
}


if(isset($_POST['searchWorker'])){
    $arrayOfWorker = $bl->get();
    $id=$_POST['contentSearch'];
     foreach ($arrayOfWorker as $item) {
        if($item->getId()==$id){
           $valid = true;
        }
    } 
    if($valid){
        $_SESSION['status']='Search';
        $_SESSION['id']=$id;
        $_SESSION['status2']='0';
        header("location: index.php");
     }elseif(!$valid){
        $hasErrorsIndex = true;
        array_push($arreyOfErrorsIndex, "Employee does not exist ");
        include_once 'index.php';
        // return;
    }
}
