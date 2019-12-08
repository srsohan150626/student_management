<div class="modal fade" id="choose-academic" role="dialog">
  <div class="modal-dialog modal-x5">
    <section class="panel panel-default">
     <header class="panel-heading">
        Choose Academic
     </header>
    <form action="" class="form-horizontal" id="frm-view-course" method="post">
      @csrf
     <div class="panel-body" style="border-botom: 1px solid #ccc;">
         <div class="form-group">
            <div class="col-sm-6">
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
           <div class="col-sm-6">
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
           <div class="col-sm-6">
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
           <div class="col-sm-6">
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
           <div class="col-sm-3">
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


           {{----------------------------}}

     </div>
    </div>

    </form>
    {{------------------}}
    <form action="index.html" method="get" id="frm-multi-class">
      <div class="panel panel-default">
        <div class="panel-heading">
          Class Infromation
          <button type="button" id="btn-go" class="btn btn-info btn-xs pull-right" style="margin-top:5px">Go</button>
        </div>
        <div class="panel-body" id="add-class-info" style="overflow-y:auto;height:250px;">

        </div>
      </div>
    </form>

    </section>
  </div>
</div>
