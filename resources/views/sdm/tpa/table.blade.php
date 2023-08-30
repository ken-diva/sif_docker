@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Data TPA FIF</h3>
          <p class="text-subtitle text-muted">Jumlah TPA saat ini: {{ $total_tpa }} TPA.</p>
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
      <div class="card">
        <div class="card-header">
          {{-- Filter here! --}}
        </div>
        <div class="card-body">
          <table class="table table-hover" id="table1">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Unit</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach (json_decode($data) as $d)
                <tr>
                  <td width="5%">{{ $loop->iteration }}</td>
                  <td>{{ $d->nip }}</td>
                  <td>{{ $d->fronttitle . ' ' . ucwords(strtolower($d->name)) . ' ' . $d->backtitle }}</td>
                  <td>
                    @if ($d->status == 'Aktif')
                      <span class="badge bg-success">{{ $d->status }}</span>
                    @else
                      <span class="badge bg-warning">{{ $d->status }}</span>
                    @endif
                  </td>
                  <td width="40%">{{ ucwords(strtolower($d->unitname)) }}</td>
                  <td>
                    <a href="/sdm/profile-tpa/{{ $d->name }}/{{ $d->unitname }}/{{ $d->employmentstatus }}"
                      class="text-decoration-none">
                      <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                        <i class="bi bi-pencil-square"></i>
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
