<?php
use App\Controller\CountryController;
require_once realpath("../../../vendor/autoload.php");


$obj = new CountryController();
if (isset($_POST['submit'])) {
    $obj->dataSet($_POST);
    header('location:index.php');
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"  crossorigin="anonymous">
</head>
<body>
<div class="container py-5">
    <div class="row">

        <div class="col-md-12">
            <h4 class="float-left">Create Country</h4>
            <a href="index.php" class="btn btn-info float-right mb-1">Cancle</a>
        </div>
        <div class="col-md-12">
                <form method="POST" action="create.php" >
                    <div class="form-group">
                        <label for="Name">Name </label>
                        <input type="text" name="name" class="form-control" id="Name" >
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>

</body>
</html>