<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EPU Drive</title>
<script type="text/javascript" src="tools/jquery.min.js"></script> 
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600,700|Damion' rel='stylesheet' type='text/css'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='https://bootswatch.com/lumen/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href="tools/style.css" rel="stylesheet" type="text/css" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">

</head>
<body>
<div class="black"></div>
<div id="wrapper">
	<div id="header">
		<h1>EPU Drive</h1>
		<h2><strong class="sep-one"></strong>Nộp bài online<strong class="sep-two"></strong></h2>
	</div>
	<div id="middle">
		<p>Website nộp và quản lý bài tập trực tuyến dùng cho sinh viên <span>đại học Điện Lực</span>.</p>
		<p><b>Tài khoản: svd8cnpm@gmail.com</b> - <b>Mật khẩu: cnttepu</b></p>
		@if (auth()->guest())
		<div class="cta">
			<a href="{{ url('/login') }}" class="btn btn-success">Đăng nhập</a>
			<a href="{{ url('/register') }}" class="btn btn-info">Đăng ký</a>
		</div>
		@else
		<div class="cta">
			<a href="{{ url('/home') }}" class="btn btn-success">Tiếp tục</a>
		</div>
		@endif
	</div>
	<div id="footer">
		<div>
		<ul class="social">
			<li class="facebook"><a href="https://www.facebook.com/groups/D8.CNPM/"></li>
			<li class="twitter"><a href="#"></li>
			<li class="youtube"><a href="#"></li>
		</ul>
		</div>
	</div>
</div>
</body>
</html>
