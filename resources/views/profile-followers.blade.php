<x-profile :user="$user" :alreadyFollowed="$alreadyFollowed" docTitle="{{$user->username}}'s Profile">
    <div class="list-group">
      @foreach($user->followers()->latest()->get() as $follower)
      <a href="/profile/{{$follower->follower->username}}" class="list-group-item list-group-item-action">
        <img class="avatar-tiny" src="{{$follower->follower->avatar}}" />
        <strong>{{$follower->follower->username}}</strong> 
      </a>
      @endforeach
    </div>
  </x-profile>