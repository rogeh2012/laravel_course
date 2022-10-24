@extends('layouts.app')
@section('include')


    </header>

    <form action="{{ route('posts.update', $post->id) }}" method="post" class=" container w-75 m-5">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
            <div class="col-sm-10">
                <input type="text"  name="title" value="{{ $post->title }}" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                {{-- <input type="text" value="{{ $post->title }}" class="form-control" id="colFormLabel"> --}}
                <textarea type="text" name="description" class="form-control" id="colFormLabel">{{ $post->description }} </textarea>
            </div>
        </div>
        <div class="row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Post Creator</label>
            <div class="col-sm-10">
                <select name="created_by" class="form-select" aria-label="Default select">
                    <option value="">Select name</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}" @if ($post['user_id']==$user->id) selected  @endif >{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-lg btn-success m-5">Update</button>
    </form>
    @endsection
