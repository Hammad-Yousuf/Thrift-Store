<?php
include 'connection.php';


if(isset($_GET["EditId"]))
{
    $Id= $_GET["EditId"];
    $IsDelete = mysqli_query($con,"update brand  set status=1 where Id='$Id' ");

}
?> 

<?php include 'header.php' ?>
<div class="page-wrapper">

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
        
        <h2 style="text-align:center;Font-weight:700;">Brand</h2>


        <table class="table table-bordered">
  <thead>
    <tr>
   
      <th scope="col">Brand</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
                   
                      $query = mysqli_query($con,"select * from Brand where status='0' ");
                      while($row=$query->fetch_assoc())
                      {
                          ?>
    <tr>
    <th><?php echo $row["Name"] ?></th>
     

      
     
                     <td>
                     <a href="disablebrand.php?EditId=<?php echo $row["Id"]?>">
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