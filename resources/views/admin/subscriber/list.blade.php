@extends('admin.layout.auth')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [['title' => 'Subscribers','route' => 'subscribers.index']]])
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Subscribers</h5>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Subscribed At</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($subscribers))
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>
                                    {{$subscriber->email}}
                                </td>

                                <td>
                                    {{$subscriber->created_at_formatted}}
                                </td>
                                <td>
                                    @if($subscriber->deleted_at == null)
                                        <span class="badge bg-success">Subscribed</span>
                                    @else
                                        <span class="badge bg-danger">UnSubscribed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Subscribers</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="5">
                            {{ $subscribers->links() }}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
