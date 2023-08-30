@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 order-md-1 order-last">
          <h3>Data Surat Keputusan FIF</h3>
          <div class="d-flex justify-content-between">
            <p class="text-subtitle text-muted">Total Notula: {{ $total_sk }}</p>
            <p class="text-subtitle text-muted"><i>Last Sync: {{ $last_sync }}</i></p>
          </div>
        </div>
      </div>
    </div>
    <section class="section">
      {{-- filter --}}
      <div class="col-6">
        <div class="card">
          <div class="card-body py-4">
            <div class="row">
              <h6 class="text-muted font-semibold">Filter Periode</h6>
              <form action="/sekre/sk/filtered" method="POST">
                @csrf
                <div class="d-flex">
                  <div class="me-4">
                    <label>Dari</label>
                    <input type="date" class="form-control" name="periode_mulai" value="{{ $tgl_mulai }}" required>
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
      <div class="card">
        <div class="card-header">
          {{-- Filter here! --}}
        </div>
        <div class="card-body">
          <table class="table table-hover" id="table1">
            <thead>
              <tr>
                <th>No.</th>
                <th>No. SK</th>
                <th>Judul SK</th>
                <th style="text-align: center">Periode Mulai</th>
                <th style="text-align: center">Evidence</th>
                <th style="text-align: center">#</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($surat_keputusan as $sk)
                <tr>
                  <td width="5%">{{ $loop->iteration }}</td>
                  <td>{{ $sk['no_surat'] }}</td>
                  <td width='50%'>{{ ucwords(strtolower($sk['judul_sk'])) }}</td>
                  <td style="text-align: center">{{ $sk['periode_mulai'] }}</td>
                  <td width='8%' style="text-align: center">
                    @if (filter_var($sk['evidence'], FILTER_VALIDATE_URL))
                      <a href="{{ $sk['evidence'] }}" target="_blank">
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
                    <a href="/sekre/sk/detail/{{ $sk['judul_sk'] }}" class="text-decoration-none">
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
