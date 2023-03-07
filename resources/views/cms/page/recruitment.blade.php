@extends('cms.layout.main')
@section('title')
    Tuyển dụng
@endsection
@section('content')
@php
    $contentCkeditor = '
<p><strong>1. M&ocirc; tả c&ocirc;ng việc</strong></p>
<br/>
<ul>
	<li>Bảo đảm c&aacute;c t&iacute;nh năng, hoạt động trong game kh&ocirc;ng xảy ra bất kỳ lỗi n&agrave;o khi tham gia.</li>
	<li>Hỗ trợ vận h&agrave;nh sản phẩm, đ&oacute;ng g&oacute;p c&aacute;c &yacute; tưởng, đưa ra nhận x&eacute;t, đ&aacute;nh gi&aacute; về c&aacute;c t&iacute;nh năng, hoạt động của sản phẩm. Test game:</li>
	<li>Kiểm tra khả năng thực hiện của tất cả c&aacute;c t&iacute;nh năng, hoạt động trong game.</li>
	<li>L&agrave;m c&aacute;c b&aacute;o c&aacute;o lỗi, b&aacute;o c&aacute;o test về sản phẩm.</li>
	<li>Viết hướng dẫn t&iacute;nh năng khi cần thiết. Hỗ trợ vận h&agrave;nh:</li>
	<li>Đ&oacute;ng g&oacute;p c&aacute;c &yacute; tưởng cho to&agrave;n bộ c&aacute;c t&iacute;nh năng, hoạt động diễn ra trong game.</li>
	<li>Hỗ trợ xử l&yacute; lỗi, giải đ&aacute;p thắc mắc của kh&aacute;ch h&agrave;ng.</li>
	<li>Thu nhập &yacute; kiến kh&aacute;ch h&agrave;ng tr&ecirc;n c&aacute;c diễn đ&agrave;n của sản phẩm, đưa ra nhận x&eacute;t đ&aacute;nh gi&aacute;.</li>
	<li>Đ&oacute;ng g&oacute;p &yacute; tưởng về c&aacute;ch tổ chức c&aacute;c sự kiện, event trong game.</li>
</ul>
<br/>
<p><strong>2. Y&ecirc;u cầu</strong></p>
<br/>
<ul>
	<li>Tốt nghiệp Đại học chuy&ecirc;n ng&agrave;nh c&oacute; li&ecirc;n quan.</li>
	<li>Đam m&ecirc; v&agrave; th&iacute;ch trải nghiệm game.</li>
	<li>Ưu ti&ecirc;n ứng vi&ecirc;n chơi nhiều game trực tuyến.</li>
	<li>Năng động, h&ograve;a đồng, t&iacute;ch cực, hoạt b&aacute;t, tự tin, c&oacute; kinh nghiệm giải quyết vấn đề.</li>
	<li>Kỹ năng l&agrave;m việc nh&oacute;m, kỹ năng giao tiếp đ&agrave;m ph&aacute;n, thương lượng.</li>
