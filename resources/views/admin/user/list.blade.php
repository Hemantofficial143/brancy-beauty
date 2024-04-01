@extends('admin.layout.auth')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('admin.includes.breadcrumb',['list' => [['title' => 'User','route' => 'users.index']]])
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Users</h5>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Joined At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->mobile}}
                                    </td>
                                    <td>
                                        {{$user->created_at_formatted}}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No Users</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="5">
                                {{ $users->links() }}
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
