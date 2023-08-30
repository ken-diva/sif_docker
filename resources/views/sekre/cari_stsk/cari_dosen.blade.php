@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Cari Surat Tugas & SK Dosen</h3>
          {{-- <p class="text-subtitle text-muted">Total Surat Keputusan:</p> --}}
        </div>
      </div>
    </div>
    <section class="multiple-choices">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <input class="form-control" list="dosen" name="filter" required>
                      <datalist id="dosen">
                        @foreach ($nama_dosen as $nama)
                          <option value="{{ $nama['nama_dosen'] }}"></option>
                        @endforeach
                      </datalist>
                    </div>
                  </div>
                  <div class="col-md-2 mt-4">
                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                  </div>
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
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
