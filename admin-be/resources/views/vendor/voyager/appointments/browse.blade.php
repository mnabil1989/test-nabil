@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Appointments')

@section('content')

    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href='{{ url('fullcalender/packages/core/main.css') }}' rel='stylesheet' />
    <link href='{{ url('fullcalender/packages/daygrid/main.css') }}' rel='stylesheet' />
    <link href='{{ url('fullcalender/packages/timegrid/main.css') }}' rel='stylesheet' />
    <link href='{{ url('fullcalender/packages/list/main.css') }}' rel='stylesheet' />
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}

    <style>
        /*body {*/
        /*    margin: 40px 10px;*/
        /*    padding: 0;*/
        /*    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;*/
        /*    font-size: 14px;*/
        /*}*/
        /*.popover-content {*/
        /*    padding: 8px 14px;*/
        /*    !*margin: 0;*!*/
        /*    font-size: 14px;*/
        /*    background-color: #f7f7f7;*/
        /*    border-bottom: 1px solid #ebebeb;*/
        /*    border-radius: 5px 5px 0 0;*/
        /*    z-index: 999;*/
        /*}*/
/*.popover*/
/*{*/
/*    z-index: 999;*/
/*}*/

        #calendar {
            max-width: 90%;
            margin: 0 auto;
        }
    </style>
@stop

@section('javascript')
    <script src='{{ url('fullcalender/packages/core/main.js') }}'></script>
    <script src='{{ url('fullcalender/packages/interaction/main.js') }}'></script>
    <script src='{{ url('fullcalender/packages/daygrid/main.js') }}'></script>
    <script src='{{ url('fullcalender/packages/timegrid/main.js') }}'></script>
    <script src='{{ url('fullcalender/packages/list/main.js') }}'></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    {{--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"--}}
    {{--            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"--}}
    {{--            crossorigin="anonymous"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"--}}
    {{--            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"--}}
    {{--            crossorigin="anonymous"></script>--}}
    {{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"--}}
    {{--            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"--}}
    {{--            crossorigin="anonymous"></script>--}}
    <script>
        function getColor(event) {
            if (event.confirmed == '0' && event.payment_confirmed == '0')
                return 'red';
            if (event.confirmed == '1' && event.payment_confirmed == '0')
                return 'yellow';
            if (event.confirmed == '0' && event.payment_confirmed == '1')
                return 'purpule';
            if (event.confirmed == '1' && event.payment_confirmed == '1')
                return 'green';
        }

        // window.onload = load;
        function load(events) {
            events = events.map((item) => {
                item.color = getColor(item);
                return item;
            });
            // console.log(`this is  data : ${events[0]} `);
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                defaultDate: '{{now()}}',
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: false,


                events: events,
                eventClick: function (info) {
                    $('.popover').remove(); // Close all open popovers.
                    // console.log(info);
                    window.location.href = `./appointments/${info.event.id}`;
                    // $this = $(info.el);
                    // var confirm='No';
                    // var Payment_confirm='No';
                    //  if(info.event.extendedProps.confirmed==1)
                    // {
                    //     confirm='Yes';
                    // }
                    // $this.popover({
                    //     html: true, title: info.event.title, placement: 'bottom',
                    //     content: `
                    //     <h4>Title:</h4>
                    //     <div>${info.event.title}</div>
                    //
                    //     <h4>Start:</h4>
                    //     <div>${info.event.start}</div>
                    //
                    //     <h4>Ends:</h4>
                    //     <div>${info.event.end}</div>
                    //
                    //     <h4>Confirmed Booking:</h4>
                    //     <div>${info.event.extendedProps.confirmed}</div>
                    //
                    //     <h4>Confirmed payment:</h4>
                    //
                    //     <button type="button" class="btn btn-primary">Primary</button>
                    //
                    //     <div>${info.event.extendedProps.payment_confirmed}</div>
                    //
                    //     <div>
                    //         <a href='./appointments/${info.event.id}' class="btn btn-warning"> View</a>
                    //         <a href='./appointments/${info.event.id}/edit' class="btn btn-primary"> Edit</a>
                    //     </div>
                    //
                    //     `
                    // }).popover('show');

                },
            });

            calendar.render();
        }

        {{--load(@json($model));--}}

        document.addEventListener('DOMContentLoaded', function () {

            console.log(@json($model));
            load(@json($model));



            // fetch('http://127.0.0.1:8000/api/bookings?calender=true', {
            //     mode: 'cors',
            // })
            //     .then((response) => {
            //         return response.json();
            //     })
            //     .then((data) => {
            //         console.log(data);
            //         load(data['data']);
            //
            //     });

        });





        // function load() {
        //     var calendarEl = document.getElementById('calendar');
        //     calendarEl = FullCalendar
        //     console.log(calendarEl);
        //     console.log('sdfsdf');


        //     setTimeout(() => {
        //         console.log('sdfsdf');

        //     }, 2000);


        // }


    </script>
@stop
