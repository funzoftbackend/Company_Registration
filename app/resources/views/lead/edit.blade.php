@extends('layouts.app')
<style>
    .zmdi.zmdi-menu{
            margin-top: -16px;
        }
        @media (min-width: 1200px) { 
        .page-wrapper{
            min-height:1020px;
        }
    }
    @media (max-width: 400px) { 
        .form-row {
            width: 800px !important;
        }
        
    }
    @media (1000px) { 
        .zmdi.zmdi-menu{
            margin-top: -16px;
        }
        .page-wrapper{
            min-height:1020px !important;
        }
    }
    @media (max-width:578px) { 
        .form-row{
            width: 900px !important;
        }
        .page-wrapper{
            min-height:566px !important;
        }
        .zmdi.zmdi-menu{
            margin-left: 26px;
            margin-top: 26px;
        }
        .m-1 {
        margin-left: -4% !important;
        }
        .m-2 {
        margin-left: 5% !important;
        }
        .m-233{
        margin-left: 2% !important;
        }
        .form-group label{
        padding-right: 7%;
        }
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update lead</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('lead.update',$lead->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="leads_created_by">Lead Created By</label>
                                            @foreach($users as $user)
                                            <select id="leads_created_by" class="m-1 text-center form-control" name="user_id" required>
                                                <option value="{{$user->id}}" {{ $user->id === $lead->leads_created_by ? 'selected' : '' }}>{{ucfirst($user->name)}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                     <div class = "col-md-6">
                                        <div class="form-group">
                                          
                                            <label for="application_id">Application Id</label>
                                            <select id="application_id" class="m-11 text-center form-control" name="user_id" required>
                                                  @foreach($applications as $application)
                                                <option value="{{$application->id}}" {{ $application->id === $lead->application_id ? 'selected' : '' }}>{{ucfirst($application->id)}}</option>
                                                  @endforeach
                                            </select>
                                          
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
