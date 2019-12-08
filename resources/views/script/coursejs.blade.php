
<script>
showClassInfo($('#academic_id').val());
  $('#start_date').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat: 'yy-mm-dd'
  });
  $('#end_date').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat: 'yy-mm-dd'

  });
  //=======================
  $('#academic_id').on('change',function(e){
    showClassInfo();
  })
  //=======================
  $('#shift_id').on('change',function(e){
    showClassInfo();
  })
  //=======================
  $('#time_id').on('change',function(e){
    showClassInfo();
  })
  //=======================
  $('#group_id').on('change',function(e){
    showClassInfo();
  })

  function showClassInfo()
  {
    var data= $('#frm-create-class').serialize();
    $.get("{{route('showClassInformation')}}",data,function(data){
      $('#add-class-info').empty().append(data);
      MergeCommonRows($('#table-class-info'));
    })
  }

  $('#frm-create-course').on('submit',function(e){
    e.preventDefault();
    var data=$(this).serialize();
    var url= $(this).attr('action');
    $.post(url,data,function(data){

    showClassInfo(data.academic_id);
    })
    $(this).trigger('reset');
  })
  //update class
  $('.btn-update-class').on('click',function(e){
    e.preventDefault();
    var data=$('#frm-create-course').serialize();
    $.post("{{ route('updateClassInfo') }}",data,function(data){
      showClassInfo(data.academic_id);
    })


  })
  $(document).on('click','#class-edit',function(data){
    var class_id=$(this).data('id');
    $.get("{{route('editClass')}}",{class_id:class_id},function(data){
      $('#academic_id').val(data.academic_id);
      $('#program_id').val(data.program_id);
      $('#shift_id').val(data.shift_id);
      $('#time_id').val(data.time_id);
      $('#batch_id').val(data.batch_id);
      $('#group_id').val(data.group_id);
      $('#start_date').val(data.start_date);
      $('#end_date').val(data.end_date);
      $('#class_id').val(data.class_id);
    })
  })
  //delete class
  $(document).on('click','.del-class',function(e){
    class_id=$(this).val();
    $.post("{{route('deleteClass')}}",{class_id:class_id},function(data){
        showClassInfo($('#academic_id').val());
    })
  })




  //=====

  $('#add-more-academic').on('click',function(){
    $('#academic-year-show').modal();
  })

  $('.btn-save-academic').on('click',function(){
    var academic=$('#new-academic').val();
    $.post("{{route('postInsertAcademic')}}",{academic:academic},function(data){

       $('#academic_id').append($("<option/>",{
         value : data.academic_id,
         text :  data.academic
      }))
      $('#new-academic').val("");
    })
  })
//==========program
$('#add-more-program').on('click',function(e){

 $('#program-show').modal();
  })

  $('.btn-save-program').on('click',function(){

   var program= $('#program').val();
   var description=$('#description').val();

   $.post("{{route('PostInsertProgram')}}",{program:program,description:description},function(data){

    $('#program_id').append($("<option/>",{
         value : data.program_id,
         text :  data.program
      }))
      $('#program').val("");
      $('#description').val("");
   })
})
//==========shift
$('#frm-shift-create').on('submit',function(e){
   e.preventDefault();
   var data= $(this).serialize();
   var shift=$('#shift_id');
   $.post("{{route('createShift')}}",data,function(data){
     $(shift).append($("<option/>",{
       value : data.shift_id,
       text :  data.shift
    }))

   })
 })
 $('#add-more-shift').on('click',function(){
   $('#shift-show').modal('show');
 })

 //time
 $('#frm-time-create').on('submit',function(e){
    e.preventDefault();
    var data= $(this).serialize();

    $.post("{{route('createTime')}}",data,function(data){
      $('#time_id').append($("<option/>",{
        value : data.time_id,
        text :  data.time
     }))

    })
    $(this).trigger('reset');
  })
  $('#add-more-time').on('click',function(e){
    $('#time-show').modal('show');
  })

 //batch
 $('#frm-batch-create').on('submit',function(e){
    e.preventDefault();
    var data= $(this).serialize();
    $.post("{{route('createBatch')}}",data,function(data){
      $('#batch_id').append($("<option/>",{
        value : data.batch_id,
        text :  data.batch
     }))

    })
    $(this).trigger('reset');
  })
  $('#add-more-batch').on('click',function(e){
    $('#batch-show').modal('show');
  })

 //group
 $('#frm-group-create').on('submit',function(e){
    e.preventDefault();
    var data= $(this).serialize();
    $.post("{{route('createGroup')}}",data,function(data){
      $('#group_id').append($("<option/>",{
        value : data.group_id,
        text :  data.groups
     }))

    })
    $(this).trigger('reset');
  })
  $('#add-more-group').on('click',function(e){
    $('#group-show').modal('show');
  })

  //merge cell class
  function MergeCommonRows(table){
    var firstColumnBrakes=[];
    $.each(table.find('th'),function(i){
      var previous=null,cellToExtend=null,rowspan=1;
      table.find("td:nth-child(" + i + ")").each(function(index,e){
        var jthis = $(this),content = jthis.text();
        if(previous == content && content!== "" && $.inArray(index, firstColumnBrakes)=== -1) {
          jthis.addClass('hidden');
          cellToExtend.attr("rowspan",(rowspan==rowspan+1));
        }else {
          if(i === 1) firstColumnBrakes.push(index);
          rowspan = 1;
          previous = content;
          cellToExtend = jthis;

        }
      });
    });
    $('td.hidden').remove();
  }
</script>
