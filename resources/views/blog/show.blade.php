@extends('layouts.blog')

@section('meta')
@endsection

@section('title')
@endsection

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">{{ $post->title }}
        <small>by
          <a href="#">Janus Nic</a>
        </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('blog') }}">Blog</a>
        </li>
        <li class="breadcrumb-item active">{{ $post->title }}</li>
      </ol>


@section('content')
<!-- Post Content Column -->
<div class="col-lg-8">

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ date('d F Y', strtotime($post->created_at)) }}</p>

    <hr>

    <!-- Post Content -->
    <p class="lead">{{ $post->content }}</p>

    <hr>
    
    @includeIf('blog.partials.quote', ['some' => 'data'])
    
    @includeWhen($hescomment, 'blog.partials.comments', ['some' => 'data'])

  </div>
@endsection

@section('sidebar')
  @include('blog.partials.sidebar')
@endsection
<!-- /.row -->
