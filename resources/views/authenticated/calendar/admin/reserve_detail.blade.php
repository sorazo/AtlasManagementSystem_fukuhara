@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="m-auto h-75" style="width:70%;">
    <h5 class="mb-4"><span>{{$date}}日</span><span class="ml-3">{{$part}}部</span></h5>
    <div style="background-color: #fff; padding: 10px; border-radius: 5px;box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
      <table class="w-100" style="font-size:20px;">
        <tr class="text-center" style="background-color: #03AAD2; color:#fff;">
          <th style="width:20%!important;">ID</th>
          <th style="width:35%!important;">名前</th>
          <th class="w-75">場所</th>
        </tr>
        @foreach($reservePersons as $reservePerson)
          @foreach($reservePerson->users as $user)
            <tr class="text-center border-bottom striped-list">
              <td class="py-2">{{ $user->id }}</td>
              <td >{{ $user->over_name }}{{ $user->under_name }}</td>
              <td >リモート</td>
          @endforeach
        @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection
