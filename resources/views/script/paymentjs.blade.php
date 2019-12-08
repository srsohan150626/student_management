<script type="text/javascript">
  $('.create-fee').on('click',function(e){
    $('#createFeePopup').modal('show')
  });

  //create fee
  $('#frmFee').on('submit',function(e){
    e.preventDefault();
    enableFormElement(this);
    var data= $(this).serialize();
    var url= $(this).attr('action');
    $.post(url,data,function(data){
        location.reload();
    })

  })

  //enable form element
  function enableFormElement(frmName)
  {
    $.each($(frmName).find('input,select'),function(i,element){
      $(element).attr('disabled',false);
    })
  }

  // //===========
  $('.btn-paid').on('click',function(e){
    e.preventDefault();
    s_fee_id = $(this).data('id');
    balance= $(this).val();
     $.get("{{route('pay')}}",{s_fee_id:s_fee_id},function(data){
          $('#program_id').val(data.program_id);
          showStudentProgram(data);
          })
  })

  function showStudentProgram(data)
  {
    $.get("{{route('showProgramStudent')}}",{program_id:data.program_id,student_id:data.student_id},function(data){
           console.log(data);
         })
  }

  $('.btn-reset').on('click',function(e){
    e.preventDefault();
    var caption = $(this).val();
    if(caption=="Reset")
    {
      $(this).val('Cancel');
      $('#btn-go').val('Save');
      $('#Pay').attr('id','Paid');
      $('#frmPayment').attr('action',"{{route('savePayment')}}");
      enableFormElement('#frmPayment');
      return;
    }
    location.reload();
  })
</script>
