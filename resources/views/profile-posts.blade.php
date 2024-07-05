<x-profile :user="$user" :alreadyFollowed="$alreadyFollowed">
  <div class="list-group">
    @foreach($user->posts()->latest()->get() as $post)
    <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
      <img class="avatar-tiny" src="{{$post->userOwner->avatar}}" />
      <strong>{{$post->title}}</strong> on {{$post->created_at->format('n/j/Y')}}
    </a>
    @endforeach
  </div>
</x-profile>