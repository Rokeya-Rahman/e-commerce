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
                                    <h3>Manage Category From</h3>
                                </div>

                                @if(Session::has('message1'))
                                    <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>{{ Session::get('message1') }}</strong>
                                    </div>
                                @endif

                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>{{ Session::get('message') }}</strong>
                                    </div>
                                @endif

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <td>Serial no</td>
                                                <td>Category Name</td>
                                                <td>Category Level</td>
                                                <td>Publication Status</td>
                                                <td>Action</td>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @php($i = 1)
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $category->category_name }}</td>
                                                    <td>
                                                        @if($category->level_id == null)
                                                            -
                                                        @else
                                                            {{ $category->level->category_name }}
                                                        @endif

                                                    </td>
                                                    <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                                    <td class="custom-control-inline">
                                                        <a href="{{ route('view-details', ['id' => $category->id]) }}" class="btn btn-info mr-1" title="View Details"><i class="fas fa-folder-plus"></i></a>

                                                        @if($category->publication_status == 1)
                                                            <a href="#"
                                                               onclick="event.preventDefault();
                                                               document.getElementById('unpublishedCategory'+'{{ $category->id }}').submit();"

                                                               class="btn btn-success mr-1" title="Unpublished"><i class="fas fa-sort-amount-up"></i></a>
                                                            <form id="unpublishedCategory{{ $category->id }}" action="{{ route('unpublished-category') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $category->id }}"/>
                                                            </form>

                                                        @else
                                                            <a href="#"
                                                               onclick="event.preventDefault();
                                                               document.getElementById('publishedCategory'+'{{ $category->id }}').submit();"

                                                               class="btn btn-warning mr-1" title="Published"><i class="fas fa-sort-amount-down"></i></a>
                                                            <form id="publishedCategory{{ $category->id }}" action="{{ route('published-category') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $category->id }}"/>
                                                            </form>
                                                        @endif

                                                        <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-purple mr-1" title="Edit"><i class="far fa-edit"></i></a>

                                                        <a href=""
                                                           onclick="event.preventDefault();
                                                            var check = confirm('Are you sure to delete this !!!');
                                                            if (check) {
                                                                document.getElementById('deleteCategory'+'{{ $category->id }}').submit();
                                                            }"
                                                            class="btn btn-danger" title="Delete"><i class="fas fa-trash-restore"></i></a>
                                                        <form id="deleteCategory{{ $category->id }}" action="{{ route('delete-category') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $category->id }}"/>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                            <tfoot>
                                            <tr>
                                                <td>Serial no</td>
                                                <td>Category Level</td>
                                                <td>Category Name</td>
                                                <td>Publication Status</td>
                                                <td>Action</td>
                                            </tr>
                                            </tfoot>
                                        </table>
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