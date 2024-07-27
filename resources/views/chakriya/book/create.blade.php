@extends('layout.backend')

@section('content')
    <h1>បញ្ចូលសៀវភៅ</h1>
    @if(Session::has('book_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('book_create') !!}
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
    <form method="POST" action="{{ route('book.store') }}">
        @csrf
        <div class="form-group">
            <label for="book_name">ចំណងជើងសៀភៅ:</label>
            <input type="text" class="form-control" id="book_name" name="book_name">
        </div>
        <div class="form-group">
            <label for="book_isbn">លេខ​ ISBN:</label>
            <input type="text" class="form-control" id="book_isbn" name="book_isbn">
        </div>        
        <div class="form-group">
            <label for="subject_id">មុខវិជ្ជា:</label>
            <select class="form-control" id="subject_id" name="subject_id">
                <option value="">ជ្រើសរើសមុខវិជ្ជា</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">ប្រភេទសៀវភៅ:</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">ជ្រើសរើសប្រភេទសៀវភៅ</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="book_price">តម្លៃ:</label>
            <input type="number" class="form-control" id="book_price" name="book_price">
        </div>
        <div class="form-group">
            <label for="book_number">លេខសៀវភៅ:</label>
            <input type="number" class="form-control" id="book_number" name="book_number">
        </div>
        <div class="form-group">
            <label for="book_author">អ្នកនិពន្ធ:</label>
            <input type="text" class="form-control" id="book_author" name="book_author">
        </div>
        <div class="form-group">
            <label for="book_quantity">ចំនួន:</label>
            <input type="text" class="form-control" id="book_quantity" name="book_quantity">
        </div>
        <div class="form-group">
            <label for="photo">រូបភាព:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <div class="form-group">
            <label for="book_date">កាល​បរិច្ឆេទ:</label>
            <input type="text" class="form-control" id="book_date" name="book_date">
        </div>
    
        <button type="submit" class="btn btn-primary">រក្សាទុក</button>
        <a class="btn btn-secondary" href="{{ route('book.list') }}">ថយក្រោយ</a>
    </form>
@endsection