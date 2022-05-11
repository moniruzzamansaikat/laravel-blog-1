@extends('layouts.app') @section('content')
<div class="container row mainmargin">
    <h1 class="text-center">
        Page not found <a href="{{url()->previous()}}">go back.</a>
    </h1>
</div>
@endsection
