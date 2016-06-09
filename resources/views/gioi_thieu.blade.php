@extends('layouts.app')
@section('title','Giới thiệu')
@section('content')
<div class="container">
	<div class="text-center">
		<h2><strong style="color: #FF6B6B">EPU</strong><sub style="color: #556270">DRIVE</sub> là website nộp và quản lý tài liệu.</h2>
		<p>
			<big>Website được xây dựng bởi <strong>Ngô Xuân Bách</strong> &amp; <strong>Trần Anh Đức</strong> trên nền mã nguồn <a href="http://laravel.com/" target="_blank">Laravel 5</a>.</big>
		</p>
	</div>
	<div style="height: 20px">&nbsp;</div>
	<div class="row">
		<div class="col-sm-4">
			<div class="">
				<div class="panel-heading text-center anhpanel">
					<span class="">
						<img src="/images/webicon.png" alt="" width="80px"/>
						</br>
						<div style="margin-top:5px;font-size: 25px">
							<strong style="color: #FF6B6B">EPU</strong>
							<sub style="color: #556270">DRIVE</sub>
						</div>
					</span>
				</div>
				<div class="panel-body">
					EPU Drive là website nộp và quản lý tài liệu. Trang web tạo ra với mục đích giúp giảng viên dễ dàng quản lý
					được việc nộp bài của sinh viên trong quá trình học tập, đảm bảo thông tin của giảng viên đến với sinh viên một cách nhanh chóng chính xác. Hạn chế 
					những khuyết điểm của việc thu bài truyền thống. Ngoài ra, trang web còn là nơi lưu trữ, chia sẻ dữ liệu giữa sinh viên
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="">
				<div class="panel-heading text-center anhpanel">
					<span class=""><!--<i class="glyphicon glyphicon-thumbs-up" style="font-size: 48pt"></i>-->
						<img src="/images/laravel-logo2.png" alt="" />
					</span>
				</div>
				<div class="panel-body">
				Laravel là 1 open source, là một framework dùng để xây dựng web application, được thiết kế dựa trên mô hình MVC (Model, Controller, View), toàn bộ source code được đặt trên github. Theo kết qủa khảo sát của các Developer vào tháng 12 năm 2013, thì Laravel Framework đứng top 1 một trong những framework phổ biến nhất, tiếp sau là Phalcon, Symfony2, CodeIgniter và các framework khác. Tháng 8 năm 2014, Laravel Framework được xem như là một dự án PHP phổ biến nhất trên Github. Xem thêm <a href="https://laravel.com/">tại đây</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="">
				<div class="panel-heading text-center anhpanel">
					<span class="rounded red">
						<img src="/images/Code.png" alt="" width="80px"/>
						</br>
						<strong style="color: #FF6B6B; margin-top:5px;display: block;font-size:22px">
							MÃ NGUỒN MỞ
						</strong>
					</span>
				</div>
				<div class="panel-body">
					Phần mềm nguồn mở (PMNM) là những phần mềm được cung cấp dưới cả dạng mã và nguồn, không chỉ là miễn phí về giá mua mà chủ yếu là miễn phí về bản quyền: người dùng có quyền sửa đổi, cải tiến, phát triển, nâng cấp theo một số nguyên tắc chung qui định trong giấy phép PMNM mà không cần xin phép ai, điều mà họ không được phép làm đối với các phần mềm nguồn đóng.
				</div>
			</div>
		</div>
	</div>

	<div class="" style="margin-top:100px;margin-bottom:100px">
		<div class="panel-body" style="padding: 0px">
			<div class="contact-form">
				<div class="map pull-right">
				<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://my.ctrlq.org/maps/#roadmap|15|21.04718640990959|105.78551829391792" style="margin-bottom: -10px"></iframe>
				</div>
				<div class="form">
					<h2>Liên hệ với chúng tôi</h2>
					<dl>
						<dt><i class="glyphicon glyphicon-education"></i> Địa chỉ</dt>
						<dd>235 Hoàng Quốc Việc, Cầu Giấy, Hà Nội</dd>
						<dt><i class="glyphicon glyphicon-envelope"></i> Email</dt>
						<dd>epudrive@epu.edu.vn</dd>
						<dt><i class="glyphicon glyphicon-earphone"></i> Phone</dt>
						<dd>04 2218 5607</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection