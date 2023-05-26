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
            
            <div align="center" style="margin-top:200px">

                @if(!isset($body['recommend']) && $body['actual_flight'] == null)
                <h1 class="text-white fw-bold" style="font-size: 25px; margin-bottom:50px;">
                    Ooopsss... No Flights found!
                </h1>
                @endif


                @if (isset($body['actual_flight']))
                <h1 class="text-white fw-bold" style="font-size: 25px; margin-bottom:50px;">
                    Your flight has been found.
                </h1>
                <div class="card text-left col-sm-5" style="margin-top:50px">
                    <div class="card-body">
                        <h5 class="card-title">From >
                            {{ $body['actual_flight']['from'] }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo >
                            {{ $body['actual_flight']['to'] }}</h5>

                        @if (isset($body['actual_flight']['return_date']))
                        <p class="card-text" style="margin-top:20px">Depart Date >
                            {{ $body['actual_flight']['departure_date'] }}
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Return Date >
                            {{ $body['actual_flight']['return_date'] }}
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Class >
                            {{ ucfirst($body['actual_flight']['class']) }}
                        </p>
                        @else
                            <p class="card-text" style="margin-top:20px">Depart Date >
                                {{ $body['actual_flight']['departure_date'] }}
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Class >
                                {{ ucfirst($body['actual_flight']['class']) }}
                            </p>
                        @endif


                        @if($body['actual_flight']['class'] == 'business')
                        <div class="text-right">
                            <a href={{ route('make.payment', ['flight_id' => $body['id'],'amount'=>$body['actual_flight']['business_seat_price'], 'from' => $body['actual_flight']['from'], 'to' => $body['actual_flight']['to'], 'departure_date' => $body['actual_flight']['departure_date'], 'return_date' => $body['actual_flight']['return_date'], 'class' => $body['actual_flight']['class']]) }} class="btn btn-warning">Purchase {{$body['actual_flight']['business_seat_price']}}$</a>
                        </div>
                        @elseif($body['actual_flight']['class'] == 'economy')
                            <div class="text-right">
                                <a href={{ route('make.payment', ['flight_id' => $body['id'],'amount'=>$body['actual_flight']['economy_seat_price'], 'from' => $body['actual_flight']['from'], 'to' => $body['actual_flight']['to'], 'departure_date' => $body['actual_flight']['departure_date'], 'return_date' => $body['actual_flight']['return_date'], 'class' => $body['actual_flight']['class']]) }} class="btn btn-warning">Purchase {{$body['actual_flight']['economy_seat_price']}}$</a>
                            </div>
                        @elseif($body['actual_flight']['class'] == 'first class')
                        <div class="text-right">
                                <a href={{ route('make.payment', ['flight_id' => $body['id'],'amount'=>$body['actual_flight']['first_seat_price'], 'from' => $body['actual_flight']['from'], 'to' => $body['actual_flight']['to'], 'departure_date' => $body['actual_flight']['departure_date'], 'return_date' => $body['actual_flight']['return_date'], 'class' => $body['actual_flight']['class']]) }} class="btn btn-warning">Purchase {{$body['actual_flight']['first_seat_price']}}$</a>
                            </div>
                        @endif
                    </div>
                </div>
                @elseif(isset($body['recommend']))
                <h1 class="text-white fw-bold" style="font-size: 25px; margin-bottom:50px;">
                    There are no flights with your search, but here are some recommendations.
                </h1>
                    @foreach ($body['recommend'] as $recommend)
                        <div class="card text-left col-sm-5" style="margin-top:50px">
                            <div class="card-body">
                                <h5 class="card-title">From >
                                    {{ $recommend['from'] }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo >
                                    {{ $recommend['to'] }}</h5>

                                @if (isset($recommend['return_date']))
                                <p class="card-text" style="margin-top:20px">Depart Date >
                                    {{ $recommend['departure_date'] }}
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    Return Date >
                                    {{ $recommend['return_date'] }}
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Class >
                                    {{ ucfirst($recommend['class']) }}
                                </p>
                                @else
                                    <p class="card-text" style="margin-top:20px">Depart Date >
                                        {{ $recommend['departure_date'] }}
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Class >
                                        {{ ucfirst($recommend['class']) }}
                                    </p>
                                @endif


                                @if($recommend['class'] == 'business')
                                <div class="text-right">
                                    <a href={{ route('make.payment', ['flight_id'=>$recommend['id'],'amount'=>$recommend['business_seat_price'], 'from' => $recommend['from'], 'to' => $recommend['to'], 'departure_date' => $recommend['departure_date'], 'return_date' => $recommend['return_date'], 'class' => $recommend['class']]) }} class="btn btn-warning">Purchase {{$recommend['business_seat_price']}}$</a>
                                </div>
                                @elseif($recommend['class'] == 'economy')
                                    <div class="text-right">
                                        <a href={{ route('make.payment', ['flight_id'=>$recommend['id'],'amount'=>$recommend['economy_seat_price'], 'from' => $recommend['from'], 'to' => $recommend['to'], 'departure_date' => $recommend['departure_date'], 'return_date' => $recommend['return_date'], 'class' => $recommend['class']]) }} class="btn btn-warning">Purchase {{$recommend['economy_seat_price']}}$</a>
                                    </div>
                                @elseif($recommend['class'] == 'first class')
                                <div class="text-right">
                                        <a href={{ route('make.payment', ['flight_id'=>$recommend['id'],'amount'=>$recommend['first_seat_price'], 'from' => $recommend['from'], 'to' => $recommend['to'], 'departure_date' => $recommend['departure_date'], 'return_date' => $recommend['return_date'], 'class' => $recommend['class']]) }} class="btn btn-warning">Purchase {{$recommend['first_seat_price']}}$</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    {{-- {{ dd($body['recommend']) }} --}}
                @endif

                

                <div>
        </body>

</html>
