<x-layout>
    <div class="container py-md-5 container--narrow">
        <div class="col d-flex justify-content-end">
            <a href="/post/{{$post->id}}" class="btn btn-danger">Cancel</a>
        </div>
        <form action="/post/{{$post->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input value="{{old('title', $post->title)}}" name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('title')
            <p class="m-0 small alert alert-danger">{{$message}}</p>
            @enderror
          </div>
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text">
                {{old('body', $post->body)}}
            </textarea>
            @error('body')
            <p class="m-0 small alert alert-danger">{{$message}}</p>
            @enderror
          </div>
  
          <button class="btn btn-primary">Edit Post</button>
        </form>
    </div>
</x-layout>