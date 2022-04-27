@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    @guest
                    Hello Motherfucker
                    @else
                    Hello {{auth()->user()->first_name}}
                    @endguest
                </div>
                <div class="card-body">
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection