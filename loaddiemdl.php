<?php
    $i = 1;
    include('connect.php');
    $sql = "select * from diemdl";
    $result = $con->query($sql);
    while($row=$result->fetch_assoc()){
        echo "<tr id='row_".$row['MaDDL']."'>
            <td>".$i++."</td>
            <td class='MaDDL'>".$row['MaDDL']."</td>
            <td>".$row['TenDDL']."</td>";
        $sql1 = "select TenTTP from tinhtp where MaTTP = '".$row['MaTTP']."'";
        $tp =$con->query($sql1);
        echo "<td>".$tp->fetch_assoc()['TenTTP']."</td>
            <td>".$row['Dactrung']."</td>
            <td col=2>
                <button class='view' data-maddl='".$row['MaDDL']."'>View(Câu d)</button>
                <button class='del' data-maddl='".$row['MaDDL']."'>Delete</button>
              </td>
            </tr>";
    }
    echo "</table>";
    ?>