<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Du Lịch</title>
</head>
<body>
    <form method="post">
        <label for="">Mã tour</label> 
        <input type="text" name='MaTour'><br>
        <label for="">Tên tour</label>
        <input type="text" name='TenTour'><br>
        <label for="">Ngày khởi hành</label>
        <input type="date" name='NgayKhoiHanh'><br>
        <label for="">Số ngày</label>
        <input type="number" name='SoNgay' min='1'><br>
        <label for="">Số đêm</label>
        <input type="number" name='SoDem' min='1'><br>
        <label for="">Giá</label>
        <input type="number" name='Gia' min='1'><br>
        <br>
        <input type="submit" name='submit' value='Thêm'>
    </form>
    <br>
    <?php
        include('connect.php');
        if(isset($_POST['submit']) && $_POST['submit']=="Thêm"){
            $MaTour=$_POST['MaTour'];
            $TenTour=$_POST['TenTour'];
            $NgayKhoiHanh=$_POST['NgayKhoiHanh'];
            $SoNgay=$_POST['SoNgay'];
            $SoDem=$_POST['SoDem'];
            $Gia=$_POST['Gia'];
            $sql = "insert into tour (MaTour,TenTour,NgayKhoiHanh,SoNgay,SoDem,Gia) values('$MaTour','$TenTour','$NgayKhoiHanh','$SoNgay','$SoDem','$Gia')";
            $result = $con->query($sql);
            if($result===true){
                echo "Thêm tour thành công";
            }
            else{
                echo "Thêm thất bại".$con->error;
            }
        }
    ?>
    <a href="index.html">Quay về trang chủ</a>
</body>
</html>