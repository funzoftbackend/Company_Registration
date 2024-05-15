@extends('layouts.app')
<style>
@media (max-width: 578px) { 
    .table-responsive {
    overflow-x: auto;
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
        .mt-2{
            margin-top:4%;
        }
    }
</style>
@section('content')
    <div class="container">
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
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->type }}</td>
                                            <td>{{ $application->payment_status }}</td>
                                            <td>{{ $application->status }}</td>
                                            <td> <!-- Added action column -->
                                                <!-- Add your action buttons or links here -->
                                                <a href="{{ route('application-details.show', ['application' => $application->id]) }}" class="btn btn-info">View Detail</a>
                                                <form method="POST" id="delete" action="{{ route('application.proceed', $application->id) }}">
                                                        @csrf
                                                        <input type = "hidden" name = "application_id" value = "{{$application->id}}">
                                                        <button type="submit" class="btn btn-success">Proceed Forward</button>
                                                    </form>
                                                <button type="button" class="btn btn-danger reject-button mt-2" data-application-id="{{ $application->id }}">Reject</button>
                                                <form method="POST" id="reject-form-{{ $application->id }}" action="{{ route('application.reject') }}" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="application_id" value="{{ $application->id }}">
                                                    <input type="text" name="reason" class="form-control reason-input" placeholder="Enter rejection reason" required>
                                                    <button type="submit" class="btn btn-danger mt-2">Confirm Rejection</button>
                                                </form>
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
