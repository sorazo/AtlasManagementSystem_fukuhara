@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="w-75 m-auto pt-5 pb-5" style="border-radius:10px; background:#FFF; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
    <div class="w-75 m-auto">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="adjust-table-btn text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>

<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
      <div class="w-100">
        <div class="modal-inner-day w-50 m-auto">
          <p>予約日：<span name="value"></span></p>
        </div>
        <div class="modal-inner-part w-50 m-auto pt-3 pb-3">
          <p>時間：<span name="setting_part"></span></p>
        </div>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
          <input type="hidden" class="delete-modal-hidden" name="setting_id" value="" form="deleteParts">
          <input type="submit" class="btn btn-primary d-block" value="キャンセル" form="deleteParts">
        </div>
      </div>
  </div>
</div>
@endsection
