<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết điểm du lịch</title>
</head>
<body>
    <?php
    include('connect.php');
    if(isset($_GET['MaDDL'])){
        $MaDDL=$_GET['MaDDL'];
        $sql="select MaDDL,TenDDL,diemdl.MaTTP,tinhtp.TenTTP,Dactrung from diemdl
              join tinhtp on tinhtp.MaTTP=diemdl.MaTTP
              where MaDDL='$MaDDL'";
        $result = $con->query($sql);
        while($row=$result->fetch_assoc()){
            echo "<form method='post'>
                <label>Mã điểm du lịch</label>
                <input type='text' name='MaDDL' value='".$row['MaDDL']."' readonly><br>
                <label>Tên điểm du lịch</label>
                <input type='text' name='TenDDL' value='".$row['TenDDL']."'><br>
                <label>Tên thành phố</label>";
            $sql1="select MaTTP,TenTTP from tinhtp";
            $result1=$con->query($sql1);
            echo "<select name ='MaTTP' required>";
            while($row1=$result1->fetch_assoc()){
                $selected = ($row['MaTTP']==$row1['MaTTP'])? 'selected':'';
                echo "<option value='".$row1['MaTTP']."' $selected>".$row1['TenTTP']."</option>";
            }
            echo "</select><br>
                <label>Đặc trưng</label>
                <input type='text' name='Dactrung' value='".$row['Dactrung']."'><br>
                <input type='submit' name='submit' value='Update'>
                </form><br>";
        }
    }
    if(isset($_POST['submit']) && $_POST['submit']=="Update"){
        $MaDDL1= $_POST['MaDDL'];
        $TenDDL1=$_POST['TenDDL'];
        $MaTTP1=$_POST['MaTTP'];
        $Dactrung1=$_POST['Dactrung'];
        $sql1 = "update diemdl set TenDDL='$TenDDL1', MaTTP='$MaTTP1', Dactrung='$Dactrung1' where MaDDL='$MaDDL1'";
        $update = $con->query($sql1);
    }
    ?>
</body>
</html>