@extends('layouts.admin_default')
@section('page_name', '查看充值记录')

@section('charge_history','active')

@section('path')
<li class="breadcrumb-item">个人信息管理</li>
<li class="breadcrumb-item"><a href="{{ route('charge_history',$user) }}">充值记录</a></li>
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
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">编号</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">金额</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">时间</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $each)
                      @include('users._charge_record')
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
                {!! $data->render() !!}
            </div>
          </div>
      </div>
    </div>
  </div>
@stop