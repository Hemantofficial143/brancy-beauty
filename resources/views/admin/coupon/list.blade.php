@extends('admin.layout.auth')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [['title' => 'Promo codes','route' => 'promo-codes.index']]])
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Promocodes</h5>
                <a class="float-end btn btn-primary" href="{{ adminRoute('promo-codes.create') }}">Add New</a>
            </div>

            <div class="card-datatable table-responsive">
                <table class="table">
                    <thead>
                    <tr>

                        <th>Code</th>
                        <th>Discount type</th>
                        <th>Discount value</th>
                        <th>Min order value</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(!empty($promoCodes->all()))
                        @foreach($promoCodes as $code)
                            <tr>
                                <td>
                                    {{$code->code}}
                                </td>
                                <td>
                                    {{$code->type}}
                                </td>
                                <td>
                                    @if($code->type == \App\Models\PromoCode::TYPE_FIXED)
                                        ₹ {{$code->value}}
                                    @elseif($code->type == \App\Models\PromoCode::TYPE_PERCENTAGE)
                                        {{$code->value}} %
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($code->min_order_value))
                                        ₹ {{$code->min_order_value}}
                                    @endif

                                </td>
                                <td>
                                    @if($code->used_at)
                                        <span class="badge bg-danger">Used</span> at {{$code->used_at}}
                                    @else
                                        <span class="badge bg-success">Not Used</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-danger delete" data-url="{{ adminRoute('promo-codes.destroy',['promo_code' => $code->id]) }}" href="javascript:void(0)" >Delete</a>
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
                            {{$promoCodes->links()}}
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
                deleteData($(this).data('url'),"{{ adminRoute('promo-codes.index') }}")
            })
        })
    </script>
@endsection
