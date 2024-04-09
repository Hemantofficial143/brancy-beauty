@extends('admin.layout.auth')
@section('style')
    <style>

        .switch-lg .switch-input:checked ~ .switch-toggle-slider::after {
            left: 71%;
        }
    </style>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [
                        ['title' => 'Categories','route' => 'categories.index'],
                        ['title' => 'Add','route' => 'categories.create'],
                        ]])
        <div class="app-ecommerce">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Category Details</h5>
                        </div>
                        <div class="card-body">
                            <form id="categoryForm">

                                <div class="category-image"></div>
                                <div class="mb-3">
                                    <label class="form-label" for="name">Title</label>
                                    <input
                                        required
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="Enter category name"
                                        name="name"
                                        value="{{$category->name}}"
                                        aria-label="Enter category name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label><Br>
                                    <label class="switch switch-square switch-lg">
                                        <input type="checkbox" class="switch-input"
                                               {{$category->status ? 'checked'  : ''}}
                                               name="status" id="status">
                                        <span class="switch-toggle-slider" style="width: 100px;">
                                          <span class="switch-on">
                                            Active
                                          </span>
                                          <span class="switch-off">
                                            InActive
                                          </span>
                                        </span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a class="btn btn-danger" href="{{ adminRoute('categories.index') }}">
                                    Cancel
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            let formData = new FormData()
            let storeUrl = "{{adminRoute('categories.update',['category' => $category->id])}}";
            formData.append('_method', 'put')

            let categoryFormObj = $('#categoryForm');

            $('.category-image').filepond({
                allowMultiple: true,
            });

            $('.category-image').filepond();


            $('.category-image').on('FilePond:addfile', function (e) {
                formData.append('image', e.detail.file.file)
            });

            $('.category-image').on('FilePond:removefile', function (e) {
                if (formData.get('image') != null) {
                    formData.delete('image')
                    formData.append('delete_image', true)
                }
            });

            @if(!empty($category->image_path))
            $('.category-image')
                .filepond('addFile', "{{$category->image_path}}")
                .then(function (file) {
                    console.log('file added', file);
                });
            @endif

            categoryFormObj.on('submit', function (e) {
                e.preventDefault()
                formData.append('name', $('#name').val())
                formData.append('status', $('#status').prop('checked'))
                saveForm(storeUrl, formData, "{{ adminRoute('categories.index') }}");
            })

        })
    </script>
@endsection
