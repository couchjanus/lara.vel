@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
      
      @if (Session::get('message') != Null)
        <div class="row">
            <div class="col-md-9">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
      @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong>Edit</strong> Post
              <a href="{{ route('posts.index') }}" class="btn btn-success btn-sm" title="All Posts">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back
              </a>
          </div>
          
          <form action="{{ route('posts.update',['id' => $post->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <div class="card-body">
              
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="title">Post Title</label>
                <div class="col-md-9">
                  <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
                  <span class="help-block">Enter Post Title</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="disabled-input">Post Slug</label>
                <div class="col-md-9">
                  <input type="text" id="disabled-input" name="disabled-input" class="form-control" value="{{ $post->slug }}" disabled="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="content">Post Content</label>
                <div class="col-md-9">
                  <textarea id="content" name="content" rows="9" class="form-control">{{ $post->content }}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="category_id">Post Category</label>
                <div class="col-md-9">
                  <select id="category_id" name="category_id" class="form-control">
                    @foreach ($categories as $key => $value)
                        <option value="{{ $key }}"
                            @if ($key == old('category_id', $post->category_id))
                            selected="selected"
                            @endif
                            >{{ $value }}
                        </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label">Is Active</label>
                <div class="col-md-9">
                  <label class="radio-inline" for="inline-radio1">
                    <input type="radio" id="inline-radio1" name="is_active" value="1" @if (old('is_active', $post->is_active)) checked="checked" @endif> Yes
                  </label>
                  <label class="radio-inline" for="inline-radio2">
                    <input type="radio" id="inline-radio2" name="is_active" value="0"> No
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label">Post Tags</label>
                <div class="col-md-9">
                  <label class="checkbox-inline" for="inline-checkbox1">
                    <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1">One
                  </label>
                  <label class="checkbox-inline" for="inline-checkbox2">
                    <input type="checkbox" id="inline-checkbox2" name="inline-checkbox2" value="option2">Two
                  </label>
                  <label class="checkbox-inline" for="inline-checkbox3">
                    <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3" value="option3">Three
                  </label>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
              <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection