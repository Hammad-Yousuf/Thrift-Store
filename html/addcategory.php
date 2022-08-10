<?php 
include "connection.php";

// ---------------Insert-------------------
if(isset($_POST["Submit"]))
{
    $Name = $_POST["Name"];
   
 


    $IsInsert=mysqli_query($con,"insert into category (Name) values('$Name')");

}
//-------------------------update--------------------------


if(isset($_POST["Update"]))
{
  $Id = $_POST["Id"];
  $Name = $_POST["Name"];
   



        $IsUpdate = mysqli_query($con,"update category set Name='$Name' where Id='$Id'");
   
    
 

}


//-----------------------Edit------------------------------
if(isset($_GET["EditId"]))
{
    $Id = $_GET["EditId"];
    $res= mysqli_query($con,"select * from category where Id=$Id");
    $row = mysqli_fetch_array($res);
}


?>


<?php include 'header.php' ?>




<div class="page-wrapper">

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" action="addcategory.php" method="Post">
                <div class="form-group">
                    <label class="col-md-12 mb-0"> Name</label>
                    
                    <input type="hidden" placeholder=""
                           name="Id"  value="<?php echo @$row["Id"]?>"class="form-control ps-0 form-control-line">
                 
                        <input type="text" placeholder=""
                           name="Name" value="<?php echo @$row["Name"]?>" class="form-control ps-0 form-control-line" required>
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