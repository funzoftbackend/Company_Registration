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
  .form-group label {
    padding-right: 15% !important;
  }
  .m-1.text-center.form-control{
      width: 50% !important;
      margin-left: -2% !important;
  }
  .form-control.text-center{
      width: 25% !important;
  }
    .m-77.text-center.form-control{
  margin-left: -14% !important
}
  .form-control.text-center{
      margin-left: -10% !important;
  }
        
    }
@media (min-width: 1000px) and (max-width:1200px) {
  .m-1.text-center.form-control{
      width: 92% !important;
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
    <div class="main-div">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Transaction</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('transaction.store') }} ">
                            @csrf

                            <div class="form-row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            
                                            <label for="user_id">User</label>
                                            <select id="user_id" class="m-1 text-center form-control" name="user_id" required>
                                                 @foreach($users as $user)
                                                <option value="{{$user->id}}" {{ $user->id === old('user_id') ? 'selected' : '' }}>{{ucfirst($user->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input id="amount" type="number" class="m-11 text-center form-control" placeholder="Amount" name="amount" value="{{ old('amount') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="method">Method</label>
                                        <input id="method" type="text" class="m-66 text-center form-control" placeholder="Method" name="method" value="{{ old('method') }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tid">Owner Nationality</label>
                                        <input id="tid" type="text" class="m-77 text-center form-control" placeholder="Transaction Id" name="tid" value="{{ old('tid') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        <input id="currency" type="text" class="m-0 text-center form-control" placeholder="Currency" name="currency" value="{{ old('currency') }}" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
