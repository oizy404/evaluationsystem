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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
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
                    
                </div>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 ntp-container">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

@stop