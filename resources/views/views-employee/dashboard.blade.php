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
        <div class="administrator-container" style="display:none;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">Administrators</h1>
                
                <a href="#" id="note-link"><i data-feather="info"></i></a>
            </div>
            <div class="col-md-10 offset-md-1 mt-5">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-bordered employeeTable" style="width:100%" id="employeeTable">
                            <thead>
                                <tr>
                                    <th style="display:none;">Name</th>
                                    <th class="bg-info text-dark">Name</th>
                                    <th class="bg-info text-dark">Last Name</th>
                                    <th class="bg-info text-dark">Office</th>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="supervisor-container" style="display:none;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">Supervisors</h1>
                
                <a href="#" id="note-link"><i data-feather="info"></i></a>
            </div>
            <div class="col-md-10 offset-md-1 mt-5">
                <div class="card">
                    <div class="card-body">
                    <table class="table table-hover table-bordered employeeTable" style="width:100%" id="employeeTable">
                            <thead>
                                <tr>
                                    <th style="display:none;">Name</th>
                                    <th class="bg-info text-dark">Name</th>
                                    <th class="bg-info text-dark">Last Name</th>
                                    <th class="bg-info text-dark">Office</th>
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
        </div>
        <div class="ntp-container" style="display:none;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5">Non-Teaching Personnel</h1>
                
                <a href="#" id="note-link"><i data-feather="info"></i></a>
            </div>
            <div class="col-md-10 offset-md-1 mt-5">
                <div class="card">
                    <div class="card-body">
                    <table class="table table-hover table-bordered employeeTable" style="width:100%" id="employeeTable">
                            <thead>
                                <tr>
                                    <th style="display:none;">Name</th>
                                    <th class="bg-info text-dark">Name</th>
                                    <th class="bg-info text-dark">Last Name</th>
                                    <th class="bg-info text-dark">Office</th>
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
                        </table>
                    </div>
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

