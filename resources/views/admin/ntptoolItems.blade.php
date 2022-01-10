@extends('layouts.master')
@section('title')
    Teacher Evaluation
@stop
@section("styles")
    <style>
    
        .item-link, .item-link:hover {
            text-decoration: none;
            color: #000;
        }    
        .item-statement{
            width: 80%;
            height: 100px;
        }
        .statementText{
            border: 0px;
            resize: none;
        }
        body{
            background: #f7f7f7;
        }
        /* .add-criteria{
            position: absolute;
            top: 100px;
            left: 10px;
        } */
        /* .add-statement{
            position: absolute;
            top: 100px;
            left: 10px;
        } */
        .center {
            padding-left: auto;
            padding-right: auto;
            text-align: center;
        }
        .for-review{
            background-color: transparent;
            border:none;
        }
        #view-criteria{
            width: 400px;
            list-style: none;
            display: none;
        }
        #add{
            float: right;
            margin-right: 65px;
        }
        #rubrics-table{
            position: relative;
            overflow-y:scroll;
            height: 400px;
            padding:20px;
            display: none;
        }

    </style>
@stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5">{{$header}}</h1>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="card shadow pt-4 pb-4 pr-3">
            <ul id="item-list">
                @foreach($items as $item)
                <li class="list-li">            
                <a href="#" class='item-link' class="item-link">{{$item->statement}}</a>
                <input type="hidden" value="{{$item->id}}">
                </li>
                @endforeach
            </ul>
            </div>

            <!--update delete modal-->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="item-modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tool Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="col-md-10 offset-md-1" id="form-updateItem" method="post">
                            @csrf
                            <textarea name="statement" class="form-control mt-3 mb-2 statementText"></textarea>
                            <div class="col-md-6 offset-md-4 mb-3">
                            <button class="btn btn-success">Update</button>                            
                            <a class="btn btn-danger" id="btn-delItem">Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <a href="#" class="btn btn-primary mb-3 add-criteria1" data-toggle="tooltip"  style="margin-left:50px;font-size:17px" data-placement="top" title="Setup rubrics" >
                        Create Table
            </a>
        <form method="post" id="add_item" action="{{url('storeItem')}}" >
            @method('post')
            @csrf
            <div class="form-group ml-4 mb-5" style="position:relative">
                <!-- <label for="statement"><b>Create Item</b></label> -->
                <div class="form-group ml-4 mb-5 box" style="position:relative;">
                <a href="#" class="add-statement" data-toggle="tooltip" data-placement="top" title="Setup rubrics">
                    <span data-feather="plus-circle"></span>
                    Add another item
                </a>
                    <textarea name="statements[]" id="statement" style="width:400px; height:100px; resize:none; padding-left:0px" class="form-control mt-2 mb-2" placeholder="  Create Item"></textarea>
                </div>
                <!-- <a href="#" class="add-statement" data-toggle="tooltip" data-placement="top" title="Setup rubrics">
                    <span data-feather="plus-circle"></span>
                    Add another item
                </a><br> -->
                <!-- <a href="#" class="add-criteria" data-toggle="tooltip" data-placement="top" title="Setup rubrics" >
                    <span data-feather="plus-circle"></span>
                </a>
               -->
                <ul id="view-criteria" class="card card-body"></ul>
              
                <input type="hidden" name="toolId" value="{{$id}}">
                <button type="submit" class="btn btn-primary mt-3" id="add">Create Item</button>
               
            </div>
            <div class="status col-md-8">
            </div>
        </form>
       
        </div>   
    </div>
    <!-- Setup Rubrics modal -->
    <!-- <div class="modal" tabindex="-1" role="dialog" id="criteriaModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Setup Rubrics</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true" class="criteriaModal-close">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-10 col-lg-10">
                    <div class="input-group col-input-group mb-3">
                        <div class="input-group-append">
                            <input type="number" id="noOfColumns" class="form-control" style="width:350px" placeholder="Enter maximum number of criteria points">
                        </div>
                        <button class="btn btn-info ml-3" id="generate-table">Generate Table</button>
                    </div>
                </div>
                <table id="rubrics-table" style="display:none; width:100%" >
                    <tr id="points"></tr>
                    <tr id="criterion"></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-white" id="btn-complete">Complete</button>
                <button type="button" class="btn btn-secondary criteriaModal-close" data-dismiss="modal">Close</button>
            </div>
         
        </div>
    </div>
    </div> -->

        <!-- Setup Rubrics modal rawr -->
    <div class="modal" tabindex="-1" role="dialog" id="criteriaModal1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Setup1 Rubrics</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true" class="criteriaModal-close1">&times;</span>
                </button>
            </div>
            <form method="post" id="add_item" action="{{url('storeItem')}}" >
                @method('post')
                @csrf
            <div class="modal-body">
                <div class="col-md-10 col-lg-10">
                    <div class="input-group col-input-group mb-3 rawr">
                        <div class="input-group-append">
                            <input type="hidden" name="toolId" value="{{$id}}">
                            <input type="number" id="noOfRows1" class="form-control" style="width:350px" placeholder="Enter maximum number of criteria points"><br>
                            <input type="number" id="noOfColumns1" class="form-control" style="width:350px" placeholder="Enter maximum number of items">
                        </div>
                        <!-- <a class="btn btn-info ml-3" id="generate-table1">Generate Table</a> -->

                    </div>
                </div>
                <div class="form-group" id="rubrics-table">
                    <table class="rubric-stable" id="rubrics-table1" style="display:none; width:100%;" >
                        <tr id="points1"></tr>
                        <tr id="criterion1"></tr>
                    </table>
                </div>
                <!-- <table class="rawrtable" id="rubrics-table1" style="display:none; width:100%;" >
                    <tr id="points1"></tr>
                    <tr id="criterion1"></tr>
                </table> -->

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-white" id="btn-complete1" style="display:none;">Complete</button>
                <a class="btn btn-info ml-3" id="generate-table1">Complete</a>
                <button type="button" class="btn btn-secondary criteriaModal-close1" data-dismiss="modal">Close</button>
            </div>
            </form>
         
        </div>
    </div>
    </div>


