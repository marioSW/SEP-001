@extends('deo.deo_master')
@section('content')
</br>
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panle-default">
            <div class="panel panel-heading">
                <div class="panel panel-title">
                    <h2>Hello {{ Auth::user()->name }}</h2>
                </div>
            </div>
            <div class="panel panel-body">
                <p>Have a great Day</p>

            </div>
        </div>
        <!-- /. panel default -->
    </div>
    </div> <!-- ./row -->

@endsection