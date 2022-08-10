<?php include 'connection.php';?>
<?php include 'header.php' ?>

<div class="page-wrapper">

<div class="container-fluid">

<div class="card">
<div class="card-body">


    <h2 style="text-align:center;Font-weight:700;">Products</h2>
<?php
include "connection.php";
$stmt=$con->prepare("SELECT * FROM products");
$stmt->execute();
$result=$stmt->get_result();
?>
    <table class="table table-striped table-inverse table-responsive" id="table-data">
              <thead class="thead-inverse">
                  <tr>
                   
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Discount Price</th>
                      <th>Stock</th> 
                      <th>Published Date</th> 
                      
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   
                //    $query = mysqli_query($con,"select * from list_of_alloteess");
                   while($row=$result->fetch_assoc())
                   {
                       ?>
                     <tr>
                    
                 
                     <td><?php echo $row["Name"] ?></td>
                     <td><?php echo $row["Description"] ?></td>
                     <td><?php echo $row["Price"] ?></td>
                     <td><?php echo $row["Discount_Price"] ?></td>
                     <td><?php echo $row["Stock"] ?></td>
                     <td><?php echo $row["Launch_Date"] ?></td>
                     
                    
                     <td>
                         <a href="indexproduct.php?DeleteId=<?php echo $row["Id"]?>">
                             <h5>Delete</h5>
                         </a>
                     </td>
                     <td>
                     <a href="insertproduct.php?EditId=<?php echo $row["Id"]?>">
                         <h5>Edit</h5>
                     </a>
                     </td>
                 </tr>
                 <?php
                   }
                 ?>
                  
                  </tbody>
          </table>
          <div id="result">

          </div>
   
    

        </div>
                </div>

                </div>
                </div>

                <?php include 'footer.php' ?>