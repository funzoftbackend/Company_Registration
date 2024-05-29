@extends('layouts.app')

@section('content')
<div class="main-div">
    <h2>Enter Company Registration Number (CRN)</h2>
    <form method="POST" action="{{ route('application.save_crn', $application->id) }}">
        @csrf
        <div class="form-group">
            <label for="CRN">Company Registration Number (CRN)</label>
            <input type="text" class="form-control" id="CRN" name="CRN" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
