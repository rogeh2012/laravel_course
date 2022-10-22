@extends('layouts.app')
@section('include')

    </header>
    <main class="m-4 container">
        <div class="card">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Title: Special title treatment</h5>
                <h6>Description:</h6>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>

        </div>

    </main>
    <main class="m-4 mt-5 container">
        <div class="card">
            <div class="card-header">
                Post Creator Info
            </div>

            <div class="card-body">
                <h5 class="card-title">ID: {{ $postId }}<span></span> </h5>
                <h5 class="card-title">Name: <span></span> </h5>
                <h5 class="card-title">Email: <span></span> </h5>
                <h5 class="card-title">Created At: <span></span> </h5>

            </div>

        </div>

    </main>

    @endsection
