@extends('layout.backend')

@section('content')
    <h1>Create Student</h1>
    @if(Session::has('student_create'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Primary!</strong> {!! session('student_create') !!}
        </div>
    @endif
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
    <form method="POST" action="{{ route('student.store') }}" class="p-4 shadow-sm rounded">
        @csrf
        <div class="form-group mb-3">
            <label for="stu_id" class="form-label">ID សិស្ស:</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" placeholder="Enter Student ID">
        </div>
        <div class="form-group mb-3">
            <label for="phone" class="form-label">លេខទូរស័ព្ទ:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
        </div>
        <div class="form-group mb-3">
            <label for="fac_id" class="form-label">ជំនាញ:</label>
            <select class="form-control" id="fac_id" name="fac_id">
                <option value="">ជ្រើសរើសមហាវិទ្យាល័យ</option>
                @foreach ($faculty as $fac)
                    <option value="{{ $fac->id }}">{{ $fac->fac_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="name" class="form-label">ឈ្មោះ:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group mb-3">
            <label for="year_id" class="form-label">ឆ្នាំ:</label>
            <select class="form-control" id="year_id" name="year_id">
                <option value="">ជ្រើសរើសឆ្នាំ</option>
                @foreach ($years as $year)
                    <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary me-2">ចុះឈ្មោះ</button>
        <a class="btn btn-secondary" href="{{ route('student.list') }}">ថយក្រោយ</a>
    </form>
@endsection
