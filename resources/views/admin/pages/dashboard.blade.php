@extends('admin.layout.layout')
@section('content')
<span>Dashboard</span>
<div class="row justify-content-center">
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
    <div class="col-lg-3 me-2 mt-2 report-card p-3">
        <ion-icon name="people-outline" class="ms-2" style="font-size: 80px;"></ion-icon>
        <div class="ms-5 w-100 p-2 text-center">
            <span>Customers</span>
            <h3>1,000,000</h3>
        </div>
    </div>
</div>
<div class="row mt-5 justify-content-center">
    <div class="col-lg-6 p-4 m-3" style="border-radius: 14px;background-color: #2a2e3f;">
        <canvas id="myChart-earning"></canvas>
    </div>
    <div class="col-lg-3 m-3 p-5" style="background-color: #2a2e3f;border-radius: 6px;">
        <img src="{{ asset('assets/images/logo-icons/nang-cap-bac.svg') }}" alt="" width="120px" class="mx-auto d-block">
        <h5 class="text-center mt-3">Nâng cấp bậc!</h5>
        <p class="text-center">Bạn sẽ nhận được nhiều ưu hơn hơn như: giảm giá dịch vụ, tạo website riêng, hỗ trợ ...</p>
        <button class="btn text-light mx-auto d-block ps-5 pe-5 mt-4" style="border-color: #1a9c86;background-color: #016a59;">Nâng ngay nào!</button>
    </div>
</div>
<div class="row p-3">
    <span>Notification</span>
    <div class="col-lg-9 p-3 mt-3" style="background-color: #2a2e3f;border-radius: 6px;">
        <div class="row">
            <div class="col-lg-12" style="display: flex;">
                <img src="{{asset('assets/images/logo-icons/security.svg')}}" alt="" width="50px">
                <h5 class="ms-3">THÔNG BÁO <br>
                    <span style="font-size: 14px;color: rgb(237, 219, 219);">2022-08-03 18:53:36</span>
                </h5>
            </div>
        </div>
        <div class="row p-3">
            Đã có Mbank tự động, và nạp thẻ tự động, các thành viên có thể nạp mà không cần thông qua admin, sau khi nạp 5 phút tiền sẽ được cộng vào tài khoảng. - đối với mbbank yêu cầu nạp đúng nội dung, nếu sai liên hệ mình để mình cộng tiền.
        </div>
    </div>
    <div class="col-lg-9 p-3 mt-3" style="background-color: #2a2e3f;border-radius: 6px;">
        <div class="row">
            <div class="col-lg-12" style="display: flex;">
                <img src="{{asset('assets/images/logo-icons/security.svg')}}" alt="" width="50px">
                <h5 class="ms-3">THÔNG BÁO <br>
                    <span style="font-size: 14px;color: rgb(237, 219, 219);">2022-08-03 18:53:36</span>
                </h5>
            </div>
        </div>
        <div class="row p-3">
            Đã có Mbank tự động, và nạp thẻ tự động, các thành viên có thể nạp mà không cần thông qua admin, sau khi nạp 5 phút tiền sẽ được cộng vào tài khoảng. - đối với mbbank yêu cầu nạp đúng nội dung, nếu sai liên hệ mình để mình cộng tiền.
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
    const chartearning = document.getElementById('myChart-earning').getContext('2d');
    const myChart_earning = new Chart(chartearning, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh thu 2021',
                data: [12, 19, 6, 10, 16, 9, 16, 10, 4, 5, 16, 18],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            color:"white",

        }
    });
    
</script>
@endsection