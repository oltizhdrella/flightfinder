<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            padding: 10px;
            background: linear-gradient(135deg, #FFA500, #ff4d00);
        }
    </style>
    <title>FlightFinder</title>
</head>

<body>
    <div>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>FlightFinder</title>
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/normalize.css">
            <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="css/main.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                crossorigin="anonymous">


        </head>

        <body>


            @include('navbar')

            <div align="center">
            @foreach ($tickets as $ticket)
                        <div class="card text-left col-sm-5" style="margin-top:50px">
                            <div class="card-body">
                                <h5 class="card-title">From >
                                    {{ $ticket['from_city'] }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo >
                                    {{ $ticket['to_city'] }}</h5>

                                @if (isset($ticket['return_date']))
                                <p class="card-text" style="margin-top:20px">Depart Date >
                                    {{ $ticket['departure_date'] }}
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    Return Date >
                                    {{ $ticket['return_date'] }}
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Class >
                                    {{ ucfirst($ticket['class']) }}
                                </p>
                                @else
                                    <p class="card-text" style="margin-top:20px">Depart Date >
                                        {{ $ticket['departure_date'] }}
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Class >
                                        {{ ucfirst($ticket['class']) }}
                                    </p>
                                @endif


                                <div class="text-right">
                                    <a href="{{route('ticket_pdf', ['ticket_id' => $ticket['id']])}}" class="btn btn-warning">Download PDF</a>
                                </div>
                              
                            </div>
                        </div>
                    @endforeach
                    </div>


        </body>

</html>
