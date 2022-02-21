@extends('layouts.master4')
@section('title')
    Dashboard
@stop
@section('content')


   
   <div class="mt-5 dashboard">
        <center>
        <h1>Welcome!</h1>
        <img src="{{asset('image/check2.gif')}}" style="width: 30%; height: 30%">
        <h4>You are logged into the ACD Performance Evaluation System.</h4>
        
        </center>
    </div>

    <div class="container">
        <div class="col-md-8 offset-md-2 mt-5 administrator-container" style="display:none;">
            <div class="card">
                <div class="card-body">
<<<<<<< HEAD
                <table class="table table-hover table-bordered evalueeTable" style="width:100%" id="evalueeTable">
                    <thead>
                        <tr>
                            <th style="display:none">ID</th>
                            <th class="">Name</th>
                            <th class="">Lastname</th>
                            <th class="">Position</th>
                        </tr>
                    </thead>
 
=======
                    <table class="table table-hover table-bordered employeeTable" style="width:100%" id="employeeTable">
                        <thead>
                            <tr>
                                <th style="display:none;">Name</th>
                                <th class="bg-info text-dark">Name</th>
                                <th class="bg-info text-dark">Last Name</th>
                                <th class="bg-info text-dark">Office</th>
                            </tr>
                        </thead>
>>>>>>> 3b413943b65f6201b3a6528b5e000f932d68c134
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
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 mt-5 supervisor-container" style="display:none;">
            <div class="card">
                <div class="card-body">
<<<<<<< HEAD
                <table class="table table-hover table-bordered evalueeTable" style="width:100%" id="evalueeTable">
                    <thead>
                        <tr>
                            <th style="display:none">ID</th>
                            <th class="">Name</th>
                            <th class="">Lastname</th>
                            <th class="">Position</th>
                        </tr>
                    </thead>
 
=======
                <table class="table table-hover table-bordered employeeTable" style="width:100%" id="employeeTable">
                        <thead>
                            <tr>
                                <th style="display:none;">Name</th>
                                <th class="bg-info text-dark">Name</th>
                                <th class="bg-info text-dark">Last Name</th>
                                <th class="bg-info text-dark">Office</th>
                            </tr>
                        </thead>
>>>>>>> 3b413943b65f6201b3a6528b5e000f932d68c134
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
        <div class="col-md-8 offset-md-2 mt-5 ntp-container" style="display:none;">
            <div class="card">
                <div class="card-body">
<<<<<<< HEAD
                <table class="table table-hover table-bordered evalueeTable" style="width:100%" id="evalueeTable">
                    <thead>
                        <tr>
                            <th style="display:none">ID</th>
                            <th class="">Name</th>
                            <th class="">Lastname</th>
                            <th class="">Position</th>
                        </tr>
                    </thead>
 
=======
                <table class="table table-hover table-bordered employeeTable" style="width:100%" id="employeeTable">
                        <thead>
                            <tr>
                                <th style="display:none;">Name</th>
                                <th class="bg-info text-dark">Name</th>
                                <th class="bg-info text-dark">Last Name</th>
                                <th class="bg-info text-dark">Office</th>
                            </tr>
                        </thead>
>>>>>>> 3b413943b65f6201b3a6528b5e000f932d68c134
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
        });
    </script>
@stop
@section('scripts')    
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    
    // $('#employeeTable').dataTable(); 
    $(document).ready(function(){
        $('.employeeTable').dataTable(); 
    });
        
        $('#administrators').click(function(){
            $('.administrator-container').fadeIn(300);
            $('.supervisor-container').fadeOut(300);
            $('.ntp-container').fadeOut(300);
            $('.dashboard').fadeOut(300);
        });
        $('#supervisors').click(function(){
            $('.supervisor-container').fadeIn(300);
            $('.administrator-container').fadeOut(300);
            $('.ntp-container').fadeOut(300);
            $('.dashboard').fadeOut(300);
        });
        $('#ntp').click(function(){
            $('.ntp-container').fadeIn(300);
            $('.supervisor-container').fadeOut(300);
            $('.administrator-container').fadeOut(300);
            $('.dashboard').fadeOut(300);
        })
</script>
@stop
<<<<<<< HEAD
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
$(document).ready(function() {
   $('.evalueeTable').dataTable(); 

});    
</script>
@stop
=======

>>>>>>> 3b413943b65f6201b3a6528b5e000f932d68c134
