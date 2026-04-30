@extends('layouts.app')

@section('title', 'Attendance Report')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Attendance Report</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="reportClass" class="form-label">Class</label>
                        <select class="form-select" id="reportClass">
                            <option value="">All Classes</option>
                            <option value="1A">Class 1A</option>
                            <option value="1B">Class 1B</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="reportMonth" class="form-label">Month</label>
                        <select class="form-select" id="reportMonth">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="reportYear" class="form-label">Year</label>
                        <select class="form-select" id="reportYear">
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-primary w-100">Generate Report</button>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Total Days</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Late</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Smith</td>
                                <td>22</td>
                                <td>20</td>
                                <td>2</td>
                                <td>0</td>
                                <td>91%</td>
                            </tr>
                            <tr>
                                <td>Sarah Johnson</td>
                                <td>22</td>
                                <td>21</td>
                                <td>1</td>
                                <td>0</td>
                                <td>95%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
