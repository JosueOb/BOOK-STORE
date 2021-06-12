<?php include('../template/header.php') ?>
<?php
    //Receive data from book form
    $id = (isset($_POST['id'])) ? $_POST['id'] : "";
    $name = (isset($_POST['name'])) ? $_POST['name'] : "";
    $image = (isset($_FILES['image']['name'])) ? $_FILES['image']['name'] : "";
    $action = (isset($_POST['action'])) ? $_POST['action'] : "";

    switch($action){
        case 'add':
            echo 'add selected';
            break;
        case 'update':
            echo 'update selected';
            break;
        case 'cancel':
            echo 'cancel selected';
            break;
    }
?>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Book data
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="ID"
                                   aria-describedby="help-id">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                   aria-describedby="help-name">
                            <small id="help-name" class="text-muted">Typing book name</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="Image"
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
                <tr>
                    <td>2</td>
                    <td>Learn PHP</td>
                    <td>image.jpg</td>
                    <td>Select | Delete</td>
                </tr>
                </tbody>
            </table>
        </div>

<?php include('../template/footer.php') ?>