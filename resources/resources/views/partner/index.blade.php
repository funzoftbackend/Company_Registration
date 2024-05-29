
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
    .text-center{
        text-align:center;
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
    <div class="main-div">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8 text-right">
                <a href="{{ route('partner.create') }}" class="btn btn-success">Add New Partner</a>
            </div>
        </div>
     
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Partner List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Name</th>
                                        <th>Passport Url</th>
                                        <th>Designation</th>
                                        <th>Nationality</th>
                                        <th>DOB</th>
                                        <th>Passport Number</th>
                                        <th>Passport Expiry Date</th>
                                        <th>Passport Issue Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($partners as $partner)
                                        <tr>
                                            <td>{{ $partner->company->name }}</td>
                                            <td>{{ ucfirst($partner->name) }}</td>
                                            <td class="text-center">{{ $partner->passport_url }}</td>
                                            <td>{{ $partner->designation }}</td>
                                            <td>{{ $partner->nationality }}</td>
                                            <td>{{ $partner->DOB }}</td>
                                            <td>{{ $partner->passport_number }}</td>
                                            <td>{{ $partner->passport_date_of_expiry }}</td>
                                            <td>{{ $partner->passport_date_of_issue }}</td>
                                            <td> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('partner.edit', ['partner_id' => $partner->id]) }}" class="btn btn-primary">Edit</a>
                                                <form method="POST" id="delete" action="{{ route('partner.destroy', $partner->id) }}">
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
