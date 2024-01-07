<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
</head>
<body>
    <label>Số điểm du lịch đi qua</label>
    <input type="number" id='point' name='count' min='1' value='0'><br>
    <div class='kq'></div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#point").keydown(function(e){
                if(e.key == 'Tab'){
                    var count = $("#point").val()
                    $.ajax({
                        type: 'post',
                        url: 'xuly.php',
                        data:{
                            count:count
                        },
                        success:function(data,status){
                            $(".kq").html(data);
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>