@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       
        <div class="p-2">
            <div class="card p-4" style="background-color: rgb(191, 225, 213)">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex p-2">
                        <h2>{{ $user->name }}</h2>
                    </div>

                </div>
                

                <div class="d-flex pl-2">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> {{ Str::plural('post', $user->posts->count()) }}</div>
                    
                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit" class="ml-auto"><button class="btn btn-outline-success btn-sm" type="submit">Edit Profile</button></a>
                    @endcan
                </div>
                <hr>
                @if(empty($user->profile))
                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit" class=""><button class="btn btn-outline-success btn-sm" type="submit">Add Details</button></a>
                    @endcan
                @else
                    <div class="row d-flex justify-content-between py-3">
                        <div class="px-2"><h4>{{ $user->profile->title }}</h4></div>
                        <div class="px-2">{{ $user->profile->description }}</div>
                        <div class="px-2"><a href="#">{{ $user->profile->url }}</a></div>
                    </div>
                    @can('update', $user->profile) {{-- u should create Policy so u can use @can.. 'update' located to Policies/ProfilePolicy.php--}}
                                                    {{-- php artisan make:policy ProfilePolicy -m Profile --}} {{--terminal command--}}
                        <div class="d-inline-flex">
                            <a href="/post/create" class="btn btn-primary">Add Post</a>
                        </div>
                    @endcan
                @endif
            </div>
            
        </div>

    </div><br>

    <div class="row text-center">
        <h2>POSTED</h2>
    </div>



    <div class="row p-2">
        @if($user->posts->count() === 0)
            <div class="row text-center mt-4">
                <h4>There is no post!</h4>  
                    @can('update', $user->profile)    {{-- u should create Policy so u can use @can.. 'update' located to Policies/ProfilePolicy.php--}}
                                                            {{-- php artisan make:policy ProfilePolicy -m Profile --}} {{--terminal command--}}
                        <div class="justify-content-center">
                            <a href="/post/create" class="btn btn-outline-primary btn-sm">Add Post</a>
                        </div>    
                    @endcan       
            </div>
        @else
        
            @foreach($user->posts as $post)
                    <div class="card p-3 mb-3" style="background-color: rgb(191, 225, 213);">
                        <div class="p-1">
                            @can('update', $user->profile)
                                <button type="button" class="btn btn-sm btn-danger float-right ml-1" data-toggle="modal" data-target="#deletePost{{$post->id}}">Delete</button>
                                <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#editPost{{$post->id}}">Edit</button>
                            @endcan
                            <h4>{{ $post->caption }}</h4>
                        </div>
                        
                        <hr>
                        <small>{{ $post->message}}</small>
                    </div>
                    
            @endforeach

        @endif
    </div>

</div>
@endsection

@foreach($user->posts as $post)
  <!-- Modal -->
  <div class="modal fade" id="editPost{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit post for {{$user->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">

            <form  method="post" action="{{ route('update.post', $post->id)}}" id="edit_post{{$post->id}}">
                @csrf
                @method('PATCH')
                    <div class="p-4">
                        <div class="form-group row">
                            <label for="" class="form-label">Caption:</label>
                            <input type="text" class="form-control form-control-sm" id="" placeholder="Type of device" name="caption" value="{{ old('caption') ?? $post->caption }}">
                        </div>
            
                        <div class="form-group row">
                            <label for="" class="form-label">Message:</label>
                                <textarea name="message" id="" cols="30" rows="10" class="form-control form-control-sm" >{{ old('message') ?? $post->message }}</textarea>
                        </div>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" form="edit_post{{$post->id}}">Save</button>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endforeach



@foreach($user->posts as $post)
  <!-- Modal -->
  <div class="modal fade" id="deletePost{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">

            <small>Are you sure you want to delete this post?</small>
                    
            
        </div>
        <div class="modal-footer">
            <form method="post" action="/postdelete/{{$post->id}}">
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-primary btn-sm">Yes</button>
              </form> 
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
@endforeach

