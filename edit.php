<?php
include('./db_connection.php');
require('header.php');
// require('header-1.php');

if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    //Getting Post Values
    $etage = $_POST['etage'];
    $price = $_POST['price'];
    $position = $_POST['position'];

    //Query for data updation
    $query = mysqli_query($db_connection, "update  historique set etage='$etage',price='$price', position='$position' where id='$eid'");

    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
        echo "<script type='text/javascript'> document.location ='home.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>

<body>
    <div class="signup-form">
        <form method="POST">
            <?php
            $eid = $_GET['editid'];
            $ret = mysqli_query($db_connection, "select * from historique where id='$eid'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <h2>Mettre à Jour </h2>
                <p class="hint-text"> Etage <?php echo $row['etage']; ?></p>
                <div class="form-group">
                    <div class="col"><input type="text" class="form-control" name="etage" value="<?php echo $row['etage']; ?>" required="true"></div>
                </div>
                <div class="form-group">
                    <div class="col"><input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>" required="true"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="position" value="<?php echo $row['position']; ?>" required="true">
                </div>
            <?php
            } ?>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
            </div>
        </form>

    </div>
</body>

<?php
require('footer.php')
?>