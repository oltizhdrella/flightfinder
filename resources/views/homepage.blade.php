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
    <style>
        .btn-blue {
            background-color: #02122c;
        }

        .bg-blue {
            background-color: #02122c;
        }

        .bg-gray {
            background-color: #dddde5;
        }

        .btn-gray {
            background-color: #dddde5;
        }

        .fs-8 {
            font-size: 12px;
        }

        .flightImg {
            background-image: url(Images/airline.jpg);
            background-position: center;
            background-size: cover;
        }

        .btn-green {
            background-color: #00a698;
        }

        .bg-sm-blue {
            background-color: #042759;
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

            <h1 class="text-white fw-bold" style="font-size: 55px; padding: 7% 0 2% 16%">
                Let the journey begin
            </h1>
            <div align="center">

                <form method="POST" action={{ route('flight_search') }}>
                    <div class="card bg-dark text-white col-sm-8">
                        <div class="card-body">
                            <div align="left">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flightOption" id="oneway"
                                        value="oneway">
                                    <label class="form-check-label" for="oneway">One Way</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flightOption" id="roundtrip"
                                        value="roundtrip">
                                    <label class="form-check-label" for="roundtrip">Round Trip</label>
                                </div>
                            </div>
                            {!! csrf_field() !!}
                            <div class="row" style="margin-top:20px">
                                <div class="col">
                                    <label for="from_place">From</label>
                                        <select class="form-select form-control" id="from_place" placeholder="test"
                                        name="from_place" aria-label="Default select example">
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city['city_country']}}">{{$city['city_country']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="to_place">To</label>
                                    <select class="form-select form-control" id="to_place" placeholder="test"
                                        name="to_place" aria-label="Default select example">
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city['city_country']}}">{{$city['city_country']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="depart_date">Depart</label>
                                    <input type="date" class="form-control" id="depart_date" name="depart_date"
                                        min={{$minDate}}>
                                </div>
                                <div class="col">
                                    <label for="return_date">Return</label>
                                    <input type="date" class="form-control" id="return_date" name="return_date"
                                        min={{$minDate}}>
                                </div>
                                <div class="col">
                                    <label for="class_selected">Cabin Class</label>
                                    <select class="form-select form-control" id="class_selected" placeholder="test"
                                        name="class_selected" aria-label="Default select example">
                                        <option value="economy_class">Economy Class</option>
                                        <option value="business_class">Business Class</option>
                                        <option value="first_class">First Class</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">&nbsp</label>
                                    <input type="submit" class="form-control text-white"
                                        style="background-color:#FFA500" style="border:none"
                                        value="Search Flights >">
                                </div>
                            </div>
                </form>
            </div>
    </div>
    </div>

    </div>
    <!--LG>MD END-->

</body>

</html>
