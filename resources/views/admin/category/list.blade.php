@extends('admin.layout.auth')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [['title' => 'Categories','route' => 'categories.index']]])
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Categories</h5>
                <a class="float-end btn btn-primary" href="{{ adminRoute('categories.create') }}">Add New</a>
            </div>

            <div class="card-datatable table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($categories))
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    @if(!empty($category->image_path))
                                        <img width="50px" class="img-thumbnail img-fluid" src="{{$category->image_path}}" alt="{{$category->image_path}}">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    @if($category->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ adminRoute('categories.edit',['category' => $category->id]) }}">Edit</a>
                                    <a class="btn btn-danger delete" data-url="{{ adminRoute('categories.destroy',['category' => $category->id]) }}" href="javascript:void(0)">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Categories</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="5">
                            {{$categories->links()}}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            $('.delete').on('click',function(){
                deleteData($(this).data('url'),"{{ adminRoute('categories.index') }}")
            })
        })
    </script>
@endsection
