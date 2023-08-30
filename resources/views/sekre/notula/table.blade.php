@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 order-md-1 order-last">
          <h3>Data Notula FIF</h3>
          <div class="d-flex justify-content-between">
            <p class="text-subtitle text-muted">Total Notula: {{ $total_notula }}</p>
            <p class="text-subtitle text-muted"><i>Last Sync: {{ $last_sync }}</i></p>
          </div>
        </div>
      </div>
    </div>
    <section class="section">
      {{-- filter --}}
      <div class="col-4">
        <div class="card">
          <div class="card-body py-4">
            <div class="row">
              <h6 class="text-muted font-semibold">Filter Periode</h6>
              <form action="/sekre/notula/filtered" method="POST">
                @csrf
                <div class="d-flex">
                  <div class="me-4">
                    <label>Dari</label>
                    <input type="date" class="form-control" name="periode_mulai" value="{{ $tgl_mulai }}" required>
                  </div>
                  {{-- <div>
                    <label>sampai</label>
                    <input type="date" class="form-control" name="periode_selesai" value="{{ $tgl_selesai }}"
                      required>
                  </div> --}}
                </div>
                <br>
                <button class="btn btn-warning">Refresh data</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          {{-- header here! --}}
        </div>
        <div class="card-body">
          <table class="table table-hover" id="table1">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jenis Rapat</th>
                <th>Agenda</th>
                <th style="text-align: center">Evidence</th>
                <th style="text-align: center">#</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($notula as $no)
                <tr>
                  <td width="5%">{{ $loop->iteration }}</td>
                  <td width="15%">{{ $no['tanggal'] }}</td>
                  <td width="15%">{{ $no['jenis_rapat'] }}</td>
                  <td style="white-space:pre-line">{!! $no['agenda'] !!}</td>
                  <td width='8%' style="text-align: center">
                    @if (filter_var($no['evidence'], FILTER_VALIDATE_URL))
                      <a href="{{ $no['evidence'] }}" target="_blank">
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-link-45deg"></i>
                        </button>
                      </a>
                    @else
                      <a href="#">
                        <button class="btn btn-sm btn-secondary" title="Link tidak valid" disabled>X</button>
                      </a>
                    @endif
                  </td>
                  <td width='5%'>
                    <a href="/sekre/notula/detail/{{ $no['agenda'] }}" class="text-decoration-none">
                      <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                        <i class="bi bi-info-circle"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </section>
  </div>
@endsection
