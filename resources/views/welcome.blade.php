<!DOCTYPE html>
<html>
<head>
  <title>Laravel Fullcalender Add/Update/Delete Event Example Tutorial - Tutsmake.com</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link href='{{ asset('packages/core/main.css')}}' rel='stylesheet' />
<link href='{{ asset('packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{ asset('packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{ asset('packages/list/main.css')}}' rel='stylesheet' />
<script src='{{ asset('packages/core/main.js')}}'></script>
<script src='{{ asset('packages/interaction/main.js')}}'></script>
<script src='{{ asset('packages/daygrid/main.js')}}'></script>
<script src='{{ asset('packages/timegrid/main.j')}}s'></script>
<script src='{{ asset('packages/list/main.js')}}'></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
<body>

  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
          Event
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <form method="POST" action="{{action('FullCalendarController@create')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Event</label>
                          <input type="text" class="form-control" id="event" name="title">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1">From</label>
                                <input type="date" class="form-control" id="start" name="start">

                              </div>
                              <div class="form-group col">
                                <label for="exampleInputEmail1">To</label>
                                <input type="date" class="form-control" id="end" name="end">

                              </div>
                        </div>

                        <div class="form-group form-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dayofweek[]"  value="0">
                                <label class="form-check-label" for="inlineRadio2">Sun</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dayofweek[]"  value="1">
                                <label class="form-check-label" for="inlineRadio1">Mon</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dayofweek[]"  value="2">
                                <label class="form-check-label" for="inlineRadio2">Tue</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dayofweek[]"  value="3">
                                <label class="form-check-label" for="inlineRadio1">Wed</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dayofweek[]"  value="4">
                                <label class="form-check-label" for="inlineRadio2">Thu</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dayofweek[]"  value="5">
                                <label class="form-check-label" for="inlineRadio1">Fri</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="dayofweek[]"  value="6">
                                <label class="form-check-label" for="inlineRadio2">Sat</label>
                              </div>
                        </div>
                        <button type="submit" name="save" id="save" class="btn btn-primary">Save</button>
                      </form>
                </div>
                <div class="col-md-8">
                    <div class="response"></div>
                    <div id='calendar'></div>
                </div>
              </div>
        </div>
    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid' ],
            height: 'auto',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            defaultView: 'dayGridMonth',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            events: [
                @foreach($events as $event)
                    {
                        title : '{{ $event->title }}',
                        daysOfWeek : '{{ $event->dayofweek }}',
                        startRecur : '{{ $event->start }}',
                        endRecur : '{{ $event->end }}'

                    },
                @endforeach

            ]
            });

            calendar.render();
    });

  </script>
</body>
</html>
