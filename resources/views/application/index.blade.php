
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
            margin-top: -16px;
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
                <a href="{{ route('application.create') }}" class="btn btn-success">Add New Application</a>
            </div>
        </div>
     
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Application List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Payment Status(%)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($applications as $application)
                                        <tr>
                                            <td>{{ $application->user->name }}</td>
                                             <td>{{ $application->type }}</td>
                                              <td>{{ $application->payment_status }}</td>
                                            <td> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('application.edit', ['application_id' => $application->id]) }}" class="btn btn-primary">Edit</a>
                                                <form method="POST" id="delete" action="{{ route('application.destroy', $application->id) }}">
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
