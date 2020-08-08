@extends('admin.master')

@section('body')
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb pb-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            {{ Form::open(['route'=>'save-category', 'method'=>'POST']) }}

                                <div class="card my-5">
                                    <div class="card-header text-white pt-4 text-center bg-cyan">
                                        <h3>Add Category From</h3>
                                    </div>

                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>{{ Session::get('message') }}</strong>
                                        </div>
                                    @endif

                                    <div class="card-body mt-5 mb-3">
                                        <div class="col-md-11 mx-auto">

                                            <div class="form-group row">
                                                <lable class="col-md-3 control-label font-weight-bold text-dark">Category Name</lable>
                                                <div class="col-md-9">
                                                    <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}"/>
                                                    <span class="text-monospace text-danger font-weight-bold">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 control-label font-weight-bold text-dark">Category Level</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="level_id">
                                                        <option value="">--- Main Category ---</option>
                                                        @foreach($levels as $level)
                                                            <option value="{{ $level->id }}">{{ $level->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <lable class="col-md-3 control-label font-weight-bold text-dark">Category Description</lable>
                                                <div class="col-md-9">
                                                    <textarea id="editor" name="category_description" class="form-control">{{ old('category_description') }}</textarea>
                                                    <span class="text-monospace text-danger font-weight-bold">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <lable class="col-md-3 control-label font-weight-bold text-dark">Publication Status</lable>
                                                <div class="col-md-9">
                                                    <lable><input type="radio" name="publication_status" value="1" class="mr-2"/>Published</lable>
                                                    <lable><input type="radio" name="publication_status" value="0" class="ml-3 mr-2"/>Unpublished</lable>
                                                    <br />
                                                    <span class="text-monospace text-danger font-weight-bold">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card-footer pt-4">
                                        <div class="form-group row text-center">
                                            <div class="col-md-3 mx-auto">
                                                <input type="submit" class="form-control btn text-white btn-rounded bg-cyan" value="Save Category Information"/>
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
@endsection