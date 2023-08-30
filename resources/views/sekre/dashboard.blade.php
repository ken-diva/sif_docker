@extends('layouts.master')
@section('content')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js"></script>
  <div class="page-heading">
    <div class="d-flex justify-content-between">
      <h3>Dashboard Sekretariat</h3>
      <span class="text-subtitle text-muted"><i>Last Sync: {{ $last_sync }}</i></span>
    </div>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-12 col-lg-12">
        <div class="row">
          <div class="col-6 col-lg-3 col-md-6">

            <a href="/sekre/notula">
              <div class="card">
                <div class="card-body px-3 py-4-5">
                  <div class="row">
                    <div class="col-md-2">
                      <h2>
                        <i class="bi bi-journals"></i>
                      </h2>
                    </div>
                    <div class="col-md-8">
                      <h6 class="text-muted font-semibold">Jumlah Notula</h6>
                      <h6 class="font-extrabold mb-0">{{ $total_notula }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>

          </div>
          <div class="col-6 col-lg-3 col-md-6">

            <a href="/sekre/st">
              <div class="card">
                <div class="card-body px-3 py-4-5">
                  <div class="row">
                    <div class="col-md-2">
                      <h2>
                        <i class="bi bi-archive"></i>
                      </h2>
                    </div>
                    <div class="col-md-8">
                      <h6 class="text-muted font-semibold">Jumlah Surat Tugas</h6>
                      <h6 class="font-extrabold mb-0">{{ $total_st }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>

          </div>
          <div class="col-6 col-lg-3 col-md-6">

            <a href="/sekre/sk">
              <div class="card">
                <div class="card-body px-3 py-4-5">
                  <div class="row">
                    <div class="col-md-2">
                      <h2>
                        <i class="bi bi-briefcase"></i>
                      </h2>
                    </div>
                    <div class="col-md-8">
                      <h6 class="text-muted font-semibold">Jumlah SK</h6>
                      <h6 class="font-extrabold mb-0">{{ $total_sk }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>

          </div>
          <div class="col-6 col-lg-3 col-md-6">

            <a href="/sekre/ba">
              <div class="card">
                <div class="card-body px-3 py-4-5">
                  <div class="row">
                    <div class="col-md-2">
                      <h2>
                        <i class="bi bi-book"></i>
                      </h2>
                    </div>
                    <div class="col-md-8">
                      <h6 class="text-muted font-semibold">Jumlah Buku Ajar</h6>
                      <h6 class="font-extrabold mb-0">{{ $total_ba }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>

          </div>
        </div>
        <div class="row">

          {{-- filter --}}
          <div class="col-6">
            <div class="card">
              <div class="card-body py-4">
                <div class="row">
                  <h6 class="text-muted font-semibold">Filter Periode</h6>
                  <form action="/sekre/dashboard/filtered" method="POST">
                    @csrf
                    <div class="d-flex">
                      <div class="me-4">
                        <label>Dari</label>
                        <input type="date" class="form-control" name="periode_mulai" value="{{ $tgl_mulai }}"
                          required>
                      </div>
                      <div>
                        <label>sampai</label>
                        <input type="date" class="form-control" name="periode_selesai" value="{{ $tgl_selesai }}"
                          required>
                      </div>
                    </div>
                    <br>
                    <button class="btn btn-warning">Refresh data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Jumlah Surat Tugas Dosen FIF</h4>
              </div>
              <div class="card-body">
                <canvas id="bar-st"></canvas>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Jumlah SK Dosen FIF</h4>
              </div>
              <div class="card-body">
                <canvas id="bar-sk"></canvas>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>

  <script>
    const barlabels = @json($kode_dosen);
    const barcount_st = @json($st_dosen);
    const barcount_sk = @json($sk_dosen);

    const bardata_st = {
      labels: barlabels,
      datasets: [{
        label: 'Jumlah Surat Tugas',
        backgroundColor: '#0077b6',
        data: barcount_st,
      }]
    };

    const bardata_sk = {
      labels: barlabels,
      datasets: [{
          label: 'Jumlah SK',
          backgroundColor: '#00b4d8',
          data: barcount_sk,
        },
        // {
        //   label: 'Jumlah SK',
        //   backgroundColor: '#00b4d8',
        //   data: barcount_sk,
        // }
      ]
    };

    const barconfig_st = {
      type: 'bar',
      data: bardata_st,
      options: {
        interaction: {
          mode: 'index'
        },
        // indexAxis: 'y',
        // responsive: false,
        // scales: {
        //   x: {
        //     stacked: true,
        //   },
        //   y: {
        //     stacked: true,
        //   }
        // }
      }
    };

    const barconfig_sk = {
      type: 'bar',
      data: bardata_sk,
      options: {
        interaction: {
          mode: 'index'
        },
        // indexAxis: 'y',
        // responsive: false,
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true,
          }
        }
      }
    };

    const bar_st = new Chart(
      document.getElementById('bar-st'),
      barconfig_st
    );

    const bar_sk = new Chart(
      document.getElementById('bar-sk'),
      barconfig_sk
    );
  </script>
@endsection
