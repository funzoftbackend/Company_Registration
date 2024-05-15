
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
                <a href="{{ route('country.create') }}" class="btn btn-success">Add New Country</a>
            </div>
        </div>
     
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Country List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th colspan = "3">Flag</th>
                                        <th colspan = "3">Services</th>
                                        <th colspan = "3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($countries as $country)
                                        <tr>
                                            <td>{{ $country->name }}</td>
                                             <td colspan = "3">{{ $country->flag }}</td>
                                             <td colspan = "3">
                                        @php if(!empty($country->services)){ @endphp
                                            @foreach($country->services as $service)
                                                    
                                                        <ul>
                                                        <li>{{ $service->name}}</li>
                                                        </ul>
                                                    
                                                @endforeach
                                             </td>
                                     @php }else{ @endphp
                                             <td>Service Not Found</td>
                                             @php } @endphp
                                            <td colspan = "3"> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('country.edit', ['country_id' => $country->id]) }}" class="btn btn-primary">Edit</a>
                                                <form method="POST" id="delete" action="{{ route('country.destroy', $country->id) }}">
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
