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
                        ['title' => 'Blogs','route' => 'blogs.index'],
                        ['title' => 'Add','route' => 'blogs.create'],
                        ]])
        <div class="app-ecommerce">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Blog Details</h5>
                        </div>
                        <div class="card-body">
                            <form id="blogForm">

                                <div class="blog-image"></div>
                                <div class="mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input
                                        required
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        placeholder="Enter title"
                                        name="title"
                                        @if(!empty($blog->title))
                                            value="{{$blog->title}}"
                                        @endif
                                        aria-label="Enter title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <div id="description">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="tag">Tags</label>
                                    <div id="tagsdiv">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="tags"
                                            placeholder="Enter Tags"
                                            name="tags"
                                            aria-label="Enter Tags">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label><Br>
                                    <label class="switch switch-square switch-lg">
                                        <input type="checkbox" class="switch-input"
                                               @if(!empty($blog)) {{$blog->status ? 'checked'  : ''}}  @else checked
                                               @endif name="status" id="status">
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
                                <a class="btn btn-danger" href="{{ adminRoute('blogs.index') }}">
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
            let storeUrl = "";
            @if($blog == null)
                storeUrl = "{{adminRoute('blogs.store')}}";
            @else
            formData.append('_method', 'put')
            storeUrl = "{{adminRoute('blogs.update',['blog' => $blog->id])}}";
            @endif

            let blogFormObj = $('#blogForm');
            let blog = @json($blog);

            $('.blog-image').filepond({
                allowMultiple: true,
            });

            $('.blog-image').filepond();


            $('.blog-image').on('FilePond:addfile', function (e) {
                formData.append('image', e.detail.file.file)
            });

            $('.blog-image').on('FilePond:removefile', function (e) {
                if (formData.get('image') != null) {
                    formData.delete('image')
                    formData.append('delete_image', true)
                }
            });

            @if($blog)

            @if(!empty($blog->image_path))
            $('.blog-image')
                .filepond('addFile', "{{$blog->image_path}}")
                .then(function (file) {
                    console.log('file added', file);
                });
            @endif
            @endif


            let
                tags = []
            var description = new RichTextEditor("#description");

            if (blog != null) {
                description.setHTMLCode(blog.description);
                tags = blog.tags.split(',')

                if (tags.length > 0) {
                    tags.forEach(tag => {
                        let spanText = tag
                        var button = $('<span class="badge tagBadge bg-label-primary cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-danger" data-bs-original-title="Click to remove" style="margin-right: 10px;margin-bottom: 5px"></span>');
                        button.text(spanText.toLowerCase());
                        $(button).insertBefore('#tagsdiv input');
                    })
                }
            }

            $("#tagsdiv input").on({
                focusout() {
                    var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig, ''); // allowed characters
                    if (txt) {
                        let spanText = txt.toLowerCase()
                        var button = $('<span class="badge tagBadge bg-label-primary cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-danger" data-bs-original-title="Click to remove" style="margin-right: 10px;margin-bottom: 5px"></span>');
                        button.text(txt.toLowerCase());
                        if (!tags.includes(spanText)) {
                            tags.push(spanText)
                            $(button).insertBefore(this);
                        }
                    }
                    this.value = "";
                },
                keyup(ev) {
                    if (/(,|Enter)/.test(ev.key)) $(this).focusout();
                }
            });


            $("#tagsdiv span").on("click", function () {
                if (tags.includes($(this).text())) {
                    tags.splice(tags.indexOf($(this).text()), 1)
                }
                $(this).remove();
            });

            blogFormObj.on('submit', function (e) {
                e.preventDefault()
                formData.append('title', $('#title').val())
                formData.append('description', description.getHTMLCode())
                formData.append('tags', tags.join(','))
                formData.append('status', $('#status').prop('checked'))

                saveForm(storeUrl, formData, "{{ adminRoute('blogs.index') }}");
            })


        })
    </script>
@endsection
