<?php
require 'header.php';
//database connection  file
include('./db_connection.php');
//Code for deletion
if (isset($_GET['did'])) {
    $rid = intval($_GET['did']);
    $sql = mysqli_query($db_connection, "delete from historique where id=" . $rid);
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'home.php'</script>";
}
?>
<table>
    <caption>L'historique Les Ampoules</caption>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Etage</th>
            <th scope="col">Prix</th>
            <th scope="col">Position</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $ret = mysqli_query($db_connection, "select * from historique");
        //$cnt = 1;
        $row = mysqli_num_rows($ret);
        if ($row > 0) {
            while ($row = mysqli_fetch_array($ret)) {

        ?>
                <!--Fetch the Records -->
                <tr>
                    <!-- <td><?php echo $cnt; ?></td> -->
                    <td><?php echo $row['id']; ?></td>
                    <td>Etage <?php echo $row['etage']; ?></td>
                    <td>$ <?php echo $row['price']; ?></td>
                    <td> <?php echo $row['position']; ?></td>
                    <td> <?php echo $row['createdAt']; ?></td>
                    <td>
                        <a href="read.php?viewid=<?php echo htmlentities($row['id']); ?>" class="view" title="View" data-toggle="tooltip"><button style="background-color: lightblue;border: none;cursor: pointer; padding: 5px 10px;">View</button></a>
                        <a href="edit.php?editid=<?php echo htmlentities($row['id']); ?>" class="edit" title="Edit" data-toggle="tooltip"><button style="background-color: lightgreen;border: none;cursor: pointer;padding: 5px 10px;">Edit</button></a>
                        <a href="home.php?did=<?php echo ($row['id']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><button style="background-color: lightcoral;border: none;cursor: pointer;padding: 5px 10px;">Delete</button></a>
                    </td>
                </tr>
            <?php
                // $cnt = $cnt + 1;
            }
        } else { ?>
            <tr>
                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-group btn-h">
    <button onclick="myFunction()" class="btn btn-success btn-lg btn-block btn-h"><a href="create.php">Ajoute D'Ampoule</a></button>
</div>
<?php
require('footer.php')
?>