@stop

@section('scripts')

<script >

/*===== Written by Ryan Arcel Galendez =====*/

    $(document).ready(function(){
    
        $("#statement").focus(function(){
            $(this).html()="";
        })

         $('#add_ite').submit(function(event){
         event.preventDefault();
             var statement = $("#statement").val();
             $.ajax({
                 url:"{{url('storeItem')}}",
                 method:"POST",
                 data:$(this).serialize(),
                 // dataType:"json",
                 success:function(data){
                     var len = $("#item-list li").length;
                     var html = $("<li class='list-li'><a href='#' class='item-link'>"+statement+"</a></li>").hide().fadeIn(400);
                     var status = $("<div class='alert alert-success' role='alert'><b>Success!</b> Item adedd.</div>").hide().fadeIn(300);
                     $('#item-list').append(html)
                     $("#statement").val("");
                     $(".status").html(status)
                     $(".alert").delay(2500).fadeOut(500);
                 },
                 error: function (e) {      
                     console.log("ERROR : ", e);
                 }
             });
         });
     
         $('.item-link').click(function(){
             var statementText = $(this).html();
            // alert(statementText)
             var id = $(this).next().val();
            // $('.statementText').val(id);
             $('.statementText').val(statementText);
             $('#item-modal').modal('show');
             $('#form-updateItem').attr("action", "/updateItem/"+id)
             $('#btn-delItem').attr("href", "/deleteItem/"+id);
         });
     
         $("#btn-delItem").click(function(e){
             if (!confirm('Are you sure?'))
                 e.preventDefault();
         });

         $(".add-criteria").click(function(){
            $("#criteriaModal").fadeIn(300);
         })

         $(".criteriaModal-close").click(function(){
            $("#criteriaModal").fadeOut(300);
         })

         //--------------miguelles
         $(".add-statement").click(function(){
            let box=$(".box");
            box.append(
            "<textarea name='statements[]' id='statement' style='width:400px; height:100px; resize:none; padding-left:0px' class='form-control mb-2'></textarea>"
            );
         })

         $(".add-criteria1").click(function(){
            $("#criteriaModal1").fadeIn(300);
         })

         $(".criteriaModal-close1").click(function(){
            $("#criteriaModal1").fadeOut(300);
         })

         $("#generate-table1").click(function(){
            let n = parseInt($("#noOfColumns1").val())
            let x = parseInt($("#noOfRows1").val())
            $(".rawr").hide(200);
            generateTable1(n,x);
            $("#rubrics-table").show(300);
            $("#rubrics-table1").show(300);
            $("#btn-complete1").show(300);
            $("#generate-table1").hide(300);
         })

         function generateTable1(n,x){
            let rawr = $("#rubrics-table1");
             let points = $("#points1");
             let criterion = $("#criterion1");

             points.empty();
             criterion.empty();

             for (let i = 1; i <= n; i++) {
                rawr.append(
                    "<tr class='row"+i+"'></tr>"
                );
                for(let j = 0; j <= x; j++){
                    let col=$(".row"+i+"");
                    if(j==0){
                        col.append(
                        "<td class='ml-2 mr-2'><textarea type='text' name='statements[]' class='form-control' placeholder='Enter statment for item"+i+" point(s)'></textarea></td>"
                        );  
                    }else{
                        col.append(
                        "<td class='ml-2 mr-2'><textarea type='text' class='form-control' name='criterions"+i+"[]' placeholder='Enter criterion for "+j+" point(s)'></textarea></td>"
                        );
                    }
                }

                // points.append(
                //     "<td class='center'><b>"+i+"</b></td>"
                // );
                // criterion.append(
                //     "<td class='ml-2 mr-2'><textarea type='text' class='form-control' id='criteria-statement"+i+"' placeholder='Enter criterion for "+i+" point(s)'></textarea></td>"
                // );
            
             }


                $("#btn-complete1").click(function(){
                    let objects = {}

                    let viewCriteria = $("#view-criteria"); 
                    viewCriteria.empty();

                    for (let i = 1; i <= n; i++) {
                        let criterStatement = $("#criteria-statement"+ i).val();
                        objects[i] = criterStatement;

                        viewCriteria.append(
                            "<li class='center'><input type='text' name='points[]' style='width:10px' value='"+i+"' class='mr-4 for-review'><input type='text' class='for-review' name='criterion[]' value='"+criterStatement+"'></li>"
                        );
                    }
                    console.log(objects)      
                    $("#criteriaModal1").fadeOut(300); 
                    $("#view-criteria").show(100);

                })
         }
         //--------

         $("#generate-table").click(function(){
            let n = parseInt($("#noOfColumns").val())
            $(".col-input-group").hide(200);
            generateTable(n);
            $("#rubrics-table").show(300);
         })
         
         function generateTable(n){
             let points = $("#points");
             let criterion = $("#criterion");

             points.empty();
             criterion.empty();

             for (let i = 1; i <= n; i++) {
                points.append(
                    "<td class='center'><b>"+i+"</b></td>"
                );
                criterion.append(
                    "<td class='ml-2 mr-2'><textarea type='text' class='form-control' id='criteria-statement"+i+"' placeholder='Enter criterion for "+i+" point(s)'></textarea></td>"
                );
             }

                $("#btn-complete").click(function(){
                    let objects = {}

                    let viewCriteria = $("#view-criteria"); 
                    viewCriteria.empty();

                    for (let i = 1; i <= n; i++) {
                        let criterStatement = $("#criteria-statement"+ i).val();
                        objects[i] = criterStatement;

                        viewCriteria.append(
                            "<li class='center'><input type='text' name='points[]' style='width:10px' value='"+i+"' class='mr-4 for-review'><input type='text' class='for-review' name='criterion[]' value='"+criterStatement+"'></li>"
                        );
                    }
                    console.log(objects)      
                    $("#criteriaModal").fadeOut(300); 
                    $("#view-criteria").show(100);

                })
         }


      
     });
</script>
@stop
