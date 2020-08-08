@extends('admin.master')

@section('body')
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb pb-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10 mx-auto">

                                {{ Form::open(['route'=>'new-password', 'method'=>'POST']) }}

                                    <div class="card my-5">
                                        <div class="card-header text-white pt-4 text-center bg-cyan" >
                                            <h3>Reset Password</h3>
                                        </div>

                                        <div class="card-body my-5">
                                            <div class="col-md-8 mx-auto">
                                                <p id="textShow" class="text-orange font-weight-bold text-center">New password and confirm password must be same</p>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-4">New Password</label>
                                                    <div class="col-md-8">
                                                        <input id="newPassword" type="password" name="new_password" minlength="8" class="form-control" required/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-4">Confirm Password</label>
                                                    <div class="col-md-8">
                                                        <input id="confirmPassword" onkeyup="passwordMatched()" type="password" name="confirm_password" minlength="8" class="form-control" required/>
                                                    </div>
                                                </div>

                                                <p id="textShow1" hidden class="text-info font-weight-bold text-center">New password and confirm password matched</p>
                                            </div>

                                        </div>



                                        <div class="card-footer pt-4">
                                            <div class="form-group row text-center">
                                                <div class="col-md-3 mx-auto">
                                                    <input id="passBtn" disabled type="submit" class="form-control btn text-white btn-rounded bg-cyan" value="Reset Password">
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

    <script>
        function passwordMatched() {
            var newPassword = document.getElementById('newPassword').value
            var confirmPassword = document.getElementById('confirmPassword').value

            if (newPassword === confirmPassword) {
                document.getElementById('passBtn').disabled = false
                document.getElementById('textShow').hidden = true
                document.getElementById('textShow1').hidden = false
            } else {
                document.getElementById('passBtn').disabled = true
                document.getElementById('textShow').hidden = false
                document.getElementById('textShow1').hidden = true
            }
        }

    </script>
@endsection