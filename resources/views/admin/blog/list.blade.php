@extends('admin.layout.auth')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [['title' => 'Blogs','route' => 'blogs.index']]])
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Blogs</h5>
                <a class="float-end btn btn-primary" href="{{ adminRoute('blogs.create') }}">Add New</a>
            </div>

            <div class="card-datatable table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($blogs))
                        @foreach($blogs as $blog)
                            <tr>
                                <td>
                                    @if(!empty($blog->image_path))
                                        <img width="150px" class="img-thumbnail img-fluid" src="{{$blog->image_path}}" alt="{{$blog->image_path}}">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    {{$blog->title}}
                                </td>
                                <td>
                                    {{$blog->created_at_formatted}}
                                </td>
                                <td>
                                    @if($blog->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ adminRoute('blogs.edit',['blog' => $blog->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Coupons</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="5">
                            {{$blogs->links()}}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
