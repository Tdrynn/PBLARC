@extends('layouts.app')

@section('content')
    @php $currentStep = 3; @endphp
    @include('layouts.navbar.navbar_back')
    <div class="row">
        <div class="payment">
            @include('layouts.progressBar')
        </div>
    </div>
@endsection