<?php include('../template/header.php') ?>
<?php
    //Receive data from book form
    $id = (isset($_POST['id'])) ? $_POST['id'] : "";
    $name = (isset($_POST['name'])) ? $_POST['name'] : "";
    $image = (isset($_FILES['image']['name'])) ? $_FILES['image']['name'] : "";
    $action = (isset($_POST['action'])) ? $_POST['action'] : "";

    include("../../../config/bd.php");//Data base configuration

    switch($action){
        case 'add':
            $query = $connection->prepare(/** @lang text */ "INSERT INTO `books` (`name`, `image`) VALUES (:name, :image);");
            $query->bindParam(':name',$name);
            $query->bindParam(':image',$image);
            $query->execute();
            break;
        case 'update':
            //UPDATE `bookstore`.`books` SET `name` = 'PHP book old' WHERE (`id` = '1');
            $query = $connection->prepare(/** @lang text */ "UPDATE `books` SET `name`=:name WHERE (`id`=:id )");
            $query->bindParam(':name', $name);
            $query->bindParam(':id', $id);
            $query->execute();

            if($image != ""){
                $query = $connection->prepare(/** @lang text */ "UPDATE `books` SET `image`=:image WHERE (`id`=:id )");
                $query->bindParam(':image', $image);
                $query->bindParam(':id', $id);
                $query->execute();
            }
            break;
        case 'select':
            $query = $connection->prepare(/** @lang text */ "SELECT * FROM books where id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            $book = $query->fetch(PDO::FETCH_LAZY);
            $name = $book['name'];
            $image = $book['image'];
            break;
        case 'delete':
            $query = $connection->prepare(/** @lang text */ "DELETE FROM books where id=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            break;
        case 'cancel':
            echo 'cancel selected';
            break;
    }

    $query = $connection->prepare(/** @lang text */ "SELECT * FROM books");
    $query->execute();
    $books = $query->fetchAll(PDO::FETCH_ASSOC);

?>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Book data
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" name="id" id="id" class="form-control" value="<?php echo $id;?>" placeholder="ID"
                                   aria-describedby="help-id">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $name;?>" placeholder="Name"
                                   aria-describedby="help-name">
                            <small id="help-name" class="text-muted">Typing book name</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Image: <?php echo $image;?></label>
                            <input type="file" name="image" id="image" class="form-control"  placeholder="Image"
                                   aria-describedby="help-image">
                            <small id="help-image" class="text-muted">Select book image</small>
                        </div>
                        <div class="btn-group" role="group" aria-label="">
                            <button type="submit" name="action" value="add" class="btn btn-success">Add</button>
                            <button type="submit" name="action" value="update" class="btn btn-warning">Update</button>
                            <button type="submit" name="action" value="cancel" class="btn btn-info">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="row">ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach( $books as $book){
                    echo "<tr>
                        <td>{$book['id']}</td>
                        <td>{$book['name']}</td>
                        <td>{$book['image']}</td>
                        <td>
                            <form method='POST'>
                                <input type='text' name='id' value='{$book['id']}' hidden>
                                <input type='submit' name='action' value='select' class='btn btn-primary btn-sm'>
                                <input type='submit' name='action' value='delete' class='btn btn-danger btn-sm'>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

<?php include('../template/footer.php') ?>