@extends('admin.layout.auth')
@section('style')
    <style>
        .filepond--list {
            display: flex !important;
            justify-content: space-between !important;
        }

    </style>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [
                        ['title' => 'Products','route' => 'products.index'],
                        ['title' => 'Add','route' => 'products.create'],
                        ]])
        <div class="app-ecommerce">
            <!-- Add Product -->
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                <div class="d-flex flex-column justify-content-center">
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <div class="d-flex gap-3">
                        <a href="{{ adminRoute('products.index') }}" class="btn btn-label-danger">Cancel</a>
                    </div>
                    <button type="submit" id="saveProductBtn" class="btn btn-primary">Save</button>
                </div>
            </div>

            <div class="row">
                <!-- First column-->
                <div class="col-12 col-lg-8">
                    <!-- Media -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Product Images</h5>
                            <a href="javascript:void(0);" class="fw-medium">Reorder Images</a>
                        </div>
                        <div class="card-body">
                            <div id="product-images"></div>
                        </div>
                    </div>
                    <!-- /Media -->
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Product information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="product_title"
                                    placeholder="Product title"
                                    name="product_title"
                                    aria-label="Product title"/>
                            </div>
                            <!-- Description -->
                            <div>
                                <label class="form-label">Description</label>
                                <div id="product_description"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Information -->

                </div>
                <!-- /Second column -->

                <!-- Second column -->
                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Pricing</h5>
                        </div>
                        <div class="card-body">
                            <!-- Base Price -->
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-price">Base Price</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="product_mrp"
                                    placeholder="Price"
                                    name="product_mrp"
                                    aria-label="Product price"/>
                            </div>
                            <!-- Discounted Price -->
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-discount-price">Discounted
                                    Price</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="product_price"
                                    placeholder="Discounted Price"
                                    name="product_price"
                                    aria-label="Product discounted price"/>
                            </div>
                            <!-- Charge tax check box -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="product_tax_applicable" name="product_tax_applicable" checked/>
                                <label class="form-label" for="price-charge-tax"> Charge tax on this product </label>
                            </div>
                        </div>
                    </div>
                    <!-- /Pricing Card -->
                    <!-- Organize Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Organize</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <label
                                    class="form-label mb-1 d-flex justify-content-between align-items-center"
                                    for="category-org">
                                    <span>Category</span><a href="javascript:void(0);" class="fw-medium">Add new
                                        category</a>
                                </label>

                                <select id="product_category" name="product_category" class="select2 form-select"
                                        data-placeholder="Select Category">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col ecommerce-select2-dropdown">
                                <label class="form-label mb-1" for="status-org">Status </label>
                                <select id="product_status" name="product_status" class="select2 form-select" data-placeholder="Published">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3 ">
                                <label for="ecommerce-product-tags" class="form-label mb-1">Tags</label>
                                <div id="tagsdiv">
                                    <input
                                        id="product_tags"
                                        class="form-control"
                                        name="product_tags"
                                        value="Normal,Standard,Premium"
                                        aria-label="Product Tags"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger w-100">Delete Product</button>
                    <!-- /Organize Card -->
                </div>
                <!-- /Second column -->
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(function () {
            let formData = new FormData();
            let tags = []
            let images = [];
            var description = new RichTextEditor("#product_description");
            let storeUrl = "{{adminRoute('products.store')}}";
            @if($product != null)
                storeUrl = "{{adminRoute('products.update',['product' => $product->id])}}";
            @endif

            let productSaveBtnOnj = $('#saveProductBtn');

            let fieldObj = {title : $('#product_title'), mrp : $('#product_mrp'), price : $('#product_price'), tax_applicable : $('#product_tax_applicable'), category : $('#product_category'), status :  $('#product_status'),};

            $('#product-images').filepond({
                allowMultiple: true,
            });

            $('#product-images').on('FilePond:addfile', function (e) {
                images.push(e.detail.file.file)
            });

            $('#product-images').on('FilePond:removefile', function (e) {
                if (images.indexOf(e.detail.file.file) !== -1) {
                    images.splice(images.indexOf(e.detail.file.file), 1)
                }
            });

            productSaveBtnOnj.on('click',function(){
                formData = new FormData()
                if(images.length > 0){
                    images.forEach(image => {
                        formData.append('images[]',image)
                    })
                }
                formData.append('tags',tags.join(','))
                formData.append('title',fieldObj.title.val())
                formData.append('description',description.getHTMLCode())

                formData.append('mrp',fieldObj.mrp.val())
                formData.append('price',fieldObj.price.val())
                formData.append('category',fieldObj.category.val())
                formData.append('status',fieldObj.status.val())
                formData.append('tax_applicable',fieldObj.price.prop('checked'))
                saveForm(storeUrl,formData)
            })

        })

        // $("#tagsdiv input").on({
        //     focusout() {
        //         var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig, ''); // allowed characters
        //         if (txt) {
        //             let spanText = txt.toLowerCase()
        //             var button = $('<span class="badge tagBadge bg-label-primary cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-danger" data-bs-original-title="Click to remove" style="margin-right: 10px;margin-bottom: 5px"></span>');
        //             button.text(txt.toLowerCase());
        //             if (!tags.includes(spanText)) {
        //                 tags.push(spanText)
        //                 $(button).insertBefore(this);
        //             }
        //         }
        //         this.value = "";
        //     },
        //     keyup(ev) {
        //         if (/(,|Enter)/.test(ev.key)) $(this).focusout();
        //     }
        // });
        //
        //
        // $("#tagsdiv span.tagBadge").on('click',function(){
        //     alert('sdsd');
        // })

    </script>
@endsection
