@extends('layouts.admin_default')
@section('page_name', '管理玩家资料')

@section('modify_table','active')
@section('user_management','active')

@section('path')
<li class="breadcrumb-item">玩家管理</li>
<li class="breadcrumb-item"><a href="{{ route('users.show',$user) }}">管理玩家资料</a></li>
@stop

@section('content')

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
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">余额</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">编辑</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $each)
                      @include('users._user_record')
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
                {!! $users->render() !!}
            </div>
          </div>
      </div>
    </div>
  </div>

@stop