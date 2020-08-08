@extends('admin.master')

@section('body')
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb pb-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            {{ Form::open(['route'=>'update-category', 'method'=>'POST', 'name'=>'editCategoryFrom']) }}

                                    <div class="card my-5">
                                        <div class="card-header text-white pt-4 text-center bg-cyan">
                                            <h3>Edit Category From</h3>
                                        </div>

                                        <div class="card-body mt-5 mb-3">
                                            <div class="col-md-11 mx-auto">

                                                <div class="form-group row">
                                                    <lable class="col-md-3 control-label font-weight-bold text-dark">Category Name</lable>
                                                    <div class="col-md-9">
                                                        <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}"/>
                                                        <input type="hidden" name="id" class="form-control" value="{{ $category->id }}"/>
                                                        <span class="text-monospace text-danger font-weight-bold">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                                                    </div>
                                                </div>

                                                {{--<div class="form-group row">--}}
                                                    {{--<label class="col-md-3 control-label font-weight-bold text-dark">Category Level</label>--}}
                                                    {{--<div class="col-md-9">--}}
                                                        {{--<select class="form-control" name="level_id">--}}
                                                            {{--<option value="">--- Main Category ---</option>--}}
                                                            {{--@foreach($levels as $level)--}}
                                                                {{--<option value="{{ $level->id }}">{{ $level->category_name }}</option>--}}
                                                            {{--@endforeach--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                <div class="form-group row">
                                                    <label class="col-md-3 control-label font-weight-bold text-dark">Category Level</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="level_id">
                                                            @if($category->level_id != null && $mainCategory->publication_status == 0)
                                                                <option value="{{ $mainCategory->id }}" class="text-danger">{{ $mainCategory->category_name }} (Unpublished)</option>
                                                            @endif
                                                            <option value="">--- Main Category ---</option>
                                                            @foreach($levels as $level)
                                                                <option value="{{ $level->id }}" {{ $level->id == $category->level_id ? 'selected' : '' }}>{{ $level->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{--<div class="form-group row">--}}
                                                    {{--<label class="col-md-3 control-label font-weight-bold text-dark">Category Level</label>--}}
                                                    {{--<div class="col-md-9">--}}
                                                        {{--<select class="form-control" name="level_id">--}}
                                                            {{--<div {{ $mainCategory->publication_status != 1 ? 'hidden' : '' }}>--}}
                                                                {{--<option {{ $mainCategory->publication_status != 1 ? 'disabled' : '' }}>{{ $mainCategory->category_name }}</option>--}}
                                                                {{--<option hidden value="{{ $category->level_id }}" selected></option>--}}
                                                            {{--</div>--}}
                                                            {{--<option value="">--- Main Category ---</option>--}}
                                                            {{--@foreach($levels as $level)--}}
                                                                {{--@if($category->level_id == $level->id)--}}
                                                                    {{--<option value="{{ $level->id }}" selected>{{ $level->category_name }}</option>--}}
                                                                {{--@else--}}
                                                                    {{--<option value="{{ $level->id }}">{{ $level->category_name }}</option>--}}
                                                                {{--@endif--}}
                                                            {{--@endforeach--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                <div class="form-group row">
                                                    <lable class="col-md-3 control-label font-weight-bold text-dark">Category Description</lable>
                                                    <div class="col-md-9">
                                                        <textarea id="editor" name="category_description" class="form-control">{{ $category->category_description }}</textarea>
                                                        <span class="text-monospace text-danger font-weight-bold">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <lable class="col-md-3 control-label font-weight-bold text-dark">Publication Status</lable>
                                                    @if(Session::has('message2'))
                                                    <div class="col-md-9">
                                                        {{--<lable><input type="radio" disabled {{ $category->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1" class="mr-2"/>Published</lable>--}}
                                                        {{--<lable><input type="radio" disabled {{ $category->publication_status != 1 ? 'checked' : '' }} name="publication_status" value="0" class="ml-3 mr-2"/>Unpublished</lable>--}}
                                                        <lable><input type="radio" {{ Session::has('message2') ? 'disabled' : '' }} {{ $category->publication_status == 1 ? 'checked' : '' }} class="mr-2"/>Published</lable>
                                                        <input hidden="" type="radio" {{ $category->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1"/>

                                                        <lable><input type="radio" {{ Session::has('message2') ? 'disabled' : '' }} {{ $category->publication_status != 1 ? 'checked' : '' }} class="ml-3 mr-2"/>Unpublished</lable>
                                                        <input hidden="" type="radio" {{ $category->publication_status != 1 ? 'checked' : '' }} name="publication_status" value="0"/>
                                                        <div class="alert alert-info mt-3">
                                                            <strong>{{ Session::get('message2') }}</strong>
                                                        </div>
                                                    </div>
                                                    @else
                                                        <lable><input type="radio" {{ $category->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1" class="mr-2"/>Published</lable>
                                                        <lable><input type="radio" {{ $category->publication_status == 0 ? 'checked' : '' }} name="publication_status" value="0" class="ml-3 mr-2"/>Unpublished</lable>
                                                        <br/>
                                                        <span class="text-monospace text-danger font-weight-bold">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>
                                                    @endif
                                                </div>
                                                {{--<lable><input type="radio" {{ Session::has('message2') ? 'disabled' : '' }} {{ $category->publication_status == 1 ? 'checked' : '' }} class="mr-2"/>Published</lable>--}}
                                                {{--<input hidden="" type="radio" {{ $category->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1"/>--}}

                                                {{--<lable><input type="radio" {{ Session::has('message2') ? 'disabled' : '' }} {{ $category->publication_status != 1 ? 'checked' : '' }} class="ml-3 mr-2"/>Unpublished</lable>--}}
                                                {{--<input hidden="" type="radio" {{ $category->publication_status != 1 ? 'checked' : '' }} name="publication_status" value="0"/>--}}

                                            </div>
                                        </div>

                                        <div class="card-footer pt-4">
                                            <div class="form-group row text-center">
                                                <div class="mx-auto row">
                                                    <input type="submit" class="btn text-white btn-rounded bg-cyan" value="Update Category Information"/>
                                                    <a href="{{ route('manage-category') }}" class="btn bg-info btn-rounded text-white ml-1">Cancel</a>
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
    <script>
{{--        document.forms['editCategoryFrom'].elements['level_id'].value = '{{ $mainCategory->id }}';--}}
        {{--if ('{{ $level->id }}' === '{{ $mainCategory->id }}') {--}}
            {{--document.forms['editCategoryFrom'].elements['level_id'].value = '{{ $category->level_id }}';--}}
        {{--} else {--}}
            {{--document.forms['editCategoryFrom'].elements['level_id'].value = '{{ $mainCategory->id }}';--}}
        {{--}--}}
    </script>
@endsection