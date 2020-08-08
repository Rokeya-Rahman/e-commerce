@extends('admin.master')

@section('body')
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb pb-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10 mx-auto">

                                {{ Form::open(['route'=>'change-password', 'method'=>'POST']) }}

                                    <div class="card my-5">
                                        <div class="card-header text-white pt-4 text-center bg-cyan" >
                                            <h3>Change Password</h3>
                                        </div>

                                        <div class="card-body my-5">
                                            <div class="col-md-8 mx-auto">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-4">Current Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="current_password" class="form-control" required/>
                                                        <p class="text-danger font-weight-bold">{{ Session::get('message') }}</p>
                                                        {{--<input type="hidden" name="id" class="form-control" value="{{ Auth::user()->id }}"/>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer pt-4">
                                            <div class="form-group row text-center">
                                                <div class="col-md-3 mx-auto">
                                                    <input type="submit" class="form-control btn text-white btn-rounded bg-cyan" value="Change Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                {{ Form::close() }}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection