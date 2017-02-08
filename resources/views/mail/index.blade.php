@extends('layouts.default_mail')
@section('title', 'お問い合わせフォーム')
@section('content')


<form class="form-horizontal" role="form" method="post" action="{{url('mail')}}">
<input type="hidden" name="_token" value="{{csrf_token()}}">{{-- CSRF対策--}}


  <!--↓↓件名↓↓-->
  <div class="form-group">
    <label for="name" class="control-label col-sm-2">件名:</label>
    <div class="col-sm-10">
    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="件名を入力してください" autofocus>
    @if($errors->has('title'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('title') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑件名↑↑-->


  <!--↓↓メールアドレス↓↓-->
  <div class="form-group">
    <label for="email" class="control-label col-sm-2">メールアドレス:</label>
    <div class="col-sm-10">
    <input type="email" name="email" id="email" class="form-control" placeholder="メールアドレスを入力してください" value="{{ old('email') }}" autofocus>
    @if($errors->has('email'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('email') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑メールアドレス↑↑-->


  <!--↓↓本文↓↓-->
  <div class="form-group">
    <label for="tel" class="control-label col-sm-2">本文:</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="body" id="body" rows="3" placeholder="お問い合わせ内容を入力してください" autofocus>{{ old('body') }}</textarea>
    <!--<p id="phone-help" class="help-block">ハイフン"-"なしで数字だけ入力してください (例 09077557720)</p>-->
    @if($errors->has('body'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('body') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑本文↑↑-->


<button class="btn btn-lg btn-primary btn-block" type="submit">確認</button>
</form>
@endsection