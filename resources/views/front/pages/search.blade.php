<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="https://pbs.twimg.com/media/ELOV640XkAAQq_Z.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@350&family=Roboto:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/front/main.css') }}">
    <title>Vecom.com - Chào mừng đến với thế giới mua sắm !!!</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12  text-right">
                <button class="btn text-secondary"  onclick="history.back()" style="font-size: 60px;">
                    X
                </button>
            </div>
            <div class="col-lg-12 p-5">
                <form action="{{ route('front.product.index') }}" method="GET">
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control w-100 text-center" name="search" style="margin-top: 10%;height: 100px;font-size: 50px;border: none; border-bottom: 1px solid gray;outline: unset;" placeholder="Nhập từ khóa tìm kiếm . . . " autofocus>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>