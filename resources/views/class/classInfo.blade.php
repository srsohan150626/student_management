<style type="text/css">
  .academic-details{
    white-space: normal;
    width: 400px;
  }
  #table-class-info{
    width: 100%;
  }
  table tbody > tr >td {
    vertical-align: middle;
  }
</style>
<table class="table-hover table-striped table-condensed" id="table-class-info">
  <thead>
    <tr>
      <th>Programs</th>
      <th>Shift</th>
      <th>Time</th>
      <th>Academic Details</th>
      <th hidden="hidden">Action</th>
      <th>
        <input type="checkbox" id="checkall">
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach($classes as $key=>$c)
    <tr>

      <td>{{$c->program}}</td>
      <td>{{$c->shift}}</td>
      <td>{{$c->time}}</td>
      <td class="academic-details">
        <a href="#" data-id="{{$c->class_id}}" id="class-edit">
          Program:{{$c->program}} / Shift: {{$c->shift}}/
          Time:{{$c->time}} / Batch:{{$c->batch}} /Group:{{$c->groups}}   /StartDate:{{
         date("d-M-y",strtotime($c->start_date))}} /EndDate:{{
        date("d-M-y",strtotime($c->end_date))}}
        </a>
      </td>
      <td style="vertical-align:middle;width:50px" id="hidden">
        <button value="{{$c->class_id}}" class="btn btn-danger btn-sm del-class">Delete</button>
      </td>
      <td>
        <input type="checkbox" name="chk[]" value="{{ $c->class_id }}" class="chk">
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
