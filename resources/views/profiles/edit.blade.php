@extends('layouts.app')

@section('content')
<div class="row justify-content-center p-4">
       
    @if(auth()->user())
        <div class="p-2 col-md-4" id="tested">
            <center>Profile Details</center>
        </div>
    <form action="{{ route('profile.update', $user->profile->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="title">Title:</label>
                
                
                <input type="text" 
                        id="title" 
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title" 
                        value="{{ old('title') ?? $user->profile->title }}"
                        autocomplete="title" autofocus
                        >
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group row">
                <label for="description">Description:</label>
                <textarea cols="30" rows="5"
                    id="description" 
                    class="form-control @error('description') is-invalid @enderror"
                    style="resize: none;" 
                    name="description" 
                    autocomplete="description" autofocus
                    >{{ old('description') ?? $user->profile->description  }}</textarea>
                
                        

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="pt-4">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
    
        </div>
    </form>
    
    @else
        <script>window.location = "/";</script>
    @endif

</div>
@endsection
