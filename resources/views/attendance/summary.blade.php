@extends('layouts.app')

@section('title', 'Attendance Summary')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Attendance Summary</h5>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h4>92%</h4>
                                <p class="mb-0">Overall Attendance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h4>156</h4>
                                <p class="mb-0">Present Today</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h4>8</h4>
                                <p class="mb-0">Absent Today</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h4>4</h4>
                                <p class="mb-0">Late Today</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Total Students</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Late</th>
                                <th>Attendance Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Class 1A</td>
                                <td>35</td>
                                <td>33</td>
                                <td>2</td>
                                <td>0</td>
                                <td>94%</td>
                            </tr>
                            <tr>
                                <td>Class 1B</td>
                                <td>35</td>
                                <td>32</td>
                                <td>3</td>
                                <td>0</td>
                                <td>91%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
