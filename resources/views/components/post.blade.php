<div class="list-group-item list-group-item-action" >
  <div class="d-flex w-100 justify-content-between">
    <div class="h5">
      <img class="avatar-tiny" src="{{$post->userOwner->avatar}}" /> {{$post->title}}
    </div>
    <div>
      <span class="text-muted small">@isset($userHidden) by {{$post->userOwner->username}} @endisset on {{$post->created_at->format('n/j/Y')}} </span>
      <a href="#collapsePost{{$post->id}}" data-toggle="collapse" title="Search" class="lt-2"><i class="fas fa-chevron-down"></i></a>
    </div>
  </div>
  <div class="collapse mt-2" id="collapsePost{{$post->id}}">
    <p class="mb-1">{{$post->body}}.</p>
    <div class="d-flex justify-content-end mt-2">
    <a href="/post/{{$post->id}}" class="btn btn-primary btn-sm">Go to post</a>
    </div>
  </div>
</div>