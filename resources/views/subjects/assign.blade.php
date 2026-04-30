@extends('layouts.app')

@section('title', 'Subject Assignment')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Subject Assignment</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Class</th>
                                <th>Period</th>
                                <th>Room</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mathematics</td>
                                <td>Mr. John Smith</td>
                                <td>Class 1A</td>
                                <td>Period 1-2</td>
                                <td>Room 101</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>English</td>
                                <td>Mrs. Sarah Johnson</td>
                                <td>Class 1B</td>
                                <td>Period 3-4</td>
                                <td>Room 102</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
