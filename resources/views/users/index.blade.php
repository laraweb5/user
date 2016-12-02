@extends('layouts.default')
@section('title', '一覧表示')
@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert" onclick="this.classList.add('hidden')">
{{ session('status') }}
@if (session('status'))<p>{{session('message')}}</p>@endif
</div>
@endif

<div class="container-fluid">
<div class="row">

<!--↓↓ 検索フォーム ↓↓-->
<div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
<form method="get" class="form-inline" action="{{url('/users')}}">
  <div class="form-group">
    <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="名前を入力してください">
  </div>
   <input type="submit" value="検索" class="btn btn-info">
</form>
</div>
<!--↑↑ 検索フォーム ↑↑-->

<div class="col-sm-8" style="text-align:right;">
  <div class="paginate">
    {{ $data->appends(Request::only('keyword'))->links() }}
  </div>
</div>

<!--/.row--></div>
<!--/.container-fluid--></div>

<table class="table table-striped">
  <!-- loop -->
  @foreach($data as $val)
      <tr>
          <td><a href="{{ action('UsersController@show', $val->id) }}">{{$val->name}}</a></td>
          <td>{{$val->mail}}</td>
          <td><a href="{{ action('UsersController@edit', $val->id) }}" class="btn btn-primary btn-sm">編集</a></td>
          <td>
          <form action="{{ action('UsersController@destroy', $val->id) }}" id="form_{{ $val->id }}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <a href="#" data-id="{{ $val->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
          </form>
         </td>
      </tr>
  @endforeach
</table>

<div class="col-sm-4" style="padding-left:0px;"></div>
<div class="col-sm-8" style="text-align:right;">
  <div class="paginate">
    {{ $data->appends(Request::only('keyword'))->links() }}
  </div>
</div>


<!--
/************************************

削除ボタンを押してすぐにレコードが削除
されるのも問題なので、一旦javascriptで
確認メッセージを流します。

*************************************/
//-->
<script>
function deletePost(e) {
  'use strict';

  if (confirm('本当に削除していいですか?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>

@endsection