@extends('layouts.app')
@section('content')
    </header>
    <main class="text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-lg btn-success m-5">Create Post</a>
    </main>
    <div class=" container text center">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post['id'] }}</th>
                        <td> {{ $post->title }} </td>

                        @if ($post->user)
                            <td> {{ $post->user->name }} </td>
                        @else
                            <td>Unknown</td>
                        @endif
                        <td> {{ $post->created_at->format('Y/m/d') }}</td>
                        <td>
                            {{-- format('l jS \of F Y h:i:s A') --}}
                            <form style="display:inline" action="{{ route('posts.show', $post['id']) }}" method="get">
                                @csrf
                                <x-button color=info action=View></x-button>

                            </form>
                            <form style="display:inline" action="{{ route('posts.edit', $post['id']) }}" method="get">
                                @csrf
                                <x-button color=primary action=edit></x-button>
                            </form>

                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $post['id'] }}">
                                Delete
                            </button>

                            <div class="modal fade" id="exampleModal{{ $post['id'] }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('posts.destroy', $post['id']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <x-button color=danger action=Delete></x-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection
