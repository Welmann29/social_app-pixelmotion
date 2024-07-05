<x-profile :user="$user" :alreadyFollowed="$alreadyFollowed">
    <div class="list-group">
      @foreach($user->following()->latest()->get() as $followed)
      <a href="/profile/{{$followed->userFollowed->username}}" class="list-group-item list-group-item-action">
        <img class="avatar-tiny" src="{{$followed->userFollowed->avatar}}" />
        <strong>{{$followed->userFollowed->username}}</strong> 
      </a>
      @endforeach
    </div>
  </x-profile>