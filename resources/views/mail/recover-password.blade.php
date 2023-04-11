<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Car</title>
</head>
<body>
<div class="container">
    <div>
        Xin chào {{ $name }}
    </div>
    <div>
        Gần đây, bạn đã yêu cầu đặt lại mật khẩu cho tài khoản {{ config('app.name') }} của mình. Nhấp vào đường link bên dưới để tiếp tục.
    </div>
    <div><a href="{{ $action_link }}">Đặt lại mật khẩu</a></div>
    <div>
        Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này hoặc trả lời cho chúng tôi biết. Liên kết đặt lại mật khẩu này chỉ có hiệu lực trong 30 phút tiếp theo.
    </div>
</div>
</body>
</html>