<table class="table table-hover table-striped table-condensed" id="fee-info">
  <thead>
    <tr>
      <th>#</th>
      <th>Accountant</th>
      <th>Stu.ID</th>
      <th>Student Name</th>
      <th>Transacted Date</th>
      <th>Course Fee</th>
      <th>Discount</th>
      <th>Student Fee</th>
      <th>Paid Amount</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fees as $key => $fee)
        <tr>
          <td>{{++$key}}</td>
          <td>{{ $fee->name }}</td>
          <td>{{ $fee->student_id}}</td>
          <td>{{ $fee->first_name." ".$fee->last_name }}</td>
          <td>{{ $fee->transact_date}}</td>
          <td>{{number_format($fee->course_fee,2)}}Tk</td>
          <td>{{ $fee->discount}}%</td>
          <td>{{ number_format($fee->student_fee,2)}}Tk</td>
          <td>{{number_format($fee->paid,2)}}Tk</td>
        </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
   $(document).ready(function(){
       $('#fee-info').DataTable({
         dom: 'Bfrtip',
      buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
      ]
       });
   })
</script>
