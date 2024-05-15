
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
                <a href="{{ route('company.create') }}" class="btn btn-success">Add New Company</a>
            </div>
        </div>
     
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Company List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Capital</th>
                                        <th>currency</th>
                                        <th>No. of Partners</th>
                                        <th>Owner Nationality</th>
                                        <th>Company Type</th>
                                        <th>Financial Year Ending Date</th>
                                        <th>Status</th>
                                        <th>Suggested Names</th>
                                        <th>Activities</th>
                                        <th>Application</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ ucfirst($company->capital) }}</td>
                                            <td>{{ $company->currency }}</td>
                                            <td>{{ ucfirst($company->number_of_partners) }}</td>
                                            <td>{{ ucfirst($company->owner_nationality) }}</td>
                                            <td>{{ $company->company_type }}</td>
                                            <td>{{ $company->financial_year_ending_date }}</td>
                                            <td>{{ $company->status }}</td>
                                            <td>{{ $company->suggested_names }}</td>
                                            <td>{{ $company->activities }}</td>
                                            <td>{{ $company->application_id }}</td>
                                            <td> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('company.edit', ['company_id' => $company->id]) }}" class="btn btn-primary">Edit</a>
                                                <form method="POST" id="delete" action="{{ route('company.destroy', $company->id) }}">
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
