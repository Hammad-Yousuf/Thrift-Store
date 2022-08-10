<?php 
include "connection.php";

// ---------------Insert-------------------
if(isset($_POST["Submit"]))
{
    $Brand = $_POST["Brand"];
   
 


    $IsInsert=mysqli_query($con,"insert into brand (Brand) values('$Brand')");

}
//-------------------------update--------------------------


if(isset($_POST["Update"]))
{
  $Id = $_POST["Id"];
  $Brand = $_POST["Brand"];
   



        $IsUpdate = mysqli_query($con,"update brand set Brand='$Brand' where Id='$Id'");
   
    
 

}


//-----------------------Edit------------------------------
if(isset($_GET["EditId"]))
{
    $Id = $_GET["EditId"];
    $res= mysqli_query($con,"select * from brand where Id=$Id");
    $row = mysqli_fetch_array($res);
}


?>


<?php include 'header.php' ?>




<div class="page-wrapper">

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" action="addbrand.php" method="Post">
                <div class="form-group">
                    <label class="col-md-12 mb-0"> Brand</label>
                    
                    <input type="hidden" placeholder=""
                           name="Id"  value="<?php echo @$row["Id"]?>"class="form-control ps-0 form-control-line">
                 
                        <input type="text" placeholder=""
                           name="Brand" value="<?php echo @$row["Brand"]?>" class="form-control ps-0 form-control-line" required>
                           <input type="hidden" placeholder=""
                           name="Status" value="<?php echo @$row["Status"]?>" class="form-control ps-0 form-control-line" required>
                    </div>
               

                
                
                
                <?php 
if(isset($_GET["EditId"]))
{
?>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
  <input type="submit" class="btn btn-warning" name="Update" value="Update">
</div>
</div>
<?php

}
else
{
?>
<div class="form-group row">
<div class="offset-sm-2 col-sm-10">
  <input type="submit" class="btn btn-warning" name="Submit" value="Submit">
</div>
</div>
<?php
}
?>

            </form>
            </div>
        </div>
    </div>
</div>





<?php include 'footer.php'?>