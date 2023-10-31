@extends('layouts.sidebar')
@section('content')

  <div class="w-100 vh-100 p-5">
    <div class=" w-75 m-auto pt-5 pb-5" style="border-radius:10px; background:#FFF; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
      <h4 class="text-center mb-4">{{ $calendar->getTitle() }}</h4>
        {!! $calendar->render() !!}
      <div class="adjust-table-btn m-auto text-right">
        <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
      </div>
    </div>
  </div>

@endsection
