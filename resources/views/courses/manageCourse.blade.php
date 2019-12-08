@extends('layouts.master')
@section('content')
@include('courses.popup.academic')
@include('courses.popup.program')
@include('courses.popup.shift')
@include('courses.popup.time')
@include('courses.popup.batch')
@include('courses.popup.group')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i>Courses</h3>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
        <li><i class="icon_document_alt"></i>Courses</li>
        <li><i class="fa fa-home"></i>Manage Course</li>
        </ol>
    </div>
</div>

<div class="row">
<div class="col-lg-12">
        <section class="panel panel-default">
         <header class="panel-heading">
            Manage Course
         </header>
        <form action="{{route('createCourse')}}" class="form-horizontal" id="frm-create-course" method="post">
          @csrf
          <input type="hidden" name="active" id="active" value="1">
          <input type="hidden" name="class_id" id="class_id">
         <div class="panel-body" style="border-botom: 1px solid #ccc;">
             <div class="form-group">
                <div class="col-sm-3">
                    <label for="academic-year">Academic Year</label>
                    <div class="input-group">
                        <select class="form-control" name="academic_id" id="academic_id">

                           @foreach($academics as $key => $y)
                            <option value="{{$y->academic_id}}">{{$y->academic}}</option>
                           @endforeach
                        </select>
                     <div class="input-group-addon">
                        <span class="fa fa-plus" id="add-more-academic"></span>
                     </div>
                    </div>
               </div>

                {{----------------------------}}
               <div class="col-sm-3">
                    <label for="program">Course</label>
                 <div class="input-group">
                        <select class="form-control" name="program_id" id="program_id">
                           @foreach($programs as $key => $p)
                            <option value="{{$p->program_id}}">{{$p->program}}</option>
                           @endforeach
                        </select>
                     <div class="input-group-addon">
                        <span class="fa fa-plus" id="add-more-program"></span>
                     </div>
                 </div>
               </div>


               {{----------------------------}}
               <div class="col-sm-3">
                    <label for="shift">Shift</label>
                 <div class="input-group">
                        <select class="form-control" name="shift_id" id="shift_id">
                          @foreach($shift as $key => $s)
                           <option value="{{$s->shift_id}}">{{$s->shift}}</option>
                          @endforeach
                        </select>
                     <div class="input-group-addon">
                        <span class="fa fa-plus" id="add-more-shift"></span>
                     </div>
                 </div>
               </div>

               {{----------------------------}}
               <div class="col-sm-3">
                    <label for="time">Time</label>
                 <div class="input-group">
                        <select class="form-control" name="time_id" id="time_id">
                          @foreach($time as $key => $t)
                           <option value="{{$t->time_id}}">{{$t->time}}</option>
                          @endforeach
                        </select>
                     <div class="input-group-addon">
                        <span class="fa fa-plus" id="add-more-time"></span>
                     </div>
                 </div>
               </div>

               {{----------------------------}}
               <div class="col-sm-3">
                    <label for="batch">Batch</label>
                 <div class="input-group">
                        <select class="form-control" name="batch_id" id="batch_id">
                          @foreach($batch as $key => $b)
                           <option value="{{$b->batch_id}}">{{$b->batch}}</option>
                          @endforeach
                        </select>
                     <div class="input-group-addon">
                        <span class="fa fa-plus" id="add-more-batch"></span>
                     </div>
                 </div>
               </div>

               {{----------------------------}}
               <div class="col-sm-2">
                    <label for="group">Group</label>
                 <div class="input-group">
                        <select class="form-control" name="group_id" id="group_id">
                          @foreach($group as $key => $g)
                           <option value="{{$g->group_id}}">{{$g->groups}}</option>
                          @endforeach
                        </select>
                     <div class="input-group-addon">
                        <span class="fa fa-plus" id="add-more-group"></span>
                     </div>
                 </div>
               </div>

               {{----------------------------}}
               <div class="col-sm-3">
                    <label for="startDate">Start Date</label>
                 <div class="input-group">
                       <input type="text" name="start_date" id="start_date" class="form-control" required>
                     <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                     </div>
                 </div>
               </div>

               {{----------------------------}}
               <div class="col-sm-3">
                    <label for="endDate">End Date</label>
                 <div class="input-group">
                       <input type="text" name="end_date" id="end_date" class="form-control" required>
                     <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                     </div>
                 </div>
               </div>
         </div>
        </div>
         <div class="panel-footer">
            <button type="submit" class="btn btn-success">Create Course</button>
            <button type="button" class="btn btn-primary  btn-update-class">Update Course</button>
         </div>
        </form>
        {{------------------}}
        <div class="panel panel-default">
          <div class="panel-heading">
            Class Infromation
          </div>
          <div class="panel-body" id="add-class-info">

          </div>
        </div>
        </section>
    </div>
</div>

@endsection

@section('script')
@include('script.coursejs');

@endsection
