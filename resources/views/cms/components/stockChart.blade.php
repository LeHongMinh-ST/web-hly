<div class="stockInformation container">
    <div class="chartStockWrap">
        <div class="titleChartWrap">
            THÔNG TIN CỔ PHIẾU
        </div>
        <div class="titleChart">
            <div class="titleStock1">
                Giá cuối cùng (tính bằng VNĐ)
            </div>
            <div class="titleStock2">
                <img src="./assets/fe/images/icons/green.PNG">
                <div class="bigTitle">
                    81,300.00
                </div>
                <div class="smallTitle">
                    +600.00(+0,74%)
                </div>
            </div>
            <div class="titleStock3">
                Tại ngày 9 tháng 2, 2023
            </div>
        </div>
        <div class="chart">
            <div>
                <div class="filterChart">
                    <select class="selectFilterChart">
                        <option value="">Tất cả thời gian</option>
                        <option value="amex">Năm</option>
                        <option value="discover">Tháng</option>
                        <option value="mastercard">Tuần</option>
                        <option value="visa">Ngày</option>
                    </select>
                </div>
                <div id="stockChartContainer" style="height: 450px; width: 100%;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="newWrap"  >
        <img src="./assets/fe/images/world.PNG" style="width: 100%; filter: brightness(50%); object-fit: cover; position: absolute; height: 100%0"/>
        <div class="contentWrap">
            <div class="titleContentLeft">
                THÔNG CÁO BÁO CHÍ
            </div>
            <div class="descriptionContentLeft">
                FPT Software là đối tác chến lược triển khai nhà máy thông minh cho Jullie Sandue
            </div>
            <ul style="font-size: 20px;">
                <li>
                    Báo cáo
                </li>
                <li>
                    Quản trị công ty
                </li>
                <li>
                    Các tin tức nhà đầu tư
                </li>
                <li>
                    Các nhà đầu tư
                </li>
            </ul>
            <div class="show-more-text">
            <a href="{{ localized_route('cms.investors') }}" style="color: white">
                XEM THÊM
                <img class="ar" src="./assets/fe/images/ar-w.png">
            </a>
            </div>
        </div>
    </div>
</div>
