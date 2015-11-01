@extends('deo.deo_master')
@section('content')
<br>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <p>My Case Files</p>
            </div>
            <div class="panel panel-body">

                @if(session('non'))
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <p class="bg-warning">{{ session('non') }}</p>
                    </div>
                </div>
                @else
                    <?php $count=0 ?>
                    @foreach($caseFiles as $cases)
                <div class="col-md-3">

                  <a href="{{ url('deo/myfiles/'.$count)}}" id="{{ $count }}" class="thumbnail">
                    <span >
                    <img src="{{asset('images/file-icons/Folder-Black-Doc-icon.png')}}">
                    <h4 >{{ $cases[0] }}</h4>
                    </span>
                  </a>

                </div> <!-- ./col-md-4 -->

                     <?php $count++ ?>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection