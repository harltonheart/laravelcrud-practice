@extends('layouts.app')

@section('content')
     <div class="row">{{--justify-content-center p-4 --}}
       <div class="col-8">
            <img src="/storage/{{ $posts->image }}" alt="" class="w-100">
        </div>

        <div class="col-4">
            {{-- <h3>{{ $posts->user->username }}</h3> --}}
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{ $posts->user->profile->profileImage() }}" alt="" style="height: 50px" class="w-10 rounded-circle">
                </div>
                <div>
                    <h5 class="font-weight-bold">
                        <a href="/profile/{{ $posts->user->id}}" ><span class="text-dark">{{ $posts->user->username }}</span></a>
                    </h5>
                </div>
            </div>
            <hr>


            <p><span class="font-weight-bold"><a href="/profile/{{ $posts->user->id}}" style="text-decoration: none">
                    <span class="text-dark">{{ $posts->user->username }}</span></a>
                </span>:   {{ $posts->caption }}
            </p>
    </div>
        </div>
        
@endsection

{{-- 23:00 --}}