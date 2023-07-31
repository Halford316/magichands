@extends('adminlte::page')

@section('title', 'Magic Hands')

@section('content_header')
    <h5 class="titulo p-2">
        Calendario de citas
    </h5>
@stop

@section('content')

<div id="calendar" class="mb-5"></div>

@stop

@section('css')

@stop

@section('js')
    <script>

    var flagUrl = '{{ URL::asset('') }}';

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = @json($events);

        //console.log(events);
        var calendar = new FullCalendar.Calendar(calendarEl, {

            /*header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },*/
            //initialView: 'dayGridMonth',
            initialView: 'timeGridWeek',
            locale: 'es',
            slotEventOverlap: false,
            allDaySlot: false,
            //slotDuration: '00:30:00',
            slotMinTime: '07:30',
            slotMaxTime: '18:00',
            scrollTime: '05:00:00',
            events: events,

        });

        calendar.render();
    });

    </script>
@stop
