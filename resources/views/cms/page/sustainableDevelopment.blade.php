@extends('cms.layout.main')
@section('title')
    Nhà đầu tư - Tập đoàn Abc
@endsection
@section('js')

@endsection
@section('content')
    <div style="max-width: 1700px; width: 100%; margin: 0 auto;">
        <div style="width: 100%; ">
        <div class="breadcrumb" style="margin: 20px 0 20px 0">
            <a href="/"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right"></i>
            <p>Phát triển bền vững</p>
        </div>
            <div class="content stagger-up">
                <div class="banner">
                    <img src="../assets/fe/images/contact.jpg" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                    <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">PHÁT TRIỂN BỀN VỪNG</span>
                </div>
            </div>
        </div>
        </div>
        <div class="container-sustainable-development" style="">
            @for ($i = 0; $i < 3; $i++)
            <div class="wrap-info" style="">
                <div class="poster" style="">
                    <img src="./assets/fe/images/contact.jpg" alt="" style="">
                    <p class="title" >DOANH NGHIỆP</p>
                </div>
                <div class="content" style="">
                    Vingroup là nơi tập trung những con người ưu tú của Dân tộc Việt Nam và các bạn đồng nghiệp Quốc tế -
                    những người có tư tưởng và hành động kỷ luật, có tài năng và bản lĩnh, có lòng yêu nước và tự tôn dân tộc,
                    hướng thiện và có tinh thần làm việc quyết liệt, triệt để vì những mục đích tốt đẹp.
                </div>
            </div>
            @endfor
        </div>
    </div>
@endsection
