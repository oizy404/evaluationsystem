<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Print Evaluation</title>
    <link rel="icon" href="{{asset('image/acdseal.png')}}" type="image/x-icon">
    <style>
        html{
            
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            counter-reset: section;
            padding-bottom: 30px;
        }
        .numbering::after {
            counter-increment: section;
            content: counter(section) ". ";
        }
        .tabled tr td{
            border: 0.5px solid #000;
            width: 30px;
            height: 40px;
           
        }
        .tabled thead tr th{
            border: 0.3px solid #000;
            /* font-size: 0.8em; */
            
        }
        .container{
            padding-left: 50px;
            padding-right: 50px;
        }
        .theTeacher, .statement{
            width: 500px;
            font-size: 1em;
        }
        .totalwm{
            width: 40px;
            height: 40px;
            /* border: 1px solid #000; */
        }
        
    </style>
</head>
<body>
<div class="container">
        <div>
            <div class="border border">
                <table class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>subject</th>
                            <th>course/section</th>
                            <th>office</th>
                            <th>access-key</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluations as $evaluation)
                        <tr>
                            <td><b>{{$evaluation->evaluee['lname']}}, {{$evaluation->evaluee['fname']}}</b></td>
                            <td> <b>{{$evaluation->subject}}</b></td>
                            <td><b>{{$evaluation->course}}</b></td>
                            <td><b>{{$evaluation->evaluee['office']}}</b></td>
                            <td>{{$evaluation->access_key}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>