@extends('layouts.sidebar')

@section('content')
<div class="vh-100 border" >
  <p class="p-3" ><span>{{ $user->over_name }}</span><span>{{ $user->under_name }}さんのプロフィール</span></p>
  <div class="top_area w-75 m-auto pt-5">
    <div class="user_status p-3" style="box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
      <p>名前 : <span>{{ $user->over_name }}</span><span class="ml-1">{{ $user->under_name }}</span></p>
      <p>カナ : <span>{{ $user->over_name_kana }}</span><span class="ml-1">{{ $user->under_name_kana }}</span></p>
      <p>性別 : @if($user->sex == 1)<span>男</span>@else<span>女</span>@endif</p>
      <p>生年月日 : <span>{{ $user->birth_day }}</span></p>
      <p>選択科目 :
        @foreach($user->subjects as $subject)
        <span>{{ $subject->subject }}</span>
        @endforeach
      </p>
      <div class="subject_edit">
        @can('admin')
        <p class="subject_edit_btn" style="color: #03AAD2;">選択科目の編集</p>
        <div class="subject_inner" >
          <form class="d-flex" action="{{ route('user.edit') }}" method="post">
            @foreach($subject_lists as $subject_list)
            <div>
              <label> {{ $subject_list->subject }}</label>
            </div>
            <div class="mr-2">
              <input type="checkbox" name="subjects[]" value="{{ $subject_list->id }}">
            </div>
            @endforeach
            <input type="submit" value="登録" class="btn btn-primary btn-sm" style="">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            {{ csrf_field() }}
          </form>
        </div>
        @endcan
      </div>
    </div>
  </div>
</div>

@endsection
