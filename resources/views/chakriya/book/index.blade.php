@extends('layout.backend')
@section('content')
<h3>តារាងសៀវភៅ</h3>
<a class="btn btn-primary" href="{{ url('/book/create') }}">បញ្ចូលសៀវភៅ/a>
@if (count($book) > 0)
<table class="table table-bordered">
<thead>
    <th>ចំណងជើងសៀភៅ</th>
    <th>រូបភាព</th>
    <th>លេខសៀវភៅ</th>
    <th>លេខ​ ISBN</th>
    <th>អ្នកនិពន្ធ</th>
    <th>មុខវិជ្ជា</th>
    <th>ចំនួន</th>
    <th>តម្លៃ</th>
    <th>កាលបរិច្ឆេទ</th>
    <th>ប្រតិបតិ្ដការ</th>
</thead>

<tbody>
    @foreach ($book as $book)
    <tr>
        <td>
            {!! $book->id !!}
        </td>
        <td>
        <a href="{{ url('/book/' . $book->id) }}">{!! $book->name !!}</a>
        </td>
        <td>
            {!! $book->photo !!}
        </td>
        <td>
            {!! $book->number !!}
        </td>
        <td>
            {!! $book->ibsn !!}
        </td>
        <td>
            {!! $book->author !!}
        </td>
        <td>
            {!! $book->subject->subject_name !!}
        </td>
        <td>
            {!! $book->quantity !!}
        </td>
        <td>
            {!! $book->price !!}
        </td>
        <td>
            {!! $book->date_update!!}
        </td>  
        <td>
            {!! $book->description !!}
        </td> 
        <td>
            {!! $book->publisher !!}
        </td> 

    </tr>
    @endforeach
</tbody>
</table>
@endif
@if(Session::has('resort_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('book_delete') !!}
    </div>
@endif  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(".delete").click(function() {
        var form = $(this).closest('form');
        $('<div></div>').appendTo('body')
            .html('<div><h6> Are you sure ?</h6></div>')
            .dialog({
                modal: true,
                title: 'Delete message',
                zIndex: 10000,
                autoOpen: true,
                width: 'auto',
                resizable: false,
                buttons: {
                    Yes: function() {
                        $(this).dialog('close');
                        form.submit();
                    },
                    No: function() {
                        $(this).dialog("close");
                        return false;
                    }
                },
                close: function(event, ui) {
                    $(this).remove();
                }
            });
        return false;
    });
</script>

@endsection