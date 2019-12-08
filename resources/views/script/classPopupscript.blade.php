<script type="text/javascript">
showClassInfo();
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

$('#show-class-info').on('click',function(e){
  e.preventDefault();
  $('#choose-academic').modal('show');
})

//===========
function showClassInfo()
{
  var data= $('#frm-view-class').serialize();
  $.get("{{route('showClassInformation')}}",data,function(data){
    $('#add-class-info').empty().append(data);
    $('td#hidden').addClass('hidden');
    $('th#hidden').addClass('hidden');

    MergeCommonRows($('#table-class-info'));
  })
}

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
