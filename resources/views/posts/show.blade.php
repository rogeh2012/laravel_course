@extends('layouts.app')
@section('include')

    </header>
    <main class="m-4 container">
        <div class="card">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Title: {{ $post->title }}</h5>
                <h6>Description:</h6>
                <p class="card-text"> {{ $post->description }}</p>
            </div>

        </div>

    </main>
    <main class="m-4 mt-5 container">
        <div class="card">
            <div class="card-header">
                Post Creator Info
            </div>

            <div class="card-body">
                {{-- <h5 class="card-title">ID: {{ $postId }}<span></span> </h5> --}}
                {{-- <h5 class="card-title">Title: {{ $post->title }} <span></span> </h5> --}}
                <h5 class="card-title">Name: {{ $post->user->name }}  </h5>
                <h5 class="card-title">Email: {{ $post->user->email }}  </h5>
                <h5 class="card-title">Created At: {{ $post->created_at->format('l jS \of F Y h:i:s A') }}  </h5>

            </div>

        </div>

    </main>

    @endsection
