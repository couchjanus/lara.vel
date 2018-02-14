@extends('layouts.app1')

    {{--Styles--}}
    @section('styles')
      <!-- Bootstrap core CSS -->
      <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @endsection

    {{--Head--}}
    @section('head')
    @endsection
    
    @section('navigation')
       @include('shared.navigation')
    @endsection
    
    {{--Page--}}
    
    @section('page')
       <div class="row">
          @yield('content')
          @yield('sidebar')
       </div>
    @endsection

    @section('footer')
        @include('shared.footer')
    @endsection
    
    {{--Scripts--}}

    @push('scripts')
        <!-- Bootstrap core JavaScript -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    @endpush
    