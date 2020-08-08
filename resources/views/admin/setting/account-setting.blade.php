@extends('admin.master')

@section('body')
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb pb-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10 mx-auto">
                                <div class="card my-5">
                                    {{--flash message--}}
                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>{{ Session::get('message') }}</strong>
                                        </div>
                                    @endif

                                    <div class="card-header text-white pt-4 text-center bg-cyan">
                                        <h3>Reset Profile</h3>
                                    </div>
                                    <div class="card-body my-5">
                                        <h5 class="mr-5">&longrightarrow;<a href="{{ route('edit-password') }}" class="ml-5">Change your password</a></h5>
                                        <h5 class="mr-5">&longrightarrow;<a href="" class="ml-5">Change your email address</a></h5>
                                        <h5 class="mr-5">&longrightarrow;<a href="" class="ml-5">Change your profile picture</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection