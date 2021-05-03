<?php 
    include('./db_connection.php');
    include('./header.php');
?>

<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Ampoule <b>Details</b></h2>
                    </div>
                     
                </div>
            </div>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<?php
$vid=$_GET['viewid'];
$ret=mysqli_query($db_connection,"select * from historique where id =$vid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
 <tr>
    <th>Etage</th>
    <td><?php  echo $row['etage'];?></td>
    <th>Price</th>
    <td>$ <?php  echo $row['price'];?></td>
  </tr>
  <tr>
    <th>Position</th>
    <td><?php  echo $row['position'];?></td>
    <th>Created At</th>
    <td><?php  echo $row['createdAt'];?></td>
  </tr>
<?php 
$cnt=$cnt+1;
}?>
                 
</tbody>
</table>
       
        </div>
    </div>
</div>     
</body>

<?php
require('footer.php')
?>