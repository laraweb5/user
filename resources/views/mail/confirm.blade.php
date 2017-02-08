@extends('layouts.default_mail')
@section('title', 'お問い合わせフォーム')
@section('content')
<form class="form-horizontal" role="form" method="post" action="{{url('mail/complete')}}">
<input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策--}}

<table class="table table-striped">
  <tr>
    <th>件名</th>
    <td>{{$data["title"]}}</td>
   </tr>

  <tr>
    <th>メールアドレス</th>
    <td>{{$data["email"]}}</td>
  </tr>

  <tr>
    <th>性別</th>
    <td>{{$data["body"]}}</td>
  </tr>

</table>


<button class="btn btn-lg btn-primary btn-block" type="submit">送信</button>
</form>
@endsection