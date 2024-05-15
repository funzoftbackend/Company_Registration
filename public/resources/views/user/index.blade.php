
@extends('layouts.app')
<style>

@media (max-width: 578px) { 
    .table-responsive {
    overflow-x: auto;
}
        .zmdi.zmdi-menu{
            margin-left: 26px;
            margin-top: 6px;
        }
    #toggle_nav_btn{
    padding-top:19px !important;
    }   
    }
    @media (min-width: 1200px) { 
        .zmdi.zmdi-menu{
            margin-top: 24px;
        }
        .page-wrapper{
            min-height:1020px !important;
        }
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8 text-right">
                <a href="{{ route('user.create') }}" class="btn btn-success">Add New User</a>
            </div>
        </div>
     
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>User Role</th>
                                        <th>Mobile No</th>
                                        <th>Country</th>
                                        <th>Package Name</th>
                                        <th>Package_price</th>
                                        <th>Passport Front</th>
                                        <th>Passport Back</th>
                                        <th>Amount</th>
                                        <th>Amount Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->user_role) }}</td>
                                            <td>{{ $user->mobile_no }}</td>
                                            <td>{{ ucfirst($user->country) }}</td>
                                            <td>{{ ucfirst($user->package_name) }}</td>
                                            <td>{{ $user->package_price }}</td>
                                            <td>{{ $user->passport_one_img }}</td>
                                            <td>{{ $user->passport_two_img }}</td>
                                            <td>{{ $user->amount }}</td>
                                            <td>{{ $user->amount_type }}</td>
                                            <td> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('user.edit', ['user_id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                                <form method="POST" id="delete" action="{{ route('user.destroy', $user->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
