@extends('layouts.app')
<style>
    .col-md-60{
        margin-right: 50% !important;
    }
    .col-md-7 {
        width: 52% !important;
        margin-left: -1% !important;
    }

</style>
@section('content')
    <div class="main-div">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Transaction</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('transaction.update',$transaction->id) }} ">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                    <div class = "col-md-7">
                                        <div class="form-group">

                                            <label for="user_id">User</label>
                                            <select id="user_id" class="m-1 text-center form-control" name="user_id" required>
                                                 @foreach($users as $user)
                                                <option value="{{$user->id}}" {{ $user->id === $transaction->user_id ? 'selected' : '' }}>{{ucfirst($user->name)}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-60">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input id="amount" type="number" class="m-11 text-center form-control" placeholder="Amount" name="amount" value="{{ $transaction->amount }}" required>
                                    </div>
                                </div>
                                <div class="col-md-60">
                                    <div class="form-group">
                                        <label for="method">Method</label>
                                        <input id="method" type="text" class="m-66 text-center form-control" placeholder="Method" name="method" value="{{ $transaction->method }}" required>
                                    </div>
                                </div>

                                <div class="col-md-60">
                                    <div class="form-group">
                                        <label for="tid">Owner Nationality</label>
                                        <input id="tid" type="text" class="m-77 text-center form-control" placeholder="Transaction Id" name="tid" value="{{ $transaction->tid }}" required>
                                    </div>
                                </div>
                                <div class="col-md-60">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        <input id="currency" type="text" class="m-0 text-center form-control" placeholder="Currency" name="currency" value="{{ $transaction->currency }}" required>
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
