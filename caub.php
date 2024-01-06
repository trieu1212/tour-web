<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điểm Du Lịch</title>
</head>
<body>
    <form method='post'>
        <label for="">Tên thành phố</label>
        <select name='MaTTP'>
            <option value="">-Chọn tỉnh-</option>
            <?php
            include('connect.php');
            $sql= "select * from tinhtp";
            $result = $con->query($sql);
            while($row=$result->fetch_assoc()){
                echo "<option value=".$row['MaTTP'].">".$row['TenTTP']."</option>";
            }
            ?> 
        </select><br>
        <label for="">Mã điểm du lịch</label>
        <input type="text" name='MaDDL'><br>
        <label for="">Tên điểm du lịch</label>
        <input type="text" name='TenDDL'><br>
        <label for="">Đặc trưng</label>
        <input type="text" name='Dactrung'><br>
        <input type="submit" name='submit' value='Thêm'>
    </form>
    <br>
    <?php
    include('connect.php');
    if(isset($_POST['submit']) && $_POST['submit']=="Thêm"){
        $MaDDL=$_POST['MaDDL'];
        $TenDDL=$_POST['TenDDL'];
        $MaTTP=$_POST['MaTTP'];
        $Dactrung=$_POST['Dactrung'];
        $sql="insert into diemdl (MaDDL,TenDDL,MaTTP,Dactrung) value('$MaDDL','$TenDDL','$MaTTP','$Dactrung')";
        $result= $con->query($sql);
        if($result===true){
            echo "Thêm điểm du lịch thành công";
        }
        else {
            echo "Thêm thất bại".$con->error;
        }
    }
    ?>
    <a href="index.html">Quay về trang chủ</a>
</body>
</html>