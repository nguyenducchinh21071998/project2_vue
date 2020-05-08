<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <p>Thông báo mới</p>
        <p>Bạn hãy vào đường link sau để đọc thông báo</p> <a href="http://127.0.0.1:8000/#/detail-notification/{{$notification_id}}" target="_blank" rel="noopener noreferrer"><button class="btn btn-danger btn-sm" onclick="myFunction({{$notification_id}}, {{$id_user_notification}})">tại đây</button></a>
    </div>
</body>
<script>
    function myFunction(notification_id, id_user_notification){
        
    }
</script>
</html>