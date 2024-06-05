
@extends('layouts.app')
<style>
@media (max-width: 578px) {
    .table-responsive {
    overflow-x: auto;
    }.col-md-8{
    padding-right: 7px !important;
    }
    }
      @media (min-width: 1200px) {
        .mt-2{
            margin-top:4%;
        }
        .main-div{
            padding-right:14px;
        }
    }
    .btn-info {
        color: #fff;
        background-color: #17a2b8 !important;
        border-color: #17a2b8 !important;
    }

    .btn-info:hover {
        color: #fff !important;
        background-color: #138496 !important;
        border-color: #117a8b !important;
    }
</style>
@section('content')
    <div class="main-div">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8 text-right">
            <select name="status" id="status-filter-dropdown" class="form-control mr-2">
                <option value="">All</option>
                @foreach($statuses as $status)
                    @if(!empty($status))
                        <option value="{{ $status['id'] }}">{{ ucfirst($status['name']) }}</option>
                    @endif
                @endforeach
            </select>
                <select id="filter-dropdown" class="form-control">
                    <option value="">All</option>
                    <option value="rejected">Rejected</option>
                    <option value="not_rejected">Not Rejected</option>
                </select>
                <!--<a href="{{ route('application.create') }}" class="btn btn-success">Add New Application</a>-->
                 
            </div>
        </div>
       

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Application List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="applications-table" class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Payment Status(%)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $application)
                                        <tr>
                                                                                        @if($application->user)
                                            <td>{{ $application->user->name }}</td>
                                            @else
                                            <td>User Not Found</td>
                                            @endif
                                            <td>{{ $application->type->name }}</td>
                                            <td>{{ $application->payment_status }}</td>
                                             @if(!empty($application->status))
                                            <td>{{ $application->status }}</td>
                                            @else
                                            <td>Status Not Found</td>
                                            @endif</td>
                                            <td> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('application-details.show', ['application' => $application->id]) }}" class="btn btn-info">View Detail</a>

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
