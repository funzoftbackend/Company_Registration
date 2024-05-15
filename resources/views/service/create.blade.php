@extends('layouts.app')
<style>
 
    @media (min-width: 1200px) { 
        .zmdi.zmdi-menu{
            margin-top: -16px;
        }
        .form-group label {
    padding-right: 10%;
    }
        .page-wrapper{
            min-height:1020px !important;
        }
    }
    @media (max-width: 400px) { 
        .form-row {
            width: 990px !important;
        }
        
    }
    @media (min-width: 1200px) {
  .form-group label.country {
    padding-right: 0% !important;
  }
   .form-group label.name {
    padding-right: 8% !important;
  }
  #countries{
      height: 150px;
  }
}
    @media (max-width:578px) { 
        .form-row{
            width: 900px !important;
        }
        .m-14{
            width:40% !important;
        }
        .m-1 {
        margin-left: 1% !important;
        }
        .zmdi.zmdi-menu{
            margin-left: 26px;
            margin-top: 26px;
        }
        .m-2 {
        margin-left: 5% !important;
        }
        .m-233{
        margin-left: 2% !important;
        }
        .form-group label{
        padding-right: 0% !important;
        }
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Service</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('service.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="name" for="service_name">Name</label>
                                            <input id="service_name" type="text" class="m-2 text-center form-control" placeholder="Name" name="service_name" value="{{ old('service_name') }}" required autofocus>
                                            @error('service_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class = "country" for="countries">Select Countries</label>
                                        <select id="countries" class="m-2 text-center form-control" name="countries[]" multiple required>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id}}" @if(old('countries') == $country->id) selected @endif>{{ucfirst($country->name)}}</option>
                                            @endforeach
                                        </select>
                                        @error('countries')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class = "country" for="select-all-countries">Select All Countries</label>
                                    <input id="select-all-countries" type="checkbox" name="select_all_countries">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('select-all-countries').addEventListener('change', function () {
            var countriesSelect = document.getElementById('countries');
            if (this.checked) {
                for (var i = 0; i < countriesSelect.options.length; i++) {
                    countriesSelect.options[i].selected = true;
                }
            } else {
                for (var i = 0; i < countriesSelect.options.length; i++) {
                    countriesSelect.options[i].selected = false;
                }
            }
        });
    </script>
@endsection
