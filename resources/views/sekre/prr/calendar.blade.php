@extends('layouts.master')
@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 order-md-1 order-last">
          <h3>Data Peminjaman ruang rapat FIF</h3>
          <div class="d-flex justify-content-between">
            <p class="text-subtitle text-muted"><i>Last Sync: {{ $last_sync }}</i></p>
          </div>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <a href="/sekre/prr">Table View</a>
            <div class="d-flex justify-content-end">
              <div style="color:#33C760;">&#9632; lantai 1</div>
              <div style="color:#5B34C7;">&#9632; lantai 3</div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id='calendar'></div>
        </div>
      </div>

    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const jadwal_peminjaman = @json($prr);
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        hiddenDays: [0, 6], // hide Tuesdays and Thursdays
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth',
        },
        events: jadwal_peminjaman
        // eventColor: '#378006'
      });
      calendar.render();
    });
  </script>
@endsection
