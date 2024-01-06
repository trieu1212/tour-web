<?php
    include('connect.php');
    if(isset($_POST['count'])){
        $count = $_POST['count'];
        $i=1;
        $sql = "select tour.TenTour,count(chitiet.MaDDL) as SL
                from tour join chitiet on tour.MaTour=chitiet.MaTour 
                group by tour.TenTour 
                having count(chitiet.MaDDL)>=$count";
        $result = $con->query($sql);
        if($result){
            echo "<p>Số điểm du lịch mà các tour đi qua</p>
                <table border='1'>
                <tr>
                <th>STT</th>
                <th>Tên tour</th>
                <th>Số điểm du lịch</th>
                </tr>";
            while($row=$result->fetch_assoc()){
                echo "<tr>
                    <td>".$i++."</td>
                    <td>".$row['TenTour']."</td>
                    <td>".$row['SL']."</td>
                    </tr>";
            }
            echo "</table>";
        }
    }
?>