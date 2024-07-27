@extends('layout.backend')

@section('content')

<h1>ធ្វើបច្ចុប្បន្នភាពសិស្ស</h1>
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Something is Wrong</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('student.update', $student->id) }}" class="p-4 shadow-sm rounded">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="stu_id" class="form-label">ID សិស្ស:</label>
        <input type="text" class="form-control" id="stu_id" name="stu_id" value="{{ $student->stu_id }}" placeholder="Enter Student ID">
    </div>
    <div class="form-group mb-3">
        <label for="phone" class="form-label">លេខទូរស័ព្ទ:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" placeholder="Enter Phone Number">
    </div>
    <div class="form-group mb-3">
        <label for="fac_id" class="form-label">ជំនាញ:</label>
        <select class="form-control" id="fac_id" name="fac_id">
            <option value="">ជ្រើសរើសមហាវិទ្យាល័យ</option>
            @foreach ($faculty as $fac)
                <option value="{{ $fac->id }}" {{ $student->fac_id == $fac->id ? 'selected' : '' }}>{{ $fac->fac_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="name" class="form-label">ឈ្មោះ:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" placeholder="Enter Name">
    </div>
    <div class="form-group mb-3">
        <label for="year_id" class="form-label">ឆ្នាំ:</label>
        <select class="form-control" id="year_id" name="year_id">
            <option value="">ជ្រើសរើសឆ្នាំ</option>
            @foreach ($years as $year)
                <option value="{{ $year->id }}" {{ $student->year_id == $year->id ? 'selected' : '' }}>{{ $year->year_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary me-2">ធ្វើបច្ចុប្បន្នភាព</button>
    <a class="btn btn-secondary" href="{{ route('student.list') }}">ថយក្រោយ</a>
</form>

<!-- Include Toastify CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(Session::has('student_update'))
        Toastify({
            text: "{{ session('student_update') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4CAF50",
        }).showToast();
        @endif
    });
</script>

@endsection
