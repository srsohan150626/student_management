@extends('layouts.master')
@section('content')
@include('stylesheet.css-payment')
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="col-md-3">
      <form class="search-payment" action="{{route('showStudentPayment')}}" method="GET">
        <input type="text" name="student_id"  class="form-control" placeholder="Student ID">
      </form>
    </div>
    <div class="col-md-3">
      <label class="eng-name">Name: <b class="student-name"></b></label>
    </div>
    <div class="col-md-3">

    </div>
    <div class="col-md-3" style="text-align: right;">
      <label class="date-invoice">Date: <b>{{date('d-M-Y')}}</label>
    </div>
    <div class="col-md-3" style="text-align: right;">
      <label class="invoice-number">ReceiptNo:</label>
    </div>
  </div>

  <div class="panel-body">
    <table style="margin-top: -12px;">
      <caption class="academicDetail">

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
          <select id="AcademicID" name="AcademicID">
            <option value="">---------------------</option>
          </select>
        </td>

        <td>
          <input type="text" name="fee" id="Fee" readonly="true">
          <input type="hidden" name="fee_id"  id="FeeID">
          <input type="hidden" name="student_id"  id="StudentID">
          <input type="hidden" name="user_id"  id="UserID">
          <input type="hidden" name="transacdate"  id="TransacDate">
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
          <input type="text" name="balance" id="Balance">
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
            <input type="text" name="description" id="description">
          </td>

          <td colspan="4">
            <input type="text" name="remark" id="remark">
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="panel-footer" style="height:40px;"></div>

</div>
@endsection
