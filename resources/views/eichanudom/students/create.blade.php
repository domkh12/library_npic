@extends('layout.backend')

@section('content')
    <h1>Create Student</h1>
    @if(Session::has('student_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
    <form method="POST" action="{{ route('student.store') }}">
        @csrf
        <div class="form-group">
            <label for="stu_id">ID សិស្ស:</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id">
        </div>
        <div class="form-group">
            <label for="phone">លេខទូរស័ព្ទ:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>        
        <div class="form-group">
            <label for="fac_id">ជំនាញ:</label>
            <select class="form-control" id="fac_id" name="fac_id">
                <option value="">ជ្រើសរើសមហាវិទ្យាល័យ</option>
                @foreach ($faculty as $fac)
                    <option value="{{ $fac->id }}">{{ $fac->fac_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">ឈ្មោះ:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="year_id">ឆ្នាំ:</label>
            <select class="form-control" id="year_id" name="year_id">
                <option value="">ជ្រើសរើសឆ្នាំ</option>
                @foreach ($years as $year)
                    <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                @endforeach
            </select>
        </div>       
        <button type="submit" class="btn btn-primary">ចុះឈ្មោះ</button>
        <a class="btn btn-secondary" href="{{ route('student.list') }}">ថយក្រោយ</a>
    </form>
@endsection