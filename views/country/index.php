<?php
use App\Controller\CountryController;
require_once realpath("../../vendor/autoload.php");
session_start();
$obj = new CountryController();

// Delete data
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $obj->dataDelete($_GET['deleteId']);
}

?>
<html>
    <head>
        <?php
        include('../header.php')
        ?>
    </head>
    <body>
    <div class="container py-5">

        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <?php echo $_SESSION['success']; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['danger'])): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <?php echo $_SESSION['danger']; ?>
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION['success']); ?>
                <?php unset($_SESSION['danger']); ?>
                <h4 class="float-left">Country List</h4>
                <a href="create.php" class="btn btn-info float-right mb-1">Create New</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Name</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data=$obj->dataGet();
                            $i=1;
                            if ($data->num_rows > 0) {
                                while ($row = $data->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$row['name']?></td>
                                <td><?=$row['status'] == 1 ? 'Active' : 'Inactive'?></td>
                                <td>
                                    <a href="edit.php?editId=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a>
                                    <a href="index.php?deleteId=<?php echo $row['id'] ?>" style="color:red"
                                       onclick="return confirm('Are you sure want to delete this record'); " class="btn btn-danger text-white">Delete</a>
                                </td>
                             </tr>
                        <?php
                                }
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include('../footer.php')
    ?>

    </body>
</html>