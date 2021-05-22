@extends('layouts.default')
@section('title','首页')
@section('content')
    <div class="jumbotron welcome">
        <h1>欢迎来到网游后端管理系统</h1>
        <br>
        <br>
        <br>
        <p>
        <a class="btn btn-lg btn-primary" href="{{ route('login') }}" role="button">现在开始</a>
      </p>
    </div>
@stop