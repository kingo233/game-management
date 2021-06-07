@extends('layouts.admin_default')
@section('page_name', '管理员权限管理')

@section('priority_manage','active')
@section('admin_management','active')

@section('path')
<li class="breadcrumb-item">管理员管理</li>
<li class="breadcrumb-item"><a href="#">权限管理</a></li>
@stop

@section('content')

<!-- modal box  -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">权限管理</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('users.update', $user->id )}}">
      @csrf
      <div class="modal-body">
        @include('shared._errors')

        <div class="form-group">
            <label for="name">编号：</label>
            <input type="text" name="id" class="form-control" id="id_input" value="" readonly />
          </div>
          <div class="form-group">
            <label for="name">名称：</label>
            <input type="text" name="name" class="form-control" id="name_input" value="" readonly />
          </div>
          <div class="form-group">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-control" id="email_input" value="" readonly />
          </div>

          <div class="form-group">
            <label for="priority">权限：</label>
            <input type="text" name="priority" class="form-control" id="priority_input" value="" >
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">修改</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') // Extract info from data-* attributes
  var email = button.data('email')
  var id = button.data('id')
  var url = button.data('tourl')
  var priority = button.data('priority')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#name_input').val(name)
  modal.find('#email_input').val(email)
  modal.find('#priority_input').val(priority)
  modal.find('#id_input').val(id)
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
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">用户编号</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">名称</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">邮箱</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">权限</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">管理</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($admins as $each)
                      @include('admins._admin_record')
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
                {!! $admins->render() !!}
            </div>
          </div>
      </div>
    </div>
  </div>

@stop