@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($posts as $post)
            <div class="row">{{--justify-content-center p-4 --}}
                <div class="col-8">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </div>

                <div class="col-4">
                    {{-- <h3>{{ $posts->user->username }}</h3> --}}
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="{{ $post->user->profile->profileImage() }}" alt="" style="height: 50px" class="w-10 rounded-circle">
                        </div>
                        <div>
                            <h5 class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id}}" ><span class="text-dark">{{ $post->user->username }}</span></a>
                            </h5>
                        </div>
                    </div>
                    <hr>


                    <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id}}" style="text-decoration: none">
                            <span class="text-dark">{{ $post->user->username }}</span></a>
                        </span>:   {{ $post->caption }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>
        
@endsection

{{-- 23:00 --}}