<?php
require 'header.php';
//database conection  file
include('./db_connection.php');
//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($db_connection, "delete from historique where ID=$rid");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'index.php'</script>";
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
        $cnt = 1;
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
                        <a href="read.php?viewid=<?php echo htmlentities($row['ID']); ?>" class="view" title="View" data-toggle="tooltip"><i class="far fa-eye"></i></a>
                        <a href="edit.php?editid=<?php echo htmlentities($row['ID']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a href="index.php?delid=<?php echo ($row['ID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            <?php
                $cnt = $cnt + 1;
            }
        } else { ?>
            <tr>
                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
require('footer.php')
?>