@extends('layouts.default')
@section('title', '一覧表示')
@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert" onclick="this.classList.add('hidden')">
{{ session('status') }}
@if (session('status'))<p>{{session('message')}}</p>@endif
</div>
@endif

<div class="paginate">
{{ $data->links() }}
</div>

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

<div class="paginate">
{{ $data->links() }}
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