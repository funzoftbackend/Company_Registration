
@extends('layouts.app')
<style>
@media (max-width: 578px) { 
    .table-responsive {
    overflow-x: auto;
}
.page-wrapper{
            min-height:566px !important;
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
    <div class="main-div">
        <div class="row justify-content-center mb-3">
            @if($user->user_role === 'Lead Generator')
            <div class="col-md-8 text-right">
                <a href="{{ route('lead.create') }}" class="btn btn-success">Add New Lead</a>
            </div>
            @endif
        </div>
     
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lead List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table lead-table">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Phone</th>
                                         @if($user->user_role === 'Lead Manager')
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($leads as $lead)
                                        <tr>
                                            <td>{{ $lead->email }}</td>
                                            <td>{{ $lead->phone_number }}</td>
                                            @if($user->user_role === 'Lead Manager')
                                            <td> 
                                                <a href="{{ route('application.create',['email' => $lead->email]) }}" class="btn btn-success">Add Application</a>
                                                <form method="POST" id="delete" action="{{ route('lead.destroy', $lead->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            @endif
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
