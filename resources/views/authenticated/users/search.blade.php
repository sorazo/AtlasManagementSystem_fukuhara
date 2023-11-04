@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 d-flex">
  <div class="reserve_users_area w-75 mt-5">
    @foreach($users as $user)
    <div class="p-4 one_person">
      <div class="mb-3">
        <span style="color: #999;">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div>
        <span style="color: #999;">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}" style="color:#03AAD2;">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div class="mb-2">
        <span style="color: #999;">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div class="mb-2">
        @if($user->sex == 1)
        <span style="color: #999;">性別 : </span><span>男</span>
        @else
        <span style="color: #999;">性別 : </span><span>女</span>
        @endif
      </div>
      <div class="mb-3">
        <span style="color: #999;">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span style="color: #999;">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span style="color: #999;">権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span style="color: #999;">権限 : </span><span>講師(英語)</span>
        @else
        <span style="color: #999;">権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span style="color: #999;">選択科目 :</span><span>
           @foreach($user->subjects as $subject) {{ $subject->subject }}  @endforeach</span>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area  mt-5">
    <h5 class="mt-5" style="color:#005FFF; margin-bottom:20px;">検索</h5>
    <div style="padding-left:10px;">
    <div>
      <div class="mb-4">
        <input type="text" class="w-100 free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="mb-3">
        <label style="color:#005FFF;">カテゴリ</label>
        <div>
        <select class="select_word" style="width: 90px;" form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
        </div>
      </div>
      <div class="mb-4">
        <label style="color:#005FFF;">並び替え</label>
        <div>
        <select class="select_word" style="width: 90px;" name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
        </div>
      </div>
      <div class="mb-4" style="padding-left:20px;">
        <p class="m-0 pb-1 search_conditions" style="color:#005FFF;"><span>検索条件の追加</span></p>
        <div class="search_conditions_inner">
          <div class="my-3">
            <label style="color:#005FFF;">性別</label>
            <div class="b-flex">
            <span>男 </span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女 </span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他 </span><input type="radio" name="sex" value="3" form="userSearchRequest">
            </div>
          </div>
          <div class="my-3">
            <label style="color:#005FFF;">権限</label>
            <div>
            <select name="role" form="userSearchRequest" class="engineer" style="width: 120px;">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
            </div>
          </div>
          <div class="mb-5 selected_engineer">
            <label style="color:#005FFF;">選択科目</label>
            <div class="b-flex">
            @foreach($subjects as $subject)
                <label> {{ $subject->subject }}</label>
                <input type="checkbox" name="subject[]" form="userSearchRequest" value="{{ $subject->id }}">
            @endforeach
            </div>
            </div>
          </div>
        </div>
      </div>
      <div style="padding-left:20px;">
        <input class="w-100 post_btn" style="color:#fff; border:none;" type="submit" name="search_btn" value="検索" form="userSearchRequest">
      </div>
      <div style="padding-left:20px;">
        <input class="w-100 reset" type="reset" value="リセット" form="userSearchRequest">
      </div>
    </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
