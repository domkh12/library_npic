<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID សិស្ស</th>
            <th>ឈ្មោះ</th>
            <th>កាលបរិច្ឆេទ</th>
            <th>ស្ថានភាព</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $attendance)
        <tr>
            <td>{{ $attendance->student->stu_id }}</td>
            <td>{{ $attendance->student->name }}</td>
            <td>{{ $attendance->date }}</td>
            <td>{{ $attendance->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
