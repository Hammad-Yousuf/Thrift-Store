 <?php
include 'connection.php';


if(isset($_GET["DeleteId"]))
{
    $Id= $_GET["DeleteId"];
    $IsDelete = mysqli_query($con,"update  product set  status='0' where Id='$Id' ");

}
?> 

<?php include 'header.php' ?>
<div class="page-wrapper">

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
        
        <h2 style="text-align:center;Font-weight:700;">Products</h2>


        <table class="table table-bordered">
  <thead>
    <tr>
   
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Discount_Price</th>
      <th scope="col">Category</th>
      <th scope="col">Stock</th>
      <th scope="col">Published Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
                   
                      $query = mysqli_query($con,"select * from vw_showproducts where Status=1");
                      while($row=$query->fetch_assoc())
                      {
                          ?>
    <tr>
      <th><?php echo $row["ProductName"] ?></th>
      <th><?php echo $row["Description"] ?></th>
      <th><?php echo $row["Price"] ?></th>
      <th><?php echo $row["Discount_Price"] ?></th>
      <th><?php echo $row["CategoryName"] ?></th>
      <th><?php echo $row["Stock"] ?></th>
      <th><?php echo $row["Launch_Date"] ?></th>
      <th><?php echo $row["Status"] ?></th>

      
      <td>
                         <a href="indexpro.php?DeleteId=<?php echo $row["Id"]?>">
                         <image src="images/download.jpg" style="width:40px"></image>
                             
                         </a>
                     </td>
                     <td>
                     <a href="insertproduct.php?EditId=<?php echo $row["Id"]?>">
                     <image src="images/images.png" style="width:40px"></image>
                     </a>
                     </td>
    </tr>
    <?php
                   }
                 ?> 
  </tbody>
 
</table>

            </div>
        </div>
    </div>
</div>





<?php include 'footer.php'?>