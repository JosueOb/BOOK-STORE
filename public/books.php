<?php include("template/header.php");?>
<?php
include('../config/bd.php');
$query = $connection->prepare(/** @lang text */ "SELECT * FROM books");
$query->execute();
$books = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($books as $book){ ?>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="./img/<?php echo $book['image']?>" alt="">
            <div class="card-body">
                <h4 class="card-title"><?php echo $book['name']?></h4>
                <a class="btn btn-primary" href="#" role="button">View</a>
            </div>
        </div>
    </div>
<?php } ?>


<?php include("template/footer.php");?>