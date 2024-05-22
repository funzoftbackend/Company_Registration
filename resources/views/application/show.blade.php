@extends('layouts.app')

<style>
    .btn-success {
        margin-top: -18px !important;
        margin-left: 10px !important;
        width: 170px !important;
        height: 37px !important;
    }

    .btn-container {
        display: flex;
        justify-content: flex-start;
        width: 200px;
        height: 50px;
        margin-right: 10px;
        border-radius: 10px !important;
    }

    .btn {
        margin-right: 10px;
        border-radius: 10px !important;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        border-radius: 25px !important;
        background-color: white !important;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 25%;
        max-width: 500px;
    }

    .close {
        float: right;
        font-size: 25px;
        margin-top: -30px !important;
    }

    .modal-dialog .modal-content {
        border-radius: 28px;
        border: 2px solid #e8f1fe;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-primary:focus,
    .btn-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    .btn-danger {
        height: 38px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .btn-success {
            margin-top: 0 !important;
            margin-left: 0 !important;
            width: 100% !important;
        }
        .btn-danger {
            height: 50px;
        }
        .btn-container {
            width: 100%;
            flex-direction: column;
            align-items: flex-start;
        }
        .main-div{
            height: 100% !important;
        }

        .btn {
            margin-right: 0;
            margin-bottom: 5px;
            width: 78%;
        }

        .modal-content {
            width: 60%;
        }
        .btn-primary {
            margin-top: 10px !important;
        }
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
                                    @if ($user)
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
                                                <li><a href="{{ $url }}">{{ $partner->passport_url }}</a></li>
                                                <li>{{ $partner->designation }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-container">
                                    @IF($selectedapplication->is_rejected == 0)
                                    <form method="POST" id="delete"
                                        action="{{ route('application.proceed', $selectedapplication->id) }}">
                                        @csrf
                                        <input type="hidden" name="application_id" value="{{ $selectedapplication->id }}">
                                        <button type="submit" class="btn btn-success">Proceed Forward</button>
                                    </form>
                                    @endif
                                    <div id="rejectModal_{{ $selectedapplication->id }}" class="modal" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Rejection Reason</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background: none;">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" id="reject-form-{{ $selectedapplication->id }}"
                                                        action="{{ route('application.reject') }}">
                                                        @csrf
                                                        <input type="hidden" name="application_id"
                                                            value="{{ $selectedapplication->id }}">
                                                        <div class="form-group">
                                                            <textarea name="reason" class="form-control" id="reason" placeholder="Enter rejection reason"
                                                                style="width: 100%; height: 100px;" required></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-danger mt-2"
                                                        onclick="submitRejectForm('{{ $selectedapplication->id }}')">Confirm
                                                        Rejection</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger reject-button" data-toggle="modal"
                                        data-target="#rejectModal_{{ $selectedapplication->id }}">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitRejectForm(applicationId) {
            // Submit the form when the Confirm Rejection button is clicked
            document.getElementById('reject-form-' + applicationId).submit();
        }
        // Show reason input when reject button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            const rejectButtons = document.querySelectorAll('.reject-button');

            rejectButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const applicationId = this.getAttribute('data-application-id');
                    const rejectForm = document.getElementById('reject-form-' + applicationId);
                    const reasonInput = rejectForm.querySelector('.reason-input');

                    // Toggle display of the reject form
                    rejectForm.style.display = rejectForm.style.display === 'none' ? 'block' :
                        'none';

                    // If the form is displayed, focus on the reason input
                    if (rejectForm.style.display === 'block') {
                        reasonInput.focus();
                    }
                });
            });
        });
    </script>
@endsection
