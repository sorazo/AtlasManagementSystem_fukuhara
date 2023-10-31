@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 m-auto d-flex">
  <div class="post_view w-75 mt-5">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p style="font-weight: bold; color: #808080;"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}" style="font-weight: bold; color: #000;">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        @foreach($post->subCategories as $sub_category)
        <span class="category_btn">{{$sub_category->sub_category}}</span>
        @endforeach
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment" style="color:#C0C0C0;"></i><span class="">{{$post->commentCounts($post->id)->count()}}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id)}}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id)}}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25">
    <div class="my-5" style="margin-right:100px;">
      <div class="post_btn"><a href="{{ route('post.input') }}" class="" style="color:#fff; text-decoration: none; display: inline-block;">投稿</a></div>
      <div class="d-flex" style="margin-bottom: 20px;">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="border w-75 keyword" style="height:40px;">
        <input type="submit" value="検索" form="postSearchRequest" class="border w-25 keyword_btn" >
      </div>
      <div class="d-flex like_mine" style="margin-bottom: 20px;">
      <input type="submit" name="like_posts" class="w-50 good_btn" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="w-50 mine_btn" value="自分の投稿" form="postSearchRequest">
      </div>
      <p>カテゴリー検索</p>
      <ul>
        @foreach($categories as $category)
        <li class="main_categories " category_id="{{ $category->id }}"><span>{{ $category->main_category }}</span></li>
        <ul class="sub_categories sub_categories_{{ $category->id }}">
        @foreach($category->subCategories as $sub_category)
        <li class="my-4" style="border-bottom: 1px solid #494949; margin:0 50px 0 20px;"><input type="submit" name="category_word" class="sub_category" value="{{$sub_category->sub_category}}" form="postSearchRequest"></li>
        @endforeach
        </ul>
        @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
