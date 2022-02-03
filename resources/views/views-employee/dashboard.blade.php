@extends('layouts.master4')
@section('title')
    Dashboard
@stop
@section('content')


   
   <div class="mt-5">
        <center>
        <h1>Welcome!</h1>
        <img src="{{asset('image/check2.gif')}}" style="width: 30%; height: 30%">
        <h4>You are logged into the ACD Performance Evaluation System.</h4>
        
        </center>
    </div>

    <div class="container">
        <div class="col-md-8 offset-md-2 administrator-container">
            <div class="card">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>lastname</th>
                                <th>office</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluations as $evaluation)
                            @if($evaluation->tool_id==3)
                                <tr class="data">
                                    <td style="display:none">{{$evaluation->access_key}}</td>
                                    <td>{{$evaluation->evaluee->fname}}</td>
                                    <td>{{$evaluation->evaluee->lname}}</td>
                                    <td>{{$evaluation->evaluee->office}}</td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 supervisor-container">
            <div class="card">
                <div class="card-body">
                <table>
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>lastname</th>
                                <th>office</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluations as $evaluation)
                            @if($evaluation->tool_id==4)
                                <tr class="data">
                                    <td style="display:none">{{$evaluation->access_key}}</td>
                                    <td>{{$evaluation->evaluee->fname}}</td>
                                    <td>{{$evaluation->evaluee->lname}}</td>
                                    <td>{{$evaluation->evaluee->office}}</td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>         
                </div>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 ntp-container">
            <div class="card">
                <div class="card-body">
                <table>
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>lastname</th>
                                <th>office</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluations as $evaluation)
                            @if($evaluation->tool_id==5)
                                <tr class="data">
                                    <td style="display:none">{{$evaluation->access_key}}</td>
                                    <td>{{$evaluation->evaluee->fname}}</td>
                                    <td>{{$evaluation->evaluee->lname}}</td>
                                    <td>{{$evaluation->evaluee->office}}</td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('.data').click(function(){
        var code=$(this).find(":first-child").text();
        window.location.replace(code);
    })
</script>
@stop