@extends('layout.backend')
@section('content')
<h1>បញ្ចីអវត្ដមានសិស្សចូលអាន​សៀវភៅ</h1>
<a class="btn btn-primary" href="{{ url('/borrow/create') }}">New</a>
@if (count($borrows) > 0)
<table class="table table-bordered">
<thead>
    <th>ID</th>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
</thead>
<tbody>
    @foreach ($borrows as $borrow)
    <tr>
        <td>
            {!! $borrow->id !!}
        </td>
        <td>
        <a href="{{ url('/borrow/' . $borrow->id) }}">{!! $borrow->name !!}</a>
        </td>
        <td><a class="btn btn-primary" href="{!! url('/borrow/' . $borrow->id . '/edit') !!}">Edit</a></td>
        <td>
                <form method="POST" action="{{ url('borrow/' . $borrow->id)}}" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger delete">Delete</button>
                </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endif
@if(Session::has('resort_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('borrow_delete') !!}
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
