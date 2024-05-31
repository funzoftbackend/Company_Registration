@extends('layouts.app')

<style>
.btn.btn-danger{
  margin-top: 15px !important;
}
@media (max-width: 578px) { 
    .table-responsive {
        overflow-x: auto;
    }
}
</style>


@section('content')
<div class="main-div">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 text-right">
                    <select name="user_role" id="user-filter-dropdown" class="form-control mr-2">
                        <option value="">All</option>
                        @foreach($roles as $role)
                            @if(!empty($role))
                            <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                            @endif
                        @endforeach
                    </select>
            <a href="{{ route('user.create') }}" class="btn btn-success">Add New User</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User List</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="user-table" class="table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>User Role</th>
                                    <th>Mobile No</th>
                                    <th>Country</th>
                                    <th>Package Name</th>
                                    <th>Package Price</th>
                                    <th>Passport Front</th>
                                    <th>Passport Back</th>
                                    <th>Amount</th>
                                    <th>Amount Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('user.partials.user_table', ['users' => $users])
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
