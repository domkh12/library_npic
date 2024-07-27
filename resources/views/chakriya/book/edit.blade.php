@extends('layout.backend')

@section('content')
    <h1 class="mb-4">កែសម្រួលសៀវភៅ</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Something is Wrong</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data" class="p-4 shadow-sm rounded">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="book_name" class="form-label">ចំណងជើងសៀភៅ:</label>
                <input type="text" class="form-control" id="book_name" name="book_name" value="{{ old('book_name', $book->book_name) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="book_isbn" class="form-label">លេខ​ ISBN:</label>
                <input type="text" class="form-control" id="book_isbn" name="book_isbn" value="{{ old('book_isbn', $book->book_isbn) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="subject_id" class="form-label">មុខវិជ្ជា:</label>
                <select class="form-select" id="subject_id" name="subject_id">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $book->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="category_id" class="form-label">ប្រភេទសៀវភៅ:</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="book_price" class="form-label">តម្លៃ:</label>
                <input type="number" class="form-control" id="book_price" name="book_price" value="{{ old('book_price', $book->book_price) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="book_number" class="form-label">លេខសៀវភៅ:</label>
                <input type="number" class="form-control" id="book_number" name="book_number" value="{{ old('book_number', $book->book_number) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="book_author" class="form-label">អ្នកនិពន្ធ:</label>
                <input type="text" class="form-control" id="book_author" name="book_author" value="{{ old('book_author', $book->book_author) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="book_quantity" class="form-label">ចំនួន:</label>
                <input type="number" class="form-control" id="book_quantity" name="book_quantity" value="{{ old('book_quantity', $book->book_quantity) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="book_photo" class="form-label">រូបភាព:</label>
                <input type="file" class="form-control" id="book_photo" name="book_photo">
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-primary me-2">រក្សាទុក</button>
            <a class="btn btn-secondary" href="{{ route('book.list') }}">ថយក្រោយ</a>
        </div>
    </form>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(Session::has('book_update'))
        Toastify({
            text: "{{ session('book_update') }}",
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
