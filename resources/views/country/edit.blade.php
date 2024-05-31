@extends('layouts.app')
<style>
 .form-control {
  padding-left: 1%;
  width: 27%;
}
   .name{
       margin-left: -59px !important;
   }
   .flag{
       margin-left: -3% !important;
   }
   .form-control.services{
       margin-left: -67px !important;
   }
   .form-control.level{
       margin-left: -67px !important;
   }
    @media (max-width: 400px) { 
        .form-row {
            width: 800px !important;
        }
          .form-control.text-center {
            width: 37% !important;
          }
        
    }
    @media (min-width:1000px) { 
        .zmdi.zmdi-menu{
            margin-top: -16px;
        }
         .m-2.text-center.form-control {
        margin-left: 15% !important;
      }
      .m-6.text-center.form-control {
        margin-left: 6% !important;
      }
        .page-wrapper{
            min-height:1020px !important;
        }
    }
    @media (max-width:578px) { 
        .form-row{
            width: 836px !important;
        }
        .zmdi.zmdi-menu{
            margin-left: 26px;
            margin-top: 26px;
        }
        .btn.btn-primary{
        margin-left: 3%;
        }
        .m-1 {
        margin-left: 1% !important;
        }
        .m-2 {
        margin-left: 5% !important;
        }
        .m-233{
        margin-left: 2% !important;
        }
        .form-control.text-center{
            width:40%;
        }
        .form-group label{
        padding-right: 7%;
        }
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
                    <form method="POST" action="{{ route('country.update', $country->id) }}" enctype="multipart/form-data">
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
                        <div class="form-group">
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

