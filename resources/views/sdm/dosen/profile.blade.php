@extends('layouts.master')
@section('content')
  @foreach (json_decode($data) as $d)
    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Profile Dosen</h3>
            <p class="text-subtitle text-muted">Fakultas Informatika</p>
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
          {{-- <div class="card-header">
            <h4 class="card-title">Default Avatar</h4>
          </div> --}}
          <div class="card-body">
            <table>
              <tr>
                <td rowspan="4" style="padding-right: 30px">
                  @if ($d->photourl != null)
                    <img src="{{ $d->photourl }}" class="rounded img-profile" alt="No Image!">
                  @else
                    <img src="{{ asset('dist/assets/images/faces/user.png') }}" class="rounded img-profile"
                      alt="No Image!">
                  @endif
                </td>
              </tr>
              <tr>
                <td>{{ $d->fronttitle . ' ' . ucwords(strtolower($d->name)) . ' ' . $d->backtitle }}</td>
              </tr>
              <tr>
                <td>{{ $d->nip }}</td>
              </tr>
              <tr>
                <td>
                  @if ($d->structuralposition != null)
                    <span class="badge bg-primary">{{ $d->structuralposition }}</span>
                  @else
                    <span class="badge bg-danger">-</span>
                  @endif
                </td>
              </tr>
            </table>

          </div>
        </div>
      </section>
      <section class="section">
        <div class="card">
          {{-- <div class="card-header">
            <h4 class="card-title">Default Avatar</h4>
          </div> --}}
          <div class="card-body">
            <h5>Detail</h5>
            <table class="table-profile">
              <tr>
                <td width="40%">NIDN</td>
                <td>{{ $d->nidn }}</td>
              </tr>
              <tr>
                <td>Kode Dosen</td>
                <td>{{ $d->lecturercode }}</td>
              </tr>
              <tr>
                <td>Tanggal Masuk</td>
                <td>{{ $d->workstartdate }}</td>
              </tr>
              <tr>
                <td>Masa Kerja</td>
                <td>{{ $masa_kerja }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>{{ $d->status }}</td>
              </tr>
              <tr>
                <td>Status Kepegawaian</td>
                <td>{{ ucwords(strtolower($d->employmentstatus)) }}</td>
              </tr>
              <tr>
                <td>JFA</td>
                <td>
                  <span class="badge bg-success">{{ $jfa }}</span>
                </td>
              </tr>
              <tr>
                <td>No. Serdos</td>
                <td>{{ $d->certificationlecturer }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{ $d->email }}</td>
              </tr>
            </table>

            <hr>
            <h5>Pendidikan</h5>
            <table class="table-profile">
              <tr>
                <td width="40%">Pendidikan Terakhir</td>
                <td>{{ $d->educationdegree }}</td>
              </tr>
              <tr>
                <td>Program Studi Pendidikan Terakhir</td>
                <td>{{ ucwords(strtolower($d->educationprogram)) }}</td>
              </tr>
              <tr>
                <td>Institusi Pendidikan Terakhir</td>
                <td>{{ ucwords(strtolower($d->institutionname)) }}</td>
              </tr>
              <tr>
                <td>Tanggal Lulus</td>
                <td>{{ $d->graduatedate }}</td>
              </tr>
            </table>

            <hr>
            <h5>Unit</h5>
            <table class="table-profile">
              {{-- <tr>
                <td width="40%">Fakultas</td>
                <td>{{ ucwords(strtolower($d->facultyname)) }}</td>
              </tr> --}}
              <tr>
                <td width="40%">Program Studi</td>
                <td>{{ $d->studyprogramname }}</td>
              </tr>
              <tr>
                <td>Kelompok Keahlian</td>
                <td>{{ ucwords(strtolower($d->skillgroupname)) }}</td>
              </tr>
            </table>

            <hr>
            <a href="/sdm/data-dosen" class="text-decoration-none">
              <button class="btn btn-secondary">Back</button>
            </a>
          </div>
        </div>
      </section>
    </div>
  @endforeach
@endsection
