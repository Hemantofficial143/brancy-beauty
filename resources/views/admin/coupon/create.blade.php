@extends('admin.layout.auth')
@section('style')
    <style>
        .promorandom .switch .switch-input:checked ~ .switch-toggle-slider::after {
            left: 68%;
        }
        .discount_type .switch .switch-input:checked ~ .switch-toggle-slider::after {
            left: 75%;
        }

    </style>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [
                        ['title' => 'Promo codes','route' => 'promo-codes.index'],
                        ['title' => 'Add','route' => 'promo-codes.create'],
                        ]])

        <div class="app-ecommerce">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Promocode information</h5>
                        </div>
                        <div class="card-body">
                            <form id="promoForm">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="code">Promo Code</label>
                                    <div class="input-group">
                                        <div class="input-group-text promorandom">
                                            <label class="switch switch-square">
                                                <input type="checkbox" class="switch-input" id="promorandom" name="promorandom">
                                                <span class="switch-toggle-slider" style="width: 65px">
                                                    <span class="switch-on">Random</span>
                                                    <span class="switch-off">Manual</span>
                                              </span>
                                                <span class="switch-label"></span>
                                            </label>
                                        </div>
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="discount_code"
                                            placeholder="Enter promo code"
                                            name="discount_code"
                                            aria-label="Enter promo code">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="code">Discount Value</label>
                                    <div class="input-group">
                                        <div class="input-group-text discount_type" style="width: 8%">
                                            <label class="switch switch-square">
                                                <input type="checkbox" class="switch-input" id="discount_type" name="discount_type">
                                                <span class="switch-toggle-slider" style="width: 86px">
                                                    <span class="switch-on">Fixed Price</span>
                                                    <span class="switch-off">Percentage</span>
                                              </span>
                                                <span class="switch-label"></span>
                                            </label>
                                        </div>
                                        <input
                                            required
                                            min="1"
                                            max="100"
                                            type="number"
                                            class="form-control"
                                            id="discount_type_value"
                                            placeholder="Enter Percentage"
                                            name="discount_type_value"/>
                                        <span class="input-group-text " id="discount_type_icon">%</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="code">Minimum order value</label>
                                    <div class="input-group">
                                        <div class="input-group-text discount_type" style="width: 8%">
                                            <label class="switch switch-square">
                                                <input type="checkbox" class="switch-input" id="min_order_state" name="min_order_state">
                                                <span class="switch-toggle-slider" style="width: 86px">
                                                    <span class="switch-on">Enable</span>
                                                    <span class="switch-off">Disable</span>
                                              </span>
                                                <span class="switch-label"></span>
                                            </label>
                                        </div>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="min_order_value"
                                            disabled="disabled"
                                            placeholder="Enter amount"
                                            name="min_order_value"/>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a  class="btn btn-danger" href="{{ adminRoute('promo-codes.index') }}">
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

        let form = $('#promoForm')
        let codeRandomSwitchObj = $('#promorandom');
        let codeFieldObj = $('#discount_code');
        let discountTypeSwitchObj = $('#discount_type');
        let discountTypeValueObj = $('#discount_type_value');
        let discountTypeIconObj = $('#discount_type_icon');
        let minOrderSwitchObj = $('#min_order_state');
        let minOrderValueObj = $('#min_order_value');



        function generateCouponCode(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let couponCode = '';
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                couponCode += characters[randomIndex];
            }
            return couponCode;
        }

        $(function () {
            codeRandomSwitchObj.on('change', function () {
                if ($(this).prop('checked')) {
                    let $couponCode = generateCouponCode(10);
                    codeFieldObj.val($couponCode)
                    codeFieldObj.prop('disabled', true)
                } else {
                    codeFieldObj.prop('disabled', false)
                    codeFieldObj.val('')
                }
            })

            discountTypeSwitchObj.on('change', function () {
                if ($(this).prop('checked')) {
                    discountTypeValueObj.val('')
                    discountTypeValueObj.prop('placeholder','Enter Amount')
                    discountTypeIconObj.html('₹')
                    discountTypeValueObj.prop('min','')
                    discountTypeValueObj.prop('max','')
                } else {
                    discountTypeValueObj.val('')
                    discountTypeValueObj.prop('placeholder','Enter Percentage')
                    discountTypeValueObj.prop('min',1)
                    discountTypeValueObj.prop('max',100)
                    discountTypeIconObj.html('%')
                }
            })
            minOrderSwitchObj.on('change',function(){
                if ($(this).prop('checked')) {
                    minOrderValueObj.prop('required',true)
                    minOrderValueObj.prop('disabled',false)
                    minOrderValueObj.val('')
                }else{
                    minOrderValueObj.prop('required',false)
                    minOrderValueObj.prop('disabled',true)
                    minOrderValueObj.val('')
                }
            })

            form.on('submit',function(e){
                e.preventDefault()
                const formData = new FormData()
                formData.append('code',codeFieldObj.val())
                formData.append('type',discountTypeSwitchObj.prop('checked') ? 'FIXED' : 'PERCENTAGE')
                formData.append('value',discountTypeValueObj.val())
                formData.append('min_order_value',minOrderValueObj.val())
                saveForm("{{adminRoute('promo-codes.store')}}",formData,"{{ adminRoute('promo-codes.index') }}");
            })
        })
    </script>
@endsection
