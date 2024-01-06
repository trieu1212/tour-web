<?php
    include('connect.php');
    if(isset($_POST["MaDDL"])) {
        $MaDDL = $_POST['MaDDL'];
        $sql = "DELETE FROM diemdl WHERE MaDDL='$MaDDL'";
        $result = $con->query($sql);
    }
?>