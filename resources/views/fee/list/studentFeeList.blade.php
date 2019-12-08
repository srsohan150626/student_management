<div class="panel panel-default" style="margin-top: -18px;">
  <div class="panel-heading">Pay List</div>
  <div class="panel-body">

    <div class="table-responsive">
      <table style="border-collapse:collapse;" class="table-hover table-bordered" id="list-student-fee">
        <thead>
          <tr>
            <th style="text-align: center;">N <sup>O</sup> </th>
            <th>Program</th>
            <th style="text-align:center;">Fee</th>
            <th style="text-align:center;">Amount</th>
            <th style="text-align:center;">Discount</th>
            <th style="text-align:center;">Paid</th>
            <th style="text-align:center;">Balance</th>
            <th style="text-align:center;">Action</th>
          </tr>
        </thead>
        <tbody id="tbody-student-fee">
          {{------------Test--------------}}
          @foreach($readStudentFee as $key=> $sf)
          <tr data-id="" id="sfeeId">
            <td style="text-align: center;">{{ $key+1 }}</td>
            <td style="text-align: center;">{{ $sf->program }}</td>
            <td style="text-align: center;">{{ number_format($sf->school_fee,2) }}</td>
            <td style="text-align: center;">{{ number_format($sf->student_amount,2) }}</td>
            <td style="text-align: center;">{{ $sf->discount }}%</td>
            <td style="text-align: center;">
               {{ number_format($sf->student_amount) }}
              <input type="hidden" name="b" id="b">
            </td>
            <td style="text-align: center;">
              {{number_format($readStudentTransaction->where('s_fee_id',$sf->s_fee_id)->sum('paid'),2)}}

            </td>

            <td style="text-align: center;width: 115px;">
              <a href="#" class="btn btn-success btn-xs btn-sfee-edit" data-id-update-student-fee="{{$sf->s_fee_id}}"
                 title="Edit"> <i class="fa fa-edit"></i>
              </a>
              <button type="button" class="btn btn-danger btn-xs btn-paid" value=" {{$sf->student_amount}}" id="{{$sf->s_fee_id}}">
                 <i class="fa fa-usd" title="Complete"></i>

              </button>
              <button class="btn btn-primary btn-xs accordion-toggle" data-toggle="collapse" data-target="#demo{{$key}}" title="Partial"> <span class="fa fa-eye"></span> </button>
            </td>
          </tr>
          <tr>
            <td colspan="9" class="hiddenRow">
              @include('fee.list.transactionList')
            </td>
          </tr>
          @endforeach
            {{------------End Test--------------}}

        </tbody>

      </table>

    </div>

  </div>
  <div class="panel-footer" style="height:40px;">

  </div>

</div>
