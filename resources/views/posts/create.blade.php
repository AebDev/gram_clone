@extends('layouts.app')

@section('content')
<div class="container  pt-5">
    <form action="\p\store" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Post</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label ">{{ __('Post Caption') }}</label>

                    <div class="col-md-8">
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label ">{{ __('Post Image') }}</label>

                    <div class="col-md-8">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary px-3">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        
        </div>
    </form>
</div>
@endsection