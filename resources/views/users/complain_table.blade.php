@extends('layouts.admin_default')
@section('page_name', '处理申诉')

@section('complain_table','active')
@section('user_management','active')

@section('path')
<li class="breadcrumb-item">玩家管理</li>
<li class="breadcrumb-item"><a href="#">处理申诉</a></li>
@stop

@section('content')

<!-- modal box  -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">处理申诉</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="#">
      @csrf
      <div class="modal-body">
        @include('shared._errors')

          <div class="form-group">
            <label for="name">封禁编号:</label>
            <input type="text" name="id" class="form-control" id="id_input" value="" readonly>
          </div>
          <div class="form-group">
            <label for="email">用户编号：</label>
            <input type="text" name="uid" class="form-control" id="uid_input" value="" readonly>
          </div>

          <div class="form-group">
            <label for="password">封禁理由：</label>
            <textarea name="reason" class="form-control" id="reason_input" readonly></textarea>
          </div>

          <div class="form-group">
            <label for="password">申诉理由：</label>
            <textarea name="complain" class="form-control" id="complain_input" readonly></textarea>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="cancel" id="inlineRadio1" value="cancel">
            <label class="form-check-label" for="inlineRadio1">解除封禁</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="cancel" id="inlineRadio2" value="remain">
            <label class="form-check-label" for="inlineRadio2">保持封禁</label>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">提交</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var uid = button.data('uid')
  var reason = button.data('reason')
  var complain = button.data('complain')
  var url = button.data('tourl')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#id_input').val(id)
  modal.find('#uid_input').val(uid)
  modal.find('#reason_input').val(reason)
  modal.find('#complain_input').val(complain)
  var form = $('form')
  form.attr("action",url)
})
</script>
<!-- table-->
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">封禁编号</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">用户编号</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">处理</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($complains as $each)
                      @include('users._user_complain')
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
                {!! $complains->render() !!}
            </div>
          </div>
      </div>
    </div>
  </div>

@stop