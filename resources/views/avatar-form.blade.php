<x-layout>
    <div class="container container--narrow py-md-5">
        <div class="col d-flex justify-content-end">
            <a href="/profile/{{auth()->user()->username}}" class="btn btn-danger">Cancel</a>
        </div>
        <h2 class="text-center mb-3">Upload a new profile picture</h2>
        <form action="/manage-avatar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name="avatar">
                @error('avatar')
                    <p class="alert small alert-danger" >{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Save new profile picture</button>
        </form>
    </div>
</x-layout>