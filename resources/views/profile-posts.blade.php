<x-profile :user="$user" :alreadyFollowed="$alreadyFollowed" docTitle="{{$user->username}}'s Profile">
  <div class="list-group">
    @foreach($user->posts()->latest()->get() as $post)
      <x-post :post="$post" />
    @endforeach
  </div>
</x-profile>