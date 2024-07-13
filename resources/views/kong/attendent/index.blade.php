@extends('layout.backend')
@section('content')
<h3>បញ្ចីអវត្ដមានសិស្សចូលអាន​សៀវភៅ</h3>
<a class="btn btn-primary" href="{{ url('/attendent/index') }}">New</a>
@if (count($attendents) > 0)
<table class="table table-bordered">
<thead>
    <th>ID សិស្ស</th>
    <th>ឈ្មោះ</th>  
    <th>ភេទ</th>
    <th>ជំនាញ</th>
    <th>កាលបរិច្ឆេទ</th>
    <th>ម៉ោងចូល</th>
    <th>ម៉ោងចេញ</th>
    <th>រយះពេល</th>
    <th>ស្ថានភាព</th>
    
</thead>
<tbody>
    @foreach ($attendents as $attendent)
    <tr>
        <td>
            {!! $attendent->id !!}
        </td>
        
        <td>
            {!! $attendent->stu_id !!}
        </td>
         
        <td>
            {!! $attendent->time_in !!}
        </td>
         
        <td>
            {!! $attendent->time_out !!}
        </td>
         
        <td>
            {!! $attendent->date !!}
        </td>
         
        <td>
            {!! $attendent->status!!}
        </td>
                
        <td class="d-flex">
            <a class="btn btn-primary" href="{!! url('/attendent/' . $attendent->id . '/edit') !!}">Edit</a>
                <form method="POST" action="{{ url('attendent/' . $attendent->id)}}" class="delete-form">
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
        <strong>Primary!</strong> {!! session('attendent_delete') !!}
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