@extends('layouts.master')
@section('content')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Dashboard SDM</h3>
          <p class="text-subtitle text-muted">Jumlah dosen saat ini: {{ $total_dosen }} dosen.</p>
        </div>
        {{-- <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
            </ol>
          </nav>
        </div> --}}
      </div>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>Jumlah Dosen per-prodi</h4>
            </div>
            <div class="card-body">
              <canvas id="bar"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4>JFA Dosen</h4>
            </div>
            <div class="card-body">
              <canvas id="pie"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script>
    const barlabels = [
      'S1 Informatika',
      'S1 Teknologi Informasi',
      'S1 Rekayasa Perangkat Lunak',
      'S1 Sains Data', // data sains
      'S1 PJJ Informatika', // informatika pjj
      'S2 Informatika',
      'S2 F. Digital & Keamanan Cyber', // ilmu forensik
      'S3 Informatika',
    ];

    let barBgColor = [
      '#4305e0',
      '#0055ff',
      '#0079ff',
      '#0096ff',
      '#00aefa',
      '#00c4e8',
      '#00d7db',
      '#8ae8d7',
    ];

    let barcount = [
      {{ $barcount[0] }},
      {{ $barcount[1] }},
      {{ $barcount[2] }},
      {{ $barcount[3] }},
      {{ $barcount[4] }},
      {{ $barcount[5] }},
      {{ $barcount[6] }},
      {{ $barcount[7] }},
    ];

    const bardata = {
      labels: barlabels,
      datasets: [{
        label: 'Jumlah Dosen per-prodi',
        backgroundColor: barBgColor,
        borderColor: 'rgb(255, 99, 132)',
        data: barcount,
      }]
    };

    const barconfig = {
      type: 'bar',
      data: bardata,
      options: {}
    };

    const bar = new Chart(
      document.getElementById('bar'),
      barconfig
    );

    const pielabels = [
      'Guru Besar',
      'Lektor Kepala',
      'Lektor',
      'NJFA',
      'AA',
    ];

    let pieBgColor = [
      '#e63946',
      '#ffb703',
      '#a8dadc',
      '#457b9d',
      '#1d3557',
    ];

    let piecount = [
      {{ $piecount[0] }},
      {{ $piecount[1] }},
      {{ $piecount[2] }},
      {{ $piecount[3] }},
      {{ $piecount[4] }},
    ];

    const piedata = {
      labels: pielabels,
      datasets: [{
        label: 'JFA Dosen',
        data: piecount,
        backgroundColor: pieBgColor,
        hoverOffset: 4
      }]
    };

    const pieconfig = {
      type: 'pie',
      data: piedata,
      options: {}
    };

    const pie = new Chart(
      document.getElementById('pie'),
      pieconfig
    );
  </script>
@endsection
