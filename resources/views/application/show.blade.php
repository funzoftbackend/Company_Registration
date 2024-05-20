@extends('layouts.app')
<style>
    .mt-2{
            margin-top:1%;
        }
    .col-md-6{
        width:50%;
    }
</style>
@section('content')
    <div class="main-div">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Application Details</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>User Name</th>
                                    @if($user)
                                    <td>{{ $user->name }}</td>
                                     @else
                                    <td>User Not Found</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Company Name</th>
                                    <td>{{ $company->name }}</td>
                                </tr>
                                <tr>
                                    <th>Company Capital</th>
                                    <td>{{ $company->capital }}</td>
                                </tr>
                                <tr>
                                    <th>Company Currency</th>
                                    <td>{{ $company->currency }}</td>
                                </tr>
                                <tr>
                                    <th>Company Type</th>
                                    <td>{{ $company->company_type }}</td>
                                </tr>
                                <tr>
                                    <th>Number of Partners</th>
                                    <td>{{ $company->number_of_partners }}</td>
                                </tr>
                                <tr>
                                    <th>Owner Nationality</th>
                                    <td>{{ $company->owner_nationality }}</td>
                                </tr>
                                <tr>
                                    <th>Company Status</th>
                                    <td>{{ $company->status }}</td>
                                </tr>
                                <tr>
                                    <th>Company Suggested Name</th>
                                    <td>{{ $company->suggested_names }}</td>
                                </tr>
                                <tr>
                                    <th>Financial Year Ending Date</th>
                                    <td>{{ $company->financial_year_ending_date }}</td>
                                </tr>
                                <tr>
                                    <th>Company Activities</th>
                                    <td>{{ $company->activities }}</td>
                                </tr>
                                <tr>
                                    <th>Partners Details</th>
                                    <td>
                                        <ul>
                                            @foreach ($partners as $partner)
                                                    <li>{{ $partner->name }}</li>
                                        @php
                                        $url = url('') . '/public/' . $partner->passport_url;
                                        @endphp
                                                    <li><a href="{{$url}}">{{ $partner->passport_url }}</a></li>
                                                    <li>{{$partner->designation}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <div class="row">
                                    <div class = "col-md-12">
                                        <div class = "col-md-6">
                                            <form method="POST" id="delete" action="{{ route('application.proceed', $selectedapplication->id) }}">
                                                                    @csrf
                                                                    <input type = "hidden" name = "application_id" value = "{{$selectedapplication->id}}">
                                                                    <button type="submit" class="btn btn-success">Proceed Forward</button>
                                            </form>
                                        </div>
                                         <div class = "col-md-6">
                                            <button type="button" class="btn btn-danger reject-button mt-2" data-application-id="{{ $selectedapplication->id }}">Reject</button>
                                                            <form method="POST" id="reject-form-{{ $selectedapplication->id }}" action="{{ route('application.reject') }}" style="display: none;">
                                                                @csrf
                                                                <input type="hidden" name="application_id" value="{{ $selectedapplication->id }}">
                                                                <input type="text" name="reason" class="form-control reason-input" placeholder="Enter rejection reason" required>
                                                                <button type="submit" class="btn btn-danger mt-2">Confirm Rejection</button>
                                           
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script>
        // Show reason input when reject button is clicked
        document.addEventListener('DOMContentLoaded', function () {
            const rejectButtons = document.querySelectorAll('.reject-button');

            rejectButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const applicationId = this.getAttribute('data-application-id');
                    const rejectForm = document.getElementById('reject-form-' + applicationId);
                    const reasonInput = rejectForm.querySelector('.reason-input');

                    // Toggle display of the reject form
                    rejectForm.style.display = rejectForm.style.display === 'none' ? 'block' : 'none';

                    // If the form is displayed, focus on the reason input
                    if (rejectForm.style.display === 'block') {
                        reasonInput.focus();
                    }
                });
            });
        });
    </script>
@endsection
