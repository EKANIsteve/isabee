@include('home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
<link rel="stylesheet" href="{{ asset('css/style1.css') }}?v={{ time() }}">
<link rel="stylesheet" href="{{ asset('css/concours.css') }}?v={{ time() }}">

{{-- HERO SLIDER --}}
<section class="hero-section">