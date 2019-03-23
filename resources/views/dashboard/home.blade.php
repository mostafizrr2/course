@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Training Periods</a></li>
                <li><a href="#">Active Apllications</a></li>
                <li><a href="#">Inactive Applications</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

{!! $chart->script() !!}

@endsection

@push('js')
    
@endpush
