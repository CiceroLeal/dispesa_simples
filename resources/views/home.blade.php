@extends('layouts.app')

@section('content')
    <div class="panel-body table-responsive">
        <router-view></router-view>
    </div>
@endsection

@section('vue')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
