@extends('layouts.app')

@section('title', 'Subject Schedule')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Subject Schedule</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>08:00 - 09:00</td>
                                <td>Mathematics</td>
                                <td>English</td>
                                <td>Mathematics</td>
                                <td>Science</td>
                                <td>English</td>
                            </tr>
                            <tr>
                                <td>09:00 - 10:00</td>
                                <td>Science</td>
                                <td>Mathematics</td>
                                <td>English</td>
                                <td>Mathematics</td>
                                <td>Science</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
