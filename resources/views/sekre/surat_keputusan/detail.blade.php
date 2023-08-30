@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Detail Surat Keputusan</h3>
          {{-- <p class="text-subtitle text-muted">Total Surat Keputusan:</p> --}}
        </div>
      </div>
    </div>
    <section class="multiple-choices">
      <div class="row">
        <div class="col-12">
          <div class="card">
            @foreach ($surat_keputusan as $sk)
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>No. Surat</label>
                        <input type="text" class="form-control" value="{{ $sk['no_surat'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-2 mt-4">
                      <div class="form-group">
                        @if (filter_var($sk['evidence'], FILTER_VALIDATE_URL))
                          <a href="{{ $sk['evidence'] }}" target="_blank">
                            <button class="btn btn-warning">
                              <i class="bi bi-link-45deg"></i> Evidence
                            </button>
                          </a>
                        @else
                          <a href="#">
                            <button class="btn btn-secondary" title="Link tidak valid" disabled>Link evidence tidak
                              valid</button>
                          </a>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama/Judul SK</label>
                        <textarea rows="3" class="form-control" disabled>{{ ucwords(strtolower(preg_replace('/\s+/', ' ', $sk['judul_sk']))) }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal Penetapan</label>
                        <input type="text" class="form-control" value="{{ $sk['tgl_penetapan'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Periode Mulai</label>
                        <input type="text" class="form-control" value="{{ $sk['periode_mulai'] }}" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Periode Selesai</label>
                        <input type="text" class="form-control" value="{{ $sk['periode_selesai'] }}" disabled>
                      </div>
                    </div>

                    <hr>
                    <h6>Nama yang ditugaskan</h6>
                    <div class="col-md-12">
                      <div class="form-group">
                        <table class="table-profile">
                          @if (empty($daftar_anggota))
                            No Data.
                          @else
                            <tr>
                              <th>Jabatan</th>
                              <th>Nama</th>
                            </tr>
                            @foreach ($daftar_anggota as $anggota)
                              <tr>
                                <td>{{ $anggota['jabatan'] }}</td>
                                <td>{{ $anggota['nama_lengkap'] }}</td>
                              </tr>
                            @endforeach
                          @endif
                        </table>
                      </div>
                    </div>

                    <hr>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="/sekre/sk">
                          <button class="btn btn-primary">Back</button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
