@extends('admin.main_admin_panel')
@section('content')
    <div class="col-md-8">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <h4>Send Email</h4>
            </div> <!-- panel heading -->

            <div class="panel-body">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-md-11">
                        <div class="row">
                            <form class="form-horizontal" method="post" action="{{url('admin/admin_send')}}">
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label for="sender_name">Sender Name</label>
                                    <input type="text" id="sender_name" name="sender_name" class="form-control" placeholder="Sender Name"/>
                                </div>

                                <div class="form-group">
                                    <label for="sender_email">Sender Email Address</label>
                                    <input type="sender_email" id="sender_email" name="sender_email" class="form-control" placeholder="Sender Email Address "/>
                                </div>

                                <div class="form-group">
                                    <label for="receiver_name">Receiver Name</label>
                                    <input type="text" id="receiver_name" name="receiver_name" class="form-control" placeholder="Receiver Name"/>
                                </div>

                                <div class="form-group">
                                    <label for="receiver_email">Receiver Email Addfress</label>
                                    <input type="email" id="receiver_email" name="receiver_email" class="form-control" placeholder="Receiver Email Addfress"/>
                                </div>

                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject"/>
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea  id="message" name="message" class="form-control" placeholder="Message" rows="5"></textarea>
                                </div>
                                <div class="col-lg-2 col-lg-offset-10">
                                    <input type="submit" class="btn btn-primary" value="Send Email"/>
                                </div>

                            </form>
                        </div> <!-- ./row -->
                    </div> <!-- col-md-11 -->
                </div> <!-- ./container -->

            </div> <!-- ./panel body -->

        </div> <!-- panel primary -->
    </div> <!-- ./col-md-5 -->


@endsection