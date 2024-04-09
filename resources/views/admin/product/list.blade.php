@inject('baseHelper','App\Helpers\BaseHelper')
@extends('admin.layout.auth')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [['title' => 'Products','route' => 'products.index']]])
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Products</h5>
                <a class="float-end btn btn-primary" href="{{ adminRoute('products.create') }}">Add New</a>
            </div>

            <div class="card-datatable table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($products->all()))
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    No Image
                                </td>
                                <td>
                                    {{$product->title}}
                                </td>
                                <td>
                                    @if($product->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ adminRoute('products.edit',['product' => $product->id]) }}">Edit</a>
                                    <a class="btn btn-danger delete" data-url="{{ adminRoute('products.destroy',['product' => $product->id]) }}" href="javascript:void(0)">Delete</a>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Products</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="5">
                            {{$products->links()}}
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
                deleteData($(this).data('url'),"{{ adminRoute('products.index') }}")
            })
        })
    </script>
@endsection
