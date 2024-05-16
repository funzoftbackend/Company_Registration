@extends('layouts.app')

@section('content')
    <div class="container">
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
                                                    <li><a href="{{ $partner->passport_url }}">{{ $partner->passport_url }}</a></li>
                                                    <li>{{$partner->designation}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('application.index') }}"><button class = "btn btn-primary">Back To Application List</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
