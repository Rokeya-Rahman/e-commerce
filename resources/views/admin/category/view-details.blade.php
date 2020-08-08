@extends('admin.master')

@section('body')
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb pb-5">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header text-white pt-4 text-center bg-cyan">
                                    <h3>View Details</h3>
                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>

                                                <tr>
                                                    <td>Category Name</td>
                                                    <td>{{ $category->category_name }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Category Description</td>
                                                    <td>{!! $category->category_description !!}</td>
                                                </tr>

                                                <tr>
                                                    <td>Category Level</td>
                                                    <td>
                                                        @if($category->level_id == null)
                                                            Main-Category
                                                        @else
                                                            Sub-Category
                                                        @endif
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Publication Status</td>
                                                    <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="card-footer text-center">
                                    <a href="{{ route('manage-category') }}" class="btn bg-secondary btn-rounded text-white">Back</a>
                                    <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn bg-purple btn-rounded text-white">Edit</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

@endsection