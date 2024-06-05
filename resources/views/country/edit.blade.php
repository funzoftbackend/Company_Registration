@extends('layouts.app')
<style>
    .form-group {
        margin-right: 47% !important;
        margin-top: -6px !important;
        width: 50% !important;
    }
    label[for="current_flag"] {
        margin-top: 50px !important;
        display: block;
    }
    img {
        margin-top: 25px !important;
    }
    .flag-upload {
        margin-top: 25px !important;
    }
    .form-control-file{
        margin-right: -75px !important;
    }
    .country-form {
        margin-top: 30px !important;
    }
    #name{
        text-align: center !important;
    }
</style>
@section('content')
   <div class="main-div">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Country</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="country-form" method="POST" action="{{ route('country.update', $country->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Country Name</label>
                            <input id="name" type="text" class="name form-control" placeholder="Name" name="name" value="{{ $country->name }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="current_flag">Current Country Flag</label><br>
                            @if ($country->flag)
                                <img src="{{ asset($country->flag) }}" alt="Current Flag" style="max-width: 200px; max-height: 100px;">
                            @else
                                <span>No flag uploaded</span>
                            @endif
                        </div>
                        <div class="form-group flag-upload">
                            <label for="flag">New Country Flag (200x100 pixels)</label>
                            <input id="flag" type="file" class="form-control-file" name="flag" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

