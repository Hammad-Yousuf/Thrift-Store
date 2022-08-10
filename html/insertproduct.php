<?php 
include "connection.php";

// ---------------Insert-------------------
if(isset($_POST["Submit"]))
{
    $Name = $_POST["Name"];
    $Brand = $_POST["Brand"];
    $Description = $_POST["Description"];
    $Price = $_POST["Price"];
    $DiscountPrice = $_POST["DiscountPrice"];
    $Category = $_POST["Category"];
    $Stock = $_POST["Stock"];
    $Date = $_POST["Date"];
 


    $IsInsert=mysqli_query($con,"insert into product (Name,Brand,Description,Category,Price,Discount_Price,Stock,Launch_Date) values('$Name','$Brand','$Description','$Category','$Price','$DiscountPrice','$Stock','$Date ')");

}
//-------------------------update--------------------------


if(isset($_POST["Update"]))
{
  $Id = $_POST["Id"];
  $Name = $_POST["Name"];
  $Brand = $_POST["Brand"];
  $Description = $_POST["Description"];
  $Price = $_POST["Price"];
  $DiscountPrice = $_POST["DiscountPrice"];
  $Category = $_POST["Category"];
  $Stock = $_POST["Stock"];
  $Date = $_POST["Date"];
  $Status = $_POST["Status"];


        $IsUpdate = mysqli_query($con,"update product set Name='$Name',
        Brand='$Brand',Description='$Description',Category='$Category', Price='$Price', Discount_Price='$DiscountPrice', Stock='$Stock',Launch_Date='$Date',status='$Status' where Id='$Id'");
   
    
 

}


//-----------------------Edit------------------------------
if(isset($_GET["EditId"]))
{
    $Id = $_GET["EditId"];
    $res= mysqli_query($con,"select * from product where Id=$Id");
    $row = mysqli_fetch_array($res);
}


?>


<?php include 'header.php' ?>

<script>
        function a(event)
        {
    var char = event.which;
    if(char >31 && char!=32 && (char<65 || char>90) && (char<97 || char>122))
        {
            return false;
        }
        }

        function onlyNumber(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        }
        else if (e) {
            var charCode = e.which;
        }
        else { return true; }
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        else
            return true;
    }
    catch (err) {
        alert(err.Description);
    }
}
    </script>


<div class="page-wrapper">

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" action="insertproduct.php" method="Post">
                <div class="form-group">
                    <label class="col-md-12 mb-0">Product Name</label>
                    
                    <input type="hidden" placeholder=""
                           name="Id"  value="<?php echo @$row["Id"]?>"class="form-control ps-0 form-control-line">
                 
                        <input type="text" placeholder=""
                           name="Name" value="<?php echo @$row["Name"]?>" class="form-control ps-0 form-control-line" required>
                    </div>
               

                    <?php 
    $query ="SELECT * FROM brand";
    $result = mysqli_query($con, $query);
    
?>
                <div class="form-group">
                    <label class="col-md-12 mb-0">Brand</label>
                    <div class="col-md-12">
                    <?php
include("connection.php");

?>
<select name="Brand" class="form-control">
   <option>Select Brand</option>
  <?php 
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <option required value="<?php echo $row['Id']; ?>"><?php echo $row['Brand']; ?> </option>
    <?php 
    }
   ?>
</select>
                    </div>
                </div>
                

                <div class="form-group">
                    <label class="col-md-12 mb-0">Description</label>
                    <div class="col-md-12">
                        <input type="text" placeholder=""
                           name="Description" value="<?php echo @$row["Description"]?>" class="form-control ps-0 form-control-line"  required >
                    </div>
                </div>
               
                <?php 
    $query ="SELECT * FROM category";
    $result = mysqli_query($con, $query);
    
?>
                <div class="form-group">
                    <label class="col-md-12 mb-0">Category</label>
                    <div class="col-md-12">
                    <?php
include("connection.php");

?>
<select name="Category" class="form-control">
   <option>Select Category</option>
  <?php 
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <option required value="<?php echo $row['Id']; ?>"><?php echo $row['Name']; ?> </option>
  
    <?php 
    }
   ?>
</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 mb-0">Price</label>
                    <div class="col-md-12">
                        <input type="tel" placeholder=""
                           name="Price" value="<?php echo @$row["Price"]?>" class="form-control ps-0 form-control-line" onkeypress="return onlyNumber(event);" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Discount Price</label>
                    <div class="col-md-12">
                        <input type="tel" placeholder=""
                           name="DiscountPrice" value="<?php echo @$row["Discount_Price"]?>" class="form-control ps-0 form-control-line" onkeypress="return onlyNumber(event);" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-12 mb-0">Stock</label>
                    <div class="col-md-12">
                        <input type="tel" placeholder=""
                           name="Stock" value="<?php echo @$row["Stock"]?>" class="form-control ps-0 form-control-line" onkeypress="return onlyNumber(event);" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-12 mb-0">Launch Date</label>
                    <div class="col-md-12">
                        <input type="date" placeholder=""
                           name="Date" value="<?php echo @$row["Launch_Date"]?>" class="form-control ps-0 form-control-line" onkeypress="return onlyNumber(event);" required>
                           
                           <input type="hidden" placeholder=""
                           name="tel"   name="Status"  value="<?php echo @$row["status"]?>" class="form-control ps-0 form-control-line" onkeypress="return onlyNumber(event);" default="1" >
                    </div>
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