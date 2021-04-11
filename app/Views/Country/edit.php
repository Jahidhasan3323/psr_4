<?php
use App\Controller\CountryController;
require_once realpath("../../../vendor/autoload.php");


$obj = new CountryController();
//update Data
if (isset($_POST['submit'])) {
    $obj->dataUpdate($_POST);
    header('location:index.php');
}
// Edit data
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $data = $obj->showData($_GET['editId']);
    if($data->num_rows >0){
     $editData=$data->fetch_assoc();
    }else{
        header('location:index.php');
    }
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
            <h4 class="float-left">Edit Country</h4>
            <a href="index.php" class="btn btn-info float-right mb-1">Cancle</a>
        </div>
        <div class="col-md-12">
                <form method="POST" action="edit.php" >
                    <input type="hidden" name="id" class="form-control" id="id" value="<?=$editData['id']?>" >
                    <div class="form-group">
                        <label for="Name">Name </label>
                        <input type="text" name="name" class="form-control" id="Name" value="<?=$editData['name']?>" >
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

        </div>
    </div>
</div>
<?php
include('../footer.php')
?>
</body>
</html>