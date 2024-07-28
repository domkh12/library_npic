@extends('layout.backend')
@section('content')

<h1 class="mb-4">Generate Reports</h1>

<div class="card p-4 shadow-sm">
    <form method="POST" action="{{ route('reports.generate') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="report_type" class="form-label">Report Type</label>
            <select name="report_type" id="report_type" class="form-control" required>
                <option value="">Select Report Type</option>
                <option value="students">Students</option>
                <option value="books">Books</option>
                <option value="attendances">Attendance</option>
                <option value="borrowings">Borrowings</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Generate Report</button>
        </div>
    </form>
</div>

@endsection
