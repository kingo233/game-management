@extends('layouts.admin_default')
@section('page_name', '管理武器数据')

@section('weapon_manage','active')
@section('virtual_data_management','active')

@section('path')
<li class="breadcrumb-item">虚拟数据管理</li>
<li class="breadcrumb-item"><a href="#">管理武器数据</a></li>
@stop

@section('content')

<!-- modal box  -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">编辑数据</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="#">
      @csrf

      <div class="modal-body">
        @include('shared._errors')

          <div class="form-group">
            <label for="name">名称：</label>
            <input type="text" name="name" class="form-control" id="name_input" value="">
          </div>
          <div class="form-group">
            <label for="email">攻击力：</label>
            <input type="text" name="attack" class="form-control" id="attack_input" value="">
          </div>

          <div class="form-group">
            <label for="defend">防御力：</label>
            <input type="text" name="defend" class="form-control" id="defend_input" value="">
          </div>

          <div class="form-group">
            <label for="critical_hit">暴击率：</label>
            <input type="text" name="critical_hit" class="form-control" id="critical_hit_input" value="">
          </div>

          <div class="form-group">
            <label for="critical_damage">暴击伤害：</label>
            <input type="text" name="critical_damage" class="form-control" id="critical_damage_input" value="">
          </div>

          <div class="form-group">
            <label for="critical_damage">技能：</label>
            <textarea name="skill" class="form-control" id="skill_input"></textarea>
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
  var attack = button.data('attack')
  var id = button.data('id')
  var defend = button.data('defend')
  var critical_hit = button.data('critical_hit')
  var critical_damage = button.data('critical_damage')
  var skill = button.data('skill')
  var url = button.data('tourl')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#name_input').val(name)
  modal.find('#attack_input').val(attack)
  modal.find('#defend_input').val(defend)
  modal.find('#critical_hit_input').val(critical_hit)
  modal.find('#critical_damage_input').val(critical_damage)
  modal.find('#skill_input').text(skill)
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
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">名称</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">攻击力</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">防御力</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">暴击率</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">暴击伤害</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">编辑</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($weapons as $each)
                      @include('weapons._weapon_record')
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
                {!! $weapons->render() !!}
            </div>
          </div>
      </div>
    </div>
  </div>

@stop