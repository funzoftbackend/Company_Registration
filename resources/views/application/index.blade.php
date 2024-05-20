
@extends('layouts.app')
<style>
@media (max-width: 578px) { 
    .table-responsive {
    overflow-x: auto;
    }.col-md-8{
    padding-right: 7px !important;
    }
    }
      @media (min-width: 1200px) { 
        .mt-2{
            margin-top:4%;
        }
        .main-div{
            padding-right:14px;
        }
    }
</style>
@section('content')
    <div class="main-div">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8 text-right">
                <a href="{{ route('application.create') }}" class="btn btn-success">Add New Application</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Application List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Payment Status(%)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $application)
                                        <tr>
                                                                                        @if($application->user)
                                            <td>{{ $application->user->name }}</td>
                                            @else
                                            <td>User Not Found</td>
                                            @endif
                                            <td>{{ $application->type->name }}</td>
                                            <td>{{ $application->payment_status }}</td>
                                             @if(!empty($application->status))
                                            <td>{{ $application->status }}</td>
                                            @else
                                            <td>Status Not Found</td>
                                            @endif</td>
                                            <td> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('application-details.show', ['application' => $application->id]) }}" class="btn btn-info">View Detail</a>
                                                
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
