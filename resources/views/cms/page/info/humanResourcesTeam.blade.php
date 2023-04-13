@extends('cms.layout.main')
@section('title')
    Giới thiệu - Tập đoàn HLY
@endsection
@section('content')
    <section class="introWrap" style="padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb" style="margin: 20px 0;">
                <a href="/"><i class="fas fa-home"></i></a>
                <i class="fas fa-chevron-right"></i>
                <p><a href="/gioi-thieu">Giới thiệu công ty</a></p>
                <i class="fas fa-chevron-right"></i>
                <p>Đội ngũ nhân sự</p>
            </div>
            <div class="content stagger-up" style="padding-top: 0px;">
                <div class="content stagger-up" style="padding-top: 0px;">
                    <div class="banner">
                        <img src="../assets/fe/images/introduce.jpg" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                        <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">ĐỘI NGŨ NHÂN SỰ</span>
                    </div>
                </div>
                <h2 class="title">{{__("ĐỘI NGŨ NHÂN SỰ")}}</h2>
                <p style="text-align: justify; font-size: 18px;"><em>
                        {{__("Tại HLY cũng như trong hệ sinh thái HLY, mỗi vị trí làm việc sẽ có những tiêu chuẩn riêng, song mọi thành viên đều đáp ứng yêu cầu: có trình độ chuyên môn, tâm huyết với nghề, có tinh thần trách nhiệm và kỉ luật cao. Mỗi thành viên vừa là cán bộ công nhân viên vừa là cổ đông của công ty")}}
                    </em></p>
                <p style="text-align: justify; font-size: 18px;"><em>{{__("Cán bộ quản lý các cấp tại hệ sinh thái HLY là những con người có khả năng truyền cảm hứng và hoài bão xây dựng nên thành công các giá trị cốt lõi của HLY: 'Khỏe - Tâm - Trí – Nghệ', thể hiện tâm huyết, trí tuệ, bản lĩnh, dám nghĩ, dám làm, dám chịu trách nhiệm và có năng lực tổ chức và quản trị tốt")}}</em></p>
                <p style="text-align: justify; font-size: 18px;"><em>{{__("Dưới sự dẫn dắt của các nhà sáng lập, thành viên hệ sinh thái HLY luôn thể hiện được nét văn hóa, bản sắc riêng. Văn hóa ấy mang đậm tính ân tình, nhân ái, tình cộng đồng và tinh thần kỷ luật; Văn hóa này được xây dựng và vun đắp từ trí tuệ Việt và sức sáng tạo không ngừng của tập thể cán bộ nhân viên hệ sinh thái HLY.")}}</em>
                <p style="text-align: justify; font-size: 18px;"><em>{{__("Trải qua chặng đường chông gai buổi đầu khởi nghiệp, tập thể cán bộ cùng trưởng thành và hoàn thiện, những con người HLY đã và đang làm nên những giá trị cao đẹp, đóng góp vào hạnh phúc của cộng đồng và thành công của hệ sinh thái HLY hôm nay.")}}</em></p>
            </div>
        </div>
    </section>

@endsection
