@extends('layouts.app')
@section('content')
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
                @if ($post->user)
                    <h5 class="card-title">Name: {{ $post->user->name }} </h5>
                    <h5 class="card-title">Email: {{ $post->user->email }} </h5>
                    <h5 class="card-title">Created At: {{ $post->created_at->format('l jS \of F Y h:i:s A') }} </h5>
                @else
                    <h5 class="card-title">Name: Unknown </h5>
                    <h5 class="card-title">Email: Unknown </h5>
                    <h5 class="card-title">Created At: {{ $post->created_at->format('l jS \of F Y h:i:s A') }} </h5>
                @endif
            </div>

        </div>

    </main>


    <main class="m-4 container">
        <div class="card">
            <div class="card-header">
                Comments
            </div>

            <div class="card-body">
                <div class="container text center">
                    {{-- <div class="row mb-5"> --}}
                        <form style="display: inline" action="{{ route('comments.store') }}" method="POST" class="container w-75 m-5">
                            @csrf
                            <textarea type="text" name="body" placeholder="Please leave a comment..." class="form-control col"
                                id="colFormLabel"></textarea>
                                <input type="hidden" id="custId" name="id" value="{{ $postId }}">
                            <button type="submit" class="btn btn-lg btn-success m-3 col-2">Post comment</button>
                        </form>
                    {{-- </div> --}}


                    @foreach ($comments as $comment)
                        {{-- @if --}}
                        <div class="card m-2 shadow">
                            <div class="card-body">
                                {{ $comment->body }}

                                {{-- <form style="display:inline" action="{{ route('posts.edit', $post['id']) }}" method="get">
                                    @csrf
                                    <x-button color=primary action=edit></x-button>
                                </form> --}}

                                <form style="display:inline" action="{{ route('comments.destroy', $post['id']) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="custId" name="id" value="{{ $postId }}">
                                    <input type="hidden" id="custId" name="body" value=" {{ $comment->body }}">

                                    <x-button color=danger action=Delete></x-button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </main>
@endsection
