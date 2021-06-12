<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}else{
    if($_SESSION['user'] == 'ok'){
        $user_name = $_SESSION['user_name'];
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">

</head>
<body>
<?php $url="http://".$_SERVER['HTTP_HOST'] ;?>
<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Admin</a>
        <a class="nav-item nav-link" href="<?php echo $url."/admin/dashboard.php";?>">Home</a>
        <a class="nav-item nav-link" href="<?php echo $url."/admin/section/books.php";?>">Books</a>
        <a class="nav-item nav-link" href="<?php echo $url."/admin/section/logout.php";?>">Log out</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>">Web site</a>
    </div>
</nav>
<div class="container">
    <br/>
    <div class="row">
