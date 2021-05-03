<?php
use App\Controller\CityController;
use App\Controller\CountryController;
require_once realpath("../../vendor/autoload.php");


$obj = new CityController();
$countryObject=new CountryController();
$countries=$countryObject->dataGet();
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
            <h4 class="float-left">Edit City</h4>
            <a href="index.php" class="btn btn-info float-right mb-1">Cancle</a>
        </div>
        <div class="col-md-12">
            <form method="POST" action="edit.php" >
                <input type="hidden" name="id" class="form-control" id="id" value="<?=$editData['id']?>" >
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" name="title" class="form-control" id="title" value="<?=$editData['title']?>" >
                </div>
                <div class="form-group">

                    <label for="country_id">Select Country</label>
                    <select class="form-control" id="country_id" name="country_id">
                        <?php
                        if($countries->num_rows > 0){
                            while ($row = $countries->fetch_assoc()){
                                ?>
                                <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                <?php

                            }
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
    <script >
        document.getElementById('country_id').value='<?=$editData['country_id']?>';
    </script>
    <?php
    include('../footer.php')
    ?>

</body>
</html>