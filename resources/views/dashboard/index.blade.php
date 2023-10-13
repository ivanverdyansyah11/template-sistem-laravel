@extends('template.main')

@section('content')
    <div class="content">
        <div class="row mb-4">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Destinasi Terdaftar</p>
                        <h4 class="caption-value">100</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/stok.svg') }}" class="img-fluid dashboard-img"
                            alt="Stok Kendaraan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Owner Terdaftar</p>
                        <h4 class="caption-value">100</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/pelanggan.svg') }}" class="img-fluid dashboard-img"
                            alt="Pelanggan Icon" width="18">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-default d-flex align-items-start justify-content-between">
                    <div class="card-caption">
                        <p class="caption-name">Wisatawan Terdaftar</p>
                        <h4 class="caption-value">100</h4>
                    </div>
                    <div class="wrapper-icon d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/dashboard/pelanggan.svg') }}" class="img-fluid dashboard-img"
                            alt="Sopir Icon" width="18">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg">
                <div class="card-default" style="padding: 26px !important;">
                    <div class="header-card d-flex justify-content-between align-items-center">
                        <h6 class="subtitle">Grafik Penyewaan Kendaraan</h6>
                        <div class="wrapper position-relative d-none d-md-inline-block">
                            <button type="button"
                                class="button-other button-reverse button-small d-flex align-items-center">
                                <p>Tahun ini</p>
                                <img src="{{ asset('assets/img/button/arrow-down.svg') }}" alt="Arrow Icon"
                                    class="img-fluid button-icon">
                            </button>
                            <div class="modal-other d-flex flex-column">
                                <button type="button" class="button-tahun modal-link active">Tahun
                                    Ini</button>
                                <button type="button" class="button-bulan modal-link">Bulan
                                    Ini</button>
                            </div>
                        </div>
                    </div>
                    <canvas id="chartVehicleYear" class="chart w-100" style="max-height: 400px;"></canvas>
                    <canvas id="chartVehicleMonth" class="chart w-100 disabled" style="max-height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <p id="labelJan" class="d-none">50</p>
    <p id="labelFeb" class="d-none">50</p>
    <p id="labelMar" class="d-none">50</p>
    <p id="labelApr" class="d-none">50</p>
    <p id="labelMei" class="d-none">50</p>
    <p id="labelJun" class="d-none">50</p>
    <p id="labelJul" class="d-none">50</p>
    <p id="labelAgu" class="d-none">50</p>
    <p id="labelSep" class="d-none">50</p>
    <p id="labelOkt" class="d-none">50</p>
    <p id="labelNov" class="d-none">50</p>
    <p id="labelDes" class="d-none">50</p>

    <p id="labelMingguPertama" class="d-none">50</p>
    <p id="labelMingguKedua" class="d-none">50</p>
    <p id="labelMingguKetiga" class="d-none">50</p>
    <p id="labelMingguKeempat" class="d-none">50</p>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labelJan = document.getElementById('labelJan').textContent;
        const labelFeb = document.getElementById('labelFeb').textContent;
        const labelMar = document.getElementById('labelMar').textContent;
        const labelApr = document.getElementById('labelApr').textContent;
        const labelMei = document.getElementById('labelMei').textContent;
        const labelJun = document.getElementById('labelJun').textContent;
        const labelJul = document.getElementById('labelJul').textContent;
        const labelAgu = document.getElementById('labelAgu').textContent;
        const labelSep = document.getElementById('labelSep').textContent;
        const labelOkt = document.getElementById('labelOkt').textContent;
        const labelNov = document.getElementById('labelNov').textContent;
        const labelDes = document.getElementById('labelDes').textContent;

        const labelMingguPertama = document.getElementById('labelMingguPertama').textContent;
        const labelMingguKedua = document.getElementById('labelMingguKedua').textContent;
        const labelMingguKetiga = document.getElementById('labelMingguKetiga').textContent;
        const labelMingguKeempat = document.getElementById('labelMingguKeempat').textContent;

        const buttonOther = document.querySelector('.button-other');
        const modalOther = document.querySelector('.modal-other');
        const buttonYear = document.querySelector('.button-tahun');
        const buttonMonth = document.querySelector('.button-bulan');
        const ctxYear = document.getElementById('chartVehicleYear');
        const ctxMonth = document.getElementById('chartVehicleMonth');

        buttonOther.addEventListener('click', function() {
            modalOther.classList.toggle('active');
        });

        buttonMonth.addEventListener('click', function() {
            buttonOther.children[0].innerHTML = this.innerHTML;
            buttonYear.classList.remove('active');
            ctxYear.classList.add('disabled');
            buttonMonth.classList.add('active');
            ctxMonth.classList.remove('disabled');
        });

        buttonYear.addEventListener('click', function() {
            buttonOther.children[0].innerHTML = this.innerHTML;
            buttonMonth.classList.remove('active');
            ctxMonth.classList.add('disabled');
            buttonYear.classList.add('active');
            ctxYear.classList.remove('disabled');
        });

        Chart.defaults.color = '#939393';
        Chart.defaults.font.size = 12;
        Chart.defaults.font.weight = 600;

        new Chart(ctxYear, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    data: [labelJan, labelFeb, labelMar, labelApr, labelMei, labelJun, labelJul, labelAgu,
                        labelSep, labelOkt, labelNov, labelDes
                    ],
                    borderWidth: 0,
                    backgroundColor: [
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                    ],
                    showLine: false,
                    borderRadius: 9999,
                    borderSkipped: false,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 200,
                        ticks: {
                            stepSize: 50,
                        },
                    },
                },
                animation: false,
                showLine: false,
            }
        });

        new Chart(ctxMonth, {
            type: 'bar',
            data: {
                labels: ['Minggu Pertama', 'Minggu Kedua', 'Minggu Ketiga', 'Minggu Keempat'],
                datasets: [{
                    data: [labelMingguPertama, labelMingguKedua, labelMingguKetiga, labelMingguKeempat],
                    borderWidth: 0,
                    backgroundColor: [
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                        'rgba(226, 92, 39)',
                        'rgba(255, 122, 69)',
                    ],
                    showLine: false,
                    borderRadius: 9999,
                    borderSkipped: false,
                    barPercentage: 0.4,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 200,
                        ticks: {
                            stepSize: 50,
                        },
                    },
                },
                animation: false,
                showLine: false,
            }
        });
    </script>
@endsection
