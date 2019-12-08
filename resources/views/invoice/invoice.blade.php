<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student invoice</title>
    <style type="text/css">
        html,body{
          padding: 0;
          margin: 0;
          width: 100%;
          background: #fff;
          font-family: Arial,'Sans Serif','Time News Romain';
          font-size: 10pt;
        }
        table{
          width: 700px;
          margin: 0 auto;
          text-align: left;
          border-collapse: collapse;
        }
        th{padding-left: 2px;}
        td{padding: 2px;}

        .aeu{
          text-align: right;
          padding-right: 10px;
          font-family: 'times new roman';
        }
        .line-top{
          border-left: 1px solid;
          padding-left: 10px;
          font-family: 'times new roman';
        }

        .verify{
          font-family: 'times new roman';
        }
        .imageAeu{width: 100px;height: 80px;}
        .th{
          background-color: #ddd;
          border: 1px solid;
          text-align: center;
        }

        .line-row{
          background-color: #fff;
          border: 1px solid;
          text-align: center;
        }

        #container{
          width: 100%;
          margin: 0 auto;
        }

        .khm-os{font-family: 'time news romain';}
        .divide{width: 100%;margin: 0 auto;}

        hr{
          width: 100%;
          margin-right: 0;
          margin-left: 0;
          padding: 0;
          margin-top: 35px;
          margin-bottom: 20px;
          border: 0 none;
          border-top: 1px dashed #322f32;
          background: none;
          height: 0;
        }

        button{
          margin: 0 auto;
          text-align: center;
          height: 100%;
          width: 100%;
          cursor: pointer;
          font-weight: bold;
        }

        .lengthth-limit{max-height: 350px;min-height: 350px;}

        .div-button{
          width: 100%;
          margin-top: 0px;
          height: 50px;
          text-align: center;
          margin-bottom: 10px;
          border-bottom: 1px solid;
          background: #ccc;
        }
    </style>
  </head>
  <body>
    <div class="div-button">
      <button onclick="printContent('divide')" >Print</button>
    </div>

    <div id="divide">
      <?php for($i=0;$i<2;$i++){ ?>
      <div id="container">
        <div class="lengthth-limit">
            {{---------------}}
            <table>
              <tr>
                <td style="padding-left:40px;width:50px;">
                  <img src="{{asset('logo/logo.png')}}" class="imageAeu" alt="">
                </td>

                <td class="aeu">

                  <b style="font-family: 'times new roman'">Prity Teaching Center</b>
                  <br>
                  <b>An IT School</b>
                </td>

                <td class="line-top">
                  <b style="font-family: 'times new roman'">Prity Teaching Center</b>
                  <br>
                  <b>RECEIPT</b>
                </td>
              </tr>
              <tr>

              </tr>
              <td colspan="2" style="text-align: right;"></td>
              <td colspan="0" style="text-align: right;padding-left:80px;">
                <b>Receipt No: {{sprintf("%05d",$invoice->receipt_id)}} </b>
              </td>
              <tr>
                <td colspan="2" style="text-align: right;"></td>
                <td colspan="0" style="text-align: right;padding-left:80px;">
                  <b>Date:</b> {{date('d-M-Y',strtotime($invoice->transact_date))}}
                </td>
              </tr>
            </table>
            {{-----------}}
            <table>
              <tr>
                <td style="width:120px;padding:5px 0px;">
                  StudentID: <b>{{sprintf("%05d",$invoice->student_id)}}</b>
                </td>
                <td style="width:200px;padding:5px 0px;">
                  First Name: <b>{{ $invoice->first_name }}</b>
                </td>
                <td style="width:200px;padding:5px 0px;">
                  Last Name: <b>{{ $invoice->last_name }}</b>
                </td>

                <td>Gender:
                  <b>
                    @if ($invoice->sex==0)
                      Male
                    @else
                      Female
                    @endif
                  </b>
                </td>
              </tr>
            </table>
            {{-----------}}
            <table>
              <thead>
                <tr>
                  <th class="th" style="text-align:left;">Description</th>
                  <th class="th" style="width:70px;">Fee</th>
                  <th class="th" style="width:70px;">Discount</th>
                  <th class="th" style="width:70px;">Amount</th>
                  <th class="th" style="width:70px;">Pay</th>
                  <th class="th" style="width:70px;">Lack Balance</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                <td class="line-row" style="text-align:left;">
                    Laravel/ Shift-Morning/Time-07:30AM-11:30AM/
                   Batch:Summer/Group:A/Academic-2019-2020/
                   StartDate:2019-05-03/EndDate: 2019-07-03

                </td>

                  <td class="line-row">
                    {{number_format($invoice->school_fee,2)}}
                  </td>
                  <td class="line-row">
                    {{$studentFee->discount}}%
                  </td>
                  <td class="line-row">
                     {{number_format($studentFee->amount,2)}}
                  </td>
                  <td class="line-row">
                    {{number_format($invoice->paid,2)}}
                  </td>
                  <td class="line-row">
                     {{number_format($studentFee->amount-$totalPaid,2)}}
                  </td>
                </tr>
              </tbody>
            </table>

            {{-----------}}
            <table>
              <tr>
                <td>
                  <b class="verify">Note:</b>
                  <p style="display: inline-block">
                    All payments are not refundable or transferable
                  </p>
                </td>
                <td>
                  <b style="margin-bottom: 5px;">Cashier: {{$invoice->name}}</b>
                  <br><br>
                  Printed: {{date('d-M-Y g:i:s A')}}
                </td>
                <td style="vertical-align:top; ">
                  Printed By: {{ Auth::user()->name }}
                </td>
              </tr>
            </table>
        </div>
        <br><br>
        {{-----------}}
        <table>
          <tr>
            <td style="font-sizeL 10pt;text-align: center;">
              Pabna sadar, Pabna
            </td>
          </tr>
          <tr>
            <td style="font-sizeL 10pt;text-align: center;">
            <b>Mobile:</b> 01838733337
            <br>
            <b>Email:</b>pritypustice05@gmail.com
            </td>
          </tr>
        </table>
      </div>
      @if($i==0)
        <br>
        <hr>
      @endif
    <?php } ?>
    </div>
    {{--------------}}
    <script type="text/javascript">
        function printContent(el){
          var restorepage = document.body.innerHTML;
          var printcontent= document.getElementById(el).innerHTML;
          document.body.innerHTML = printcontent;
          window.print();
          document.body.innerHTML = restorepage;
          window.close();
        }
    </script>
  </body>
</html>
