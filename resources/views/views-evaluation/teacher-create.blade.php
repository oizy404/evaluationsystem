@extends('layouts.master')
@section('title')
    Create Evaluation
@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Setup Evaluation</h1>
    </div>
    <div class="col-md-12 pt-3 card bg-light shadow pl-5 pr-5">
      <div class=" mt-4 mb-4">
      <form action="{{route('evaluations.store')}}" method="post"  >
          @method('post')
          @csrf
          <input type="hidden" name="evaluee_id" id="evaluee_id" value="">
          <input type="hidden" name="tool_id" id="tool_id" value="">
          
            <div class="form-group form-inline">
                <label class="font-weight-bold float-left">Teacher:</label>
                <input type="text" required class="form-control ml-4" name="teacher" disabled placeholder="Juan Dela Cruz" id="teacher-input" style="width:25%">
                <a class="btn btn-warning ml-2" data-toggle="modal" data-target="#tableModal" href="#"><i data-feather="search"></i> Search</a>  
                
            </div>

          <div class="form-group form-inline">
              <label class="font-weight-bold mr-3">Due Date:</label>
              <input type="date" name="date" required  class="form-control" style="width:25%">
              <label class="font-weight-bold ml-5 mr-3">Subject:</label>
              <input type="text" class="form-control" required name="subject" placeholder="IT101" style="width:30%">
          </div>
          
          <div class="form-group form-inline">
              <label class="font-weight-bold">Session:</label>
              <input type="radio" name="session" value="day" required class="ml-4 mr-1">Day
              <input type="radio" name="session" value="evening" required  class="ml-5 mr-1" style="margin-right: 100px">Evening
              
              <label class="font-weight-bold ml-5">Course/Section:</label>
              <input type="text" name="course" required  class="form-control ml-3">
          </div>

          <div class="form-group form-inline">
              
          </div>
          <div class="form-group" id="year-level">
            <label class="font-weight-bold">Year Level</label>
            <select id="yrlevel" required  name="yrlevel" class="form-control col-md-4">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
          <div class="form-group" id="grade-level" style="display:none;">
            <label class="font-weight-bold">Grade Level</label>
            <select id="gradelevel" required name="yrlevel"  class="form-control col-md-4">
              <option value="1">Grade 1</option>
              <option value="2">Grade 2</option>
              <option value="3">Grade 3</option>
              <option value="4">Grade 4</option>
              <option value="5">Grade 5</option>
              <option value="6">Grade 6</option>
              <option value="7">Grade 7</option>
              <option value="8">Grade 8</option>
              <option value="9">Grade 9</option>
              <option value="10">Grade 10</option>
              <option value="11">Grade 11</option>
              <option value="12">Grade 12</option>
            </select>
          </div>
          <div class="form-group pt-2">
            <div class="form-inline">
              <b>SY From</b> <input type="number" name="SYfrom" class="form-control yrpicker col-md-3 ml-2 mr-3">
              <b>SY To</b> <input type="number" name="SYto" class="form-control yrpicker col-md-3 ml-2">
            </div>
          </div>
          <div class="form-group pt-2 row" id="sem">
            <div class="col">
              <label class="font-weight-bold">Semester</label><br>
              <input type="radio" class="sem" name="semester" value="1" required > 1<br>
              <input type="radio" class="sem" name="semester" value="2" required > 2<br>
            </div>
            <div class="col">
                <label class="font-weight-bold">Term</label><br>
                <input type="radio" class="sem" name="term" value="1" required > 1<br>
                <input type="radio" class="sem" name="term" value="2" required > 2<br>
              </div>
          </div>
          <div class="form-group pt-3">
              <a href="{{route('admindashboard')}}" class="btn btn-secondary mr-3">Cancel</a>
              <button class="btn btn-info">Create</button>
            </div>
      </form>
      </div>
  </div>

<!--modal -->
  <div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 135%; margin-left: -50px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search Teacher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <table class="table table-hover table-bordered" style="width:100%" id="evalueeTable">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th class="bg-warning text-dark">Name</th>
                    <th class="bg-warning text-dark">Office</th>
                    <th class="bg-warning text-dark">Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluees as $evaluee)
                <tr class="evaluee-body">
                    <td style="display: none">{{$evaluee->id}}</td>
                    <td>{{$evaluee->lname}}, {{$evaluee->fname}}</td>
                    <td>{{$evaluee->office}}</td>
                    <td>{{$evaluee->position}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
@stop
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
$(document).ready(function() {
   $('#evalueeTable').dataTable(); 
  });   
   $('.evaluee-body').click(function(){
      var id =  $(this).find(":first-child").text();
      var name = $(this).find(":first-child").next().text();
      var office=$(this).find(":first-child").next().next().text();
      $('#tableModal').modal('hide');
      $('#teacher-input').val(name);
      $('#evaluee_id').val(id);
      if(office=="College"){
        $('#year-level').attr("name", 'yrlevel');
        $('#grade-level').attr("name", '');
        $('.sem').attr( 'required',true);
        $('#year-level').show();
        $('#grade-level').hide();
        $('#sem').show();
        $('#tool_id').val(1);
      }else{
        $('#year-level').attr("name", '');
        $('#grade-level').attr("name", 'yrlevel');
        $('#year-level').hide();
        $('#grade-level').show();
        $('.sem').attr( 'required',false);
        $('#sem').hide();
        $('#tool_id').val(2);
      }
    }); 

    $(function() {
        $(".yrpicker").datepicker({dateFormat: 'yy'});
    });
    
    $('.page-link').addClass('shadow');

   
</script>
@stop
