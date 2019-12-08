<div class="modal fade" id="time-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">New Time </h4>
      </div>
      <form action="{{{route('createTime')}}}" method="POST" id="frm-time-create">
      <div class="modal-body">


        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="time" id="time" class="form-control" placeholder="shift">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
