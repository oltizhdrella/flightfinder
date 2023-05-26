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

            <div align="center" style="margin-top:25px">

                <div class='text-right'>
                <a type="button" href="{{route('expense_pdf')}}" class="btn btn-dark text-white" style="margin: 20px 0px 15px 20px; " >Export as PDF</a>
                </div>

            @if(isset($expenses))

            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Amount</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Date & Time</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $expense)
                    <tr>
                        <th scope="row">{{$expense['amount']}}</th>
                        <td>{{$expense['currency']}}</td>
                        <td>{{$expense['created_at']}}</td>
                    </tr>
                 @endforeach
                  
                </tbody>
              </table>
            
            @endif
        </div>


            
    </div>
    </div>

    </div>
    <!--LG>MD END-->

</body>

</html>
