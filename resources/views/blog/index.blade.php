@extends('layouts.blog')

@section('meta')
@endsection

@section('title')
@endsection

<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">Blog Home One
    <small>Subheading</small>
</h1>

<ol class="breadcrumb">
<li class="breadcrumb-item">
  <a href="{{ url('/') }}">Home</a>
</li>
<li class="breadcrumb-item active">Blog Home</li>
</ol>


@section('content')
<!-- Blog Entries Column -->

<div class="col-md-8">

@each('blog.partials.post', $posts, 'post', 'blog.partials.post-none')

  <!-- Pagination -->
  <div class="pagination justify-content-center mb-4">
    {{-- $posts->links() --}}
  </div>

</div>
@endsection

@section('sidebar')
  @include('blog.partials.sidebar')
@endsection
<!-- /.row -->
