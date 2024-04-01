@extends('admin.layout.auth')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [['title' => 'Inquiries','route' => 'inquiries.index']]])
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Inquiries</h5>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Date Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($inquiries))
                            @foreach($inquiries as $inquiry)
                                <tr>
                                    <td>
                                        {{$inquiry->name}}
                                    </td>
                                    <td>
                                        {{$inquiry->email}}
                                    </td>
                                    <td>
                                        {{$inquiry->mobile}}
                                    </td>
                                    <td>
                                        {{$inquiry->message}}
                                    </td>
                                    <td>
                                        {{ $inquiry->created_at_formatted }}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No Inquiries</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="5">
                                {{ $inquiries->links() }}
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
