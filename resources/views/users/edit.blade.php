@extends('layouts.default')
@section('title', '編集ページ')
@section('content')

<p>{{$message}}</p>
<form class="form-horizontal" role="form" method="post" action="{{url('/users',$data->id)}}">
<input type="hidden" name="_token" value="{{csrf_token()}}">
{{-- 隠しフィールド --}}
<input type="hidden" name="_method" value="PATCH">


  <!--↓↓名前↓↓-->
  <div class="form-group">
    <label for="name" class="control-label col-sm-2">名前:</label>
    <div class="col-sm-10">
    <input type="text" name="name" value="{{ old('name', $data->name) }}" id="name" class="form-control" placeholder="名前を文字を入力してください" autofocus>
    @if($errors->has('name'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('name') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑名前↑↑-->


  <!--↓↓メールアドレス↓↓-->
  <div class="form-group">
    <label for="email" class="control-label col-sm-2">メールアドレス:</label>
    <div class="col-sm-10">
    <input type="email" name="mail" value="{{ old('mail', $data->mail) }}" id="email" class="form-control" placeholder="メールアドレスを入力してください" autofocus>
    @if($errors->has('mail'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('mail') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑メールアドレス↑↑-->


  <!--↓↓性別↓↓-->
  <div class="form-group"><!--※.horizontalではラジオボタンをform-groupで囲む-->
  <label class="control-label col-sm-2">性別</label>
  <div class="col-sm-10">
  <label class="radio-inline">
    <input type="radio" name="gender" value="男性" @if(old('gender',"$data->gender")!='女性')checked="checked"@endif>男性
  </label>
  <label class="radio-inline">
    <input type="radio" name="gender" value="女性" @if(old('gender',"$data->gender")=='女性')checked="checked"@endif>女性
  </label>
  <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑性別↑↑-->


  <!--↓↓年齢↓↓-->
  <div class="form-group">
    <label for="age" class="control-label col-sm-2">年齢:</label>
    <div class="col-sm-10">
    <input type="number" name="age" id="age" value="{{ old('age', $data->age) }}" class="form-control" placeholder="年齢を入力してください" autofocus>
    @if($errors->has('age'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('age') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑年齢↑↑-->


  <!--↓↓都道府県↓↓-->
  <div class="form-group">
    <label for="pref" class="control-label col-sm-2">都道府県:</label>
    <div class="col-sm-10">
    <select name="pref" id="pref" class="form-control">
      <option value="">都道府県の選択</option>
      <option value="北海道" @if( old('pref',"$data->pref")=='北海道') selected @endif>北海道</option>
      <option value="青森県" @if( old('pref',"$data->pref")=='青森県') selected @endif>青森県</option>
      <option value="岩手県" @if( old('pref',"$data->pref")=='岩手県') selected @endif>岩手県</option>
      <option value="宮城県" @if( old('pref',"$data->pref")=='宮城県') selected @endif>宮城県</option>
      <option value="秋田県" @if( old('pref',"$data->pref")=='秋田県') selected @endif>秋田県</option>
      <option value="山形県" @if( old('pref',"$data->pref")=='山形県') selected @endif>山形県</option>
      <option value="福島県" @if( old('pref',"$data->pref")=='福島県') selected @endif>福島県</option>
      <option value="東京都" @if( old('pref',"$data->pref")=='東京都') selected @endif>東京都</option>
      <option value="神奈川県" @if( old('pref',"$data->pref")=='神奈川県') selected @endif>神奈川県</option>
      <option value="埼玉県" @if( old('pref',"$data->pref")=='埼玉県') selected @endif>埼玉県</option>
      <option value="千葉県" @if( old('pref',"$data->pref") =='千葉県') selected @endif>千葉県</option>
      <option value="茨城県" @if( old('pref',"$data->pref") =='茨城県') selected @endif>茨城県</option>
      <option value="栃木県" @if( old('pref',"$data->pref") =='栃木県') selected @endif>栃木県</option>
      <option value="群馬県" @if( old('pref',"$data->pref") =='群馬県') selected @endif>群馬県</option>
      <option value="山梨県" @if( old('pref',"$data->pref") =='山梨県') selected @endif>山梨県</option>
      <option value="新潟県" @if( old('pref',"$data->pref") =='新潟県') selected @endif>新潟県</option>
      <option value="長野県" @if( old('pref',"$data->pref") =='長野県') selected @endif>長野県</option>
      <option value="富山県" @if( old('pref',"$data->pref") =='富山県') selected @endif>富山県</option>
      <option value="石川県" @if( old('pref',"$data->pref") =='石川県') selected @endif>石川県</option>
      <option value="福井県" @if( old('pref',"$data->pref") =='福井県') selected @endif>福井県</option>
      <option value="愛知県" @if( old('pref',"$data->pref") =='愛知県') selected @endif>愛知県</option>
      <option value="岐阜県" @if( old('pref',"$data->pref") =='岐阜県') selected @endif>岐阜県</option>
      <option value="静岡県" @if( old('pref',"$data->pref") =='静岡県') selected @endif>静岡県</option>
      <option value="三重県" @if( old('pref',"$data->pref") =='三重県') selected @endif>三重県</option>
      <option value="大阪府" @if( old('pref',"$data->pref") =='大阪府') selected @endif>大阪府</option>
      <option value="兵庫県" @if( old('pref',"$data->pref") =='兵庫県') selected @endif>兵庫県</option>
      <option value="京都府" @if( old('pref',"$data->pref") =='京都府') selected @endif>京都府</option>
      <option value="滋賀県" @if( old('pref',"$data->pref") =='滋賀県') selected @endif>滋賀県</option>
      <option value="奈良県" @if( old('pref',"$data->pref") =='奈良県') selected @endif>奈良県</option>
      <option value="和歌山県" @if( old('pref',"$data->pref") =='和歌山県') selected @endif>和歌山県</option>
      <option value="鳥取県" @if( old('pref',"$data->pref") =='鳥取県') selected @endif>鳥取県</option>
      <option value="島根県" @if( old('pref',"$data->pref") =='島根県') selected @endif>島根県</option>
      <option value="岡山県" @if( old('pref',"$data->pref") =='岡山県') selected @endif>岡山県</option>
      <option value="広島県" @if( old('pref',"$data->pref") =='広島県') selected @endif>広島県</option>
      <option value="山口県" @if( old('pref',"$data->pref") =='山口県') selected @endif>山口県</option>
      <option value="徳島県" @if( old('pref',"$data->pref") =='徳島県') selected @endif>徳島県</option>
      <option value="香川県" @if( old('pref',"$data->pref") =='香川県') selected @endif>香川県</option>
      <option value="愛媛県" @if( old('pref',"$data->pref") =='愛媛県') selected @endif>愛媛県</option>
      <option value="高知県" @if( old('pref',"$data->pref") =='高知県') selected @endif>高知県</option>
      <option value="福岡県" @if( old('pref',"$data->pref") =='福岡県') selected @endif>福岡県</option>
      <option value="佐賀県" @if( old('pref',"$data->pref") =='佐賀県') selected @endif>佐賀県</option>
      <option value="長崎県" @if( old('pref',"$data->pref") =='長崎県') selected @endif>長崎県</option>
      <option value="熊本県" @if( old('pref',"$data->pref") =='熊本県') selected @endif>熊本県</option>
      <option value="大分県" @if( old('pref',"$data->pref") =='大分県') selected @endif>大分県</option>
      <option value="宮崎県" @if( old('pref',"$data->pref") =='宮崎県') selected @endif>宮崎県</option>
      <option value="鹿児島県" @if( old('pref',"$data->pref") =='鹿児島県') selected @endif>鹿児島県</option>
      <option value="沖縄県" @if( old('pref',"$data->pref") =='沖縄県') selected @endif>沖縄県</option>
    </select>
    @if($errors->has('pref'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('pref') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑都道府県↑↑-->


  <!--↓↓生年月日↓↓-->
  <div class="form-group">
    <label for="birth" class="control-label col-sm-2">生年月日:</label>
    <div class="col-sm-10">
    <input type="date" name="birthday" id="birthday" value="{{ old('birthday',$data->birthday) }}" class="form-control" placeholder="生年月日を入力してください" autofocus>
    <p id="phone-help" class="help-block">記入例： 1937/12/26</p>
    @if($errors->has('birthday'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('birthday') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑生年月日↑↑-->


  <!--↓↓電話↓↓-->
  <div class="form-group">
    <label for="tel" class="control-label col-sm-2">電話:</label>
    <div class="col-sm-10">
    <input type="number" name="tel" id="tel" value="{{ old('tel',$data->tel) }}" class="form-control" placeholder="電話番号を入力してください" autofocus>
    <p id="phone-help" class="help-block">記入例： 09077557720</p>
    @if($errors->has('tel'))
     <p class="text-danger" style="margin-bottom: 30px;">{{ $errors->first('tel') }}</p>
    @endif
    <!--/.col-sm-10--></div>
  <!--/.form-group--></div>
  <!--↑↑電話↑↑-->


<button class="btn btn-lg btn-primary btn-block" type="submit">送信</button>
</form>
@endsection