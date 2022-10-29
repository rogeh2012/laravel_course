@extends('layouts.app')
@section('content')

@if(session()->has('failed'))

    <div class="alert  mt-2 alert-success">
        {{ session()->get('failed') }}
    </div>

@endif
    </header>
    <form action="{{ route('posts.store') }}" method="POST" class=" container w-75 m-5">
        @csrf
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea type="text" name="description" class="form-control" id="colFormLabel"></textarea>
            </div>
        </div>
        <div class="row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Post Creator</label>
            <div class="col-sm-10">
                <select name="created_by" class="form-select" aria-label="Default select">
                    <option value="">Select name</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-lg btn-success m-5">Create</button>
    </form>
@endsection
