@extends('cms.layout.main')
@section('title')
    Nhà đầu tư - Tập đoàn Abc
@endsection

@section('content')
    <div class="inventorsWrap" style="padding: 0px;">
        <div class="container" style="margin-top: 30px;">
            <div class="breadcrumb" style="margin: 20px 0;">
                        <a href="/"><i class="fas fa-home"></i></a>
                        <i class="fas fa-chevron-right"></i>
                        <p>Nhà đầu tư</p>
                    </div>
                    <div class="content stagger-up" style="padding-top: 0px;">
                        <div class="content stagger-up" style="padding-top: 0px;">
                        <div class="banner">
                            <img src="../assets/fe/images/investor.jpg" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                            <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">NHÀ ĐẦU TƯ</span>
                        </div>
                    </div>
            <ul class="listCateInvestor" >
                <div class="item cate-1">
                    <h2>ĐẠI HỘI CỔ ĐÔNG</h2>
                    <div class="content">
                        <div class="img" style="background: url('./assets/fe/images/introduce.jpg') center">
                            <img src="./assets/fe/images/thumb-cate.gif">
                        </div>
                        <div class="copy">
                            <!-- <p>- Sản xuất thuốc</p> -->
                            <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                        </div>
                    </div>
                    <a class="link" href="/linh-vuc-hoat-dong"></a>
                </div>
                <div class="item cate-3">
                    <h2>CÔNG BỐ THÔNG TIN</h2>
                    <div class="content">
                        <div class="img" style="background: url('./assets/fe/images/hl2.jpg') center">
                            <img src="./assets/fe/images/thumb-cate.gif">
                        </div>
                        <div class="copy">
                            <!-- <p>- Du lịch nghỉ dưỡng</p>
                            <p>- Dưỡng sinh</p> -->
                            <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                        </div>
                    </div>
                    <a class="link" href="/linh-vuc-hoat-dong"></a>
                </div>
                <div class="item cate-3">
                        <h2>QUẢN TRỊ CÔNG TY</h2>
                        <div class="content">
                            <div class="img" style="background: url('./assets/fe/images/hg1.jpg') center">
                                <img src="./assets/fe/images/thumb-cate.gif">
                            </div>
                            <div class="copy text-white">
                                <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                            </div>
                        </div>
                        <a class="link" href="/linh-vuc-hoat-dong"></a>
                    </div>
            </ul>
        </div>
        <section class="shareholdersHomeWrap">
        <div class="container">
            <a href="/quan-he-co-dong">
                <h2 class="title">NHÀ ĐẦU TƯ</h2>
            </a>
            <div class="row">
                <div class="relationshipShareholder">
                    <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor" style="width: 33%;">
                        <a href="/nha-dau-tu/thong-tin-nha-dau-tu-a">
                            <h3>Công ty HLY smart</h3>
                            <img src="./assets/fe/images/hg1.jpg">
                            Tiền thân của HLY là Tập đoàn HLY, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, HLY trở về Việt Nam,
                            tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là HLY và HLY.
                        </a>
                    </div>
                    <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor" style="width: 33%;">
                        <a href="/nha-dau-tu/thong-tin-nha-dau-tu-a">
                            <h3>Công ty HLY smart</h3>
                            <img src="./assets/fe/images/hg1.jpg">
                            Tiền thân của HLY là Tập đoàn HLY, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, HLY trở về Việt Nam,
                            tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là HLY và HLY.
                        </a>
                    </div>
                    <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor" style="width: 33%;">
                        <a href="/nha-dau-tu/thong-tin-nha-dau-tu-a">
                            <h3>Công ty HLY smart</h3>
                            <img src="./assets/fe/images/hg1.jpg">
                            Tiền thân của HLY là Tập đoàn HLY, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, HLY trở về Việt Nam,
                            tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là HLY và HLY.
                        </a>
                    </div>
                    <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor" style="width: 33%;">
                        <a href="/nha-dau-tu/thong-tin-nha-dau-tu-a">
                            <h3>Công ty HLY smart</h3>
                            <img src="./assets/fe/images/hg1.jpg">
                            Tiền thân của HLY là Tập đoàn HLY, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, HLY trở về Việt Nam,
                            tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là HLY và HLY.
                        </a>
                    </div>
                    <div section=".shareholdersHomeWrap" data="-200" class="left paralax-hor" style="width: 33%;">
                        <a href="/nha-dau-tu/thong-tin-nha-dau-tu-a">
                            <h3>Công ty HLY smart</h3>
                            <img src="./assets/fe/images/hg1.jpg">
                            Tiền thân của HLY là Tập đoàn HLY, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, HLY trở về Việt Nam,
                            tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là HLY và HLY.
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('cms.components.investorNews', ['posts' => $posts])

    </div>
    @include('cms.components.partners')
@endsection
