@extends('layouts.app')
@section('include')

    </header>
    <form action="{{ route('posts.index') }}" method="PUT" class=" container w-75 m-5">
        @csrf
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
            <div class="col-sm-10">
                <input type="text" value="{{ $postId }}" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Post Creator</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select">
                    <option selected="">Ahmed</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-lg btn-success m-5">Update</button>
    </form>
    @endsection
