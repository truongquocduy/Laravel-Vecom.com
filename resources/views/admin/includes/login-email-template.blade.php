
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vecom.shop sàn thương mại điện tử lớn nhất Châu Á</title>
    <style>
        .app {
            width: 90%;
            max-width: 300px;
            background-color: #2c3e50;
            border-radius: 4px;
            padding: 10px;
            color:white;
            text-align: center;
        }
        .btn{
            background-color: #1abc9c;
            color: white !important;
            padding: 10px;
            outline: none;
            border: none;
            text-decoration: none;
            margin-bottom: 20px !important;
        }
    </style>
</head>
<body>
    <div class="app">
        <h2>VECOMER</h2>
        <img src="http://vecom.shop/images/logo3.png" alt="" width="80%">
        <h3>Chào mừng bạn đã đăng ký thành viên Vecom.com của chúng tôi</h3>
        <p>
            Hãy để hạm đội là vùng đất của sự sống với tiếng cười, mũi tên, vecom và chiếc bình.
        </p>
        <a href="{{ route('front.user.verified', ['token_api' => $body]) }}" class="btn">
            Nhấn vào đây để kích hoạt tài khoản !!!
        </a>
    </div>
</body>
</html>