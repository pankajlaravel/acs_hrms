<table>
    <thead>
        <tr>
            <th>Emp ID</th>
            <th>Emp Name</th>
            <th>Join Date</th>
            <th>Status</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Extension Number</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->employee_id }}</td>
            <td>{{ $employee->firstName }}</td>
            <td>{{ $employee->joining_Date }}</td>
            <td>{{ $employee->joining_status }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->extension }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
