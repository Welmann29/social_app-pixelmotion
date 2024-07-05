<x-layout :docTitle="$docTitle">
    <div class="container py-md-5 container--narrow">
        <h2>
          <img class="avatar-small" src="{{$user->avatar}}" /> {{$user->username}}
          @auth
            @if(!$alreadyFollowed AND auth()->user()->username != $user->username)
            <form class="ml-2 d-inline" action="/create-follow/{{$user->username}}" method="POST">
              @csrf
              <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
            </form>
            @endif
          
            @if($alreadyFollowed AND auth()->user()->username != $user->username)
            <form class="ml-2 d-inline" action="/remove-follow/{{$user->username}}" method="POST">
              @csrf
              <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
            </form>
            @endif
          
            @if(auth()->user()->username == $user->username)
              <a href="/manage-avatar" class="btn btn-secondary btn-sm">Manage avatar</a>
            @endif
          @endauth
        </h2>
  
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="/profile/{{$user->username}}" class="profile-nav-link nav-item nav-link {{Request::segment(3) == "" ? "active" : ""}}">Posts: {{$user->posts()->count()}}</a>
          <a href="/profile/{{$user->username}}/followers" class="profile-nav-link nav-item nav-link {{Request::segment(3) == "followers" ? "active" : ""}}">Followers: {{$user->followers()->count()}}</a>
          <a href="/profile/{{$user->username}}/following" class="profile-nav-link nav-item nav-link {{Request::segment(3) == "following" ? "active" : ""}}">Following: {{$user->following()->count()}}</a>
        </div>

        <div class="profile-slot-content">
            {{$slot}}
        </div>
  
      </div>

</x-layout>