<!-- resources/views/create_payroll.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Payroll</title>
</head>
<body>
    <h1>Create Payroll for Employee</h1>
    <form action="{{route('payroll',$employeeId)}}" method="POST">
        @csrf
        <label for="basic_salary">Basic Salary:</label>
        <input type="number" id="basic_salary" name="basic_salary" required>
        
        <label for="allowances">Allowances:</label>
        <input type="number" id="allowances" name="allowances">
        
        <label for="deductions">Deductions:</label>
        <input type="number" id="deductions" name="deductions">
        
        <button type="submit">Create Payroll</button>
    </form>

    <script>
        document.getElementById('payrollForm').onsubmit = function(e) {
            e.preventDefault();
            const employeeId = 11; // Replace with dynamic employee ID

            const formData = new FormData(this);
            fetch('/admin/payroll/' + employeeId, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                alert('Payroll created successfully!');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
