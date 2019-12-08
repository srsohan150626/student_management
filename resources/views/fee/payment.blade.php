@extends('layouts.master')
@section('content')
@include('stylesheet.css-payment')
@include('fee.createFee')
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="col-md-3">
      <form class="search-payment" action="{{route('showStudentPayment')}}" method="GET">
        <input type="text" name="student_id" value="{{$student_id}}" class="form-control" placeholder="Student ID">
      </form>
    </div>
    <div class="col-md-3">
      <label class="eng-name">Name: <b class="student-name">{{$status->first_name." ".$status->last_name}}</b></label>
    </div>
    <div class="col-md-3">

    </div>
    <div class="col-md-3" style="text-align: right;">
      <label class="date-invoice">Date: <b>{{date('d-M-Y')}}</label>
    </div>
    <div class="col-md-3" style="text-align: right;">
      <label class="invoice-number">ReceiptNo:<b>{{ sprintf('%05d',$receipt_id) }}</b></label>
    </div>
  </div>
  <form action="{{route('savePayment')}}" method="post" id="frmPayment">
    @csrf
  <div class="panel-body">
    <table style="margin-top: -12px;">
      <caption class="academicDetail">
        {{$status->program}}/
        Shift: {{$status->shift}} /
        Time: {{$status->time}} /
        Batch: {{$status->batch}} /
        Group: {{$status->groups}}
      </caption>
      <thead>
        <tr>
          <th>Program</th>
          <th>School Fee($)</th>
          <th>Amount($)</th>
          <th>Discount(%)</th>
          <th>Paid($)</th>
          <th>Amount Lack($)</th>
        </tr>
      </thead>
      <tr>
        <td>
          <select id="program_id" name="program_id">
            <option value="">---------------------</option>
            @foreach($programs as $key => $p)
              <option value="{{$p->program_id}}" {{$p->program_id==$status->program_id ? 'selected' : null}}>{{$p->program}}</option>
            @endforeach
          </select>
        </td>

        <td>
          <div class="input-group">
            <span class="input-group-addon create-fee" title="create fee" style="cursor: pointer;
            color: blue; padding: 0px 3px; border-right:none; ">($)</span>

          <input type="text" name="fee" value="{{isset($studentfee->amount) ? $studentfee->amount :''}}" id="Fee" readonly="true">
          </div>
          <input type="hidden" name="fee_id" value="{{isset($studentfee->fee_id) ? $studentfee->fee_id :''}}"  id="FeeID">
          <input type="hidden" name="student_id" value="{{$student_id}}" id="StudentID">
          <input type="hidden" name="user_id" value="{{Auth::id()}}"  id="UserID">
          <input type="hidden" name="transact_date" value="{{date('Y-m-d H:i:s')}}" id="TransacDate">
          <input type="hidden" name="s_fee_id" id="s_fee_id">
        </td>

        <td>
          <input type="text" name="amount" id="Amount" required>
        </td>

        <td>
          <input type="text" name="discount" id="Discount">
        </td>

        <td>
          <input type="text" name="paid" id="Paid">
        </td>

        <td>
          <input type="text" name="lack" id="Lack" disabled>
        </td>
      </tr>

      <thead>
        <tr>
          <th colspan="2">Remark</th>
          <th colspan="4">Description</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td colspan="2">
            <input type="text" name="remark" id="remark">
          </td>

          <td colspan="4">
            <input type="text" name="description" id="description">
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="panel-footer">
    <input type="submit" name="btn-go" id="btn-go" class="btn btn-success btn-payment">
    @if(count($readStudentFee)!=0)
      <a href="{{route('printInvoice',$receipt_id)}}" class="btn btn-default" target="_blank" title="print"> <i class="fa fa-print"></i> </a>
    @endif
    <input type="button" onclick="this.form.reset()" class="btn btn-success btn-reset pull-right" value="Reset">
  </div>
</form>

@if(count($readStudentFee)!=0)
@include('fee.list.studentFeeList')
@endif

</div>
@endsection

@section('script')
  @include('script.calculatefee')
  @include('script.paymentjs')
@endsection
