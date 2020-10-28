{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- admin.blade.phpの@yield('title')に'ニュース新規作成'を埋め込む --}}
@section('title','プロフィールの編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                      <ul>
                          @foreach($errors->all() as $e)
                          <li>{{ $e }}</li>
                        @endforeach
                      </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{$profile_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="content">コンテンツ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" row"20">{{ $profile_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="name" class="form control" name="name" value="{{$profile_form->name }}"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2" for="gender">性別</label>
                        <div class="col-sm-10">
                            <input type="gender" class="form control" name="gender" value="{{$profile_form->gender }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <input type="hobby" class="form control" name="hobby" value="{{$profile_form->hobby }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <input type="introduction" class="form control" name="introduction" value="{{$profile_form->introduction }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection