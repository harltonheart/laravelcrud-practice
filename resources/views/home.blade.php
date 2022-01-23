@extends('layouts.app')

@section('content')
<div class="row justify-content-center p-4">
       
    <div class="card p-4 col-md-6 mb-5" id="tested">
        <center>HOME</center>
    </div>

    <center>Go to <a href="/profile/{{auth()->user()->id}}">Profile</a></center>

</div>
@endsection