</ul>
<br/>
<p><strong>3. Quyền lợi được hưởng</strong></p>
<br/>
<ul>
	<li>Lương thỏa thuận theo năng lực</li>
	<li>C&oacute; cơ hội trở th&agrave;nh nh&acirc;n vi&ecirc;n ch&iacute;nh thức nh&aacute;nh vận h&agrave;nh sản phẩm cho game.</li>
	<li>Tổng thu nhập hấp dẫn l&ecirc;n đến 15 th&aacute;ng lương/năm (thưởng nh&acirc;n vi&ecirc;n xuất sắc, thưởng Qu&yacute;, thưởng Dự &Aacute;n, thưởng n&oacute;ng, thưởng Lễ, Tết, thưởng Performance...).</li>
	<li>Review lương 2 lần/năm, chế độ n&acirc;ng lương linh hoạt theo vị tr&iacute; v&agrave; hiệu suất c&ocirc;ng việc.</li>
	<li>Hưởng đầy đủ c&aacute;c chế độ theo luật (BHXH, BHYT, c&aacute;c ng&agrave;y nghỉ lễ, nghỉ ph&eacute;p, thai sản&hellip;). C&aacute;c ch&iacute;nh s&aacute;ch hiếu, hỷ, nghỉ ph&eacute;p 12 ng&agrave;y/năm, 2 năm l&agrave;m việc cộng th&ecirc;m 1 ng&agrave;y ph&eacute;p</li>
	<li>Kh&aacute;m sức khỏe thường ni&ecirc;n tại bệnh viện h&agrave;ng đầu của Việt Nam, chế độ chăm s&oacute;c sức khỏe to&agrave;n phần của Bảo Việt HealthCare</li>
	<li>Lộ tr&igrave;nh thăng tiến r&otilde; r&agrave;ng, c&oacute; cơ hội tiếp cận c&aacute;c c&ocirc;ng nghệ, kiến thức mới v&agrave; l&agrave;m việc c&ugrave;ng c&aacute;c chuy&ecirc;n gia nhiều kinh nghiệm trong mảng AI</li>
	<li>Được Mentor đ&agrave;o tạo b&agrave;i bản, chuy&ecirc;n nghiệp về chuy&ecirc;n m&ocirc;n, nghiệp vụ, c&aacute;c kỹ năng mềm trước khi v&agrave;o c&ocirc;ng việc cụ thể</li>
	<li>M&ocirc;i trường trẻ trung năng động, đồng nghiệp th&acirc;n thiện; Du lịch v&agrave; teambuilding h&agrave;ng năm</li>
	<li>C&aacute;c sự kiện nội bộ đa dạng: Tiệc sinh nhật CBNV h&agrave;ng th&aacute;ng: Happy Friday Hoạt động mừng ng&agrave;y th&agrave;nh lập c&ocirc;ng ty v&agrave; c&aacute;c ng&agrave;y lễ, tết: ng&agrave;y Quốc Tế Phụ Nữ 8/3, ng&agrave;y Phụ Nữ Việt Nam 20/10, ng&agrave;y Lễ Gi&aacute;ng Sinh, Tết Dương Lịch, Tết Trung Thu, Tết Thiếu Nhi 1/6&hellip; Giải b&oacute;ng đ&aacute;, giải đấu game v&agrave; hoạt động t&igrave;nh nguyện thường ni&ecirc;n</li>
	<li>Được cung cấp phương tiện l&agrave;m việc hiện đại m&aacute;y t&iacute;nh cấu h&igrave;nh cao, Macbook&hellip;</li>
	<li>C&oacute; chỗ gửi xe miễn ph&iacute;, c&oacute; pantry tủ lạnh, l&ograve; vi s&oacute;ng, m&aacute;y pha cafe, cafe miễn ph&iacute;,....</li>
	<li>Thời gian l&agrave;m việc từ 8h30 &ndash; 17h30 (nghỉ trưa 1 tiếng) từ T2 đến T6, nghỉ thứ 7, chủ nhật</li>
</ul>
';
@endphp
    <section class="introWrap" style="padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb">
                <a href="/"><i class="fas fa-home"></i></a>
                <i class="fas fa-chevron-right"></i>
                <p>Tuyển dụng</p>
            </div>
            <div class="content stagger-up">
                <div class="banner">
                    <img src="./assets/fe/images/hg1.jpg" style="height: 500px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>
    <section class="container-recuitment" >
        <div style="" class="wrapp-info">
            <div style="" class="context">
                <h2 style="">Thông tin tuyển dụng</h2>
                <p>Chúng tôi tin rằng trung thực là khởi đầu cần thiết cho mọi mối quan hệ tốt đẹp.</p>
            </div>
            <div style="" class="filter">
                <select name="location" style="width: 30%;">
                    <option value="1">Tất cả lĩnh vực</option>
                    <option value="2">Lập trình viên</option>
                    <option value="3">Kỹ sư nông nghiệp</option>
                    <option value="4">Hành chính nhân sự</option>
                </select>
                <button style="">
                    Tìm kiếm
                </button>
            </div>
        </div>
        <div class="wrapp-content" style="">
            <div class="list-content-sub">
        @for ($i = 0; $i < 10; $i += 1)
        <div class="content-sub">
            <div style="width: 30%; position: relative; ">
                <img src="./assets/fe/images/hg1.jpg" alt="" style="width: 100%; aspect-ratio: 8/6; object-fit: cover; "/>
            </div>
            <div style="width: 70%">
                <h3 style="margin-bottom: 10px; font-weight: 600">Game Tester</h3>
                <p class="line-clamp-2">
                    1. Mô tả công việc Bảo đảm các tính năng, hoạt động trong game không xảy ra bất kỳ lỗi nào khi tham gia.
                </p>
            </div>
        </div>
        @endfor
        </div>
        <div class="contentDetail" style="width: 60%; padding-left: 30px;">
            <h3 style="margin-bottom: 20px;">Game Tester</h3>
            <p style="margin-bottom: 20px;">Đăng ngày: 16:52 03/03/2023</p>
            {!! $contentCkeditor !!}
        </div>
        </div>
    </section>

@endsection
