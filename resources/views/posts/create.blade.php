@extends('layouts.app')

@section('content')
<div class="row justify-content-center p-4">
       
    @if(auth()->user())
        <div class="card p-2 col-md-4" id="tested">
            <center>Add New Post</center>
        </div>

    @else
        <div class="card p-2 col-md-4" id="tested">
            <center>Posted</center>
        </div>
    @endif

    @auth
    <form action="/post" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="caption">Post Caption</label>
                <input type="text" 
                        id="caption" 
                        class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" 
                        autocomplete="caption" autofocus
                        placeholder="Caption.."
                        >

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group row">
               
                <textarea name="message" id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror" placeholder="Write message"></textarea>

                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="pt-4">
                <button type="submit" class="btn btn-primary">Add New Post</button>
            </div>
    
        </div>
    </form>
    @endauth

</div>
@endsection
