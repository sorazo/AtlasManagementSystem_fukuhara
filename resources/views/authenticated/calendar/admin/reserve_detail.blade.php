@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <h5><span>{{$date}}日</span><span class="ml-3">{{$part}}部</span></h5>
    <div style="background-color: #fff; padding: 10px; border-radius: 5px;">
      <table class="w-100">
        <tr class="text-left" style="background-color: #03AAD2; color:#fff;">
          <th class="w-25 pl-5" >ID</th>
          <th class="w-25">名前</th>
          <th class="w-25">場所</th>
        </tr>
        @foreach($reservePersons as $reservePerson)
          @foreach($reservePerson->users as $user)
            <tr class="text-left striped-list">
              <td class="w-25 pl-5 py-1">{{ $user->id }}</td>
              <td class="w-25">{{ $user->over_name }}{{ $user->under_name }}</td>
              <td class="w-25">リモート</td>
          @endforeach
        @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection
