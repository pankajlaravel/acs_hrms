<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Money</title>
</head>
<body>
    <h1>Send Money to Employee</h1>
    <form id="payment-form" method="POST" action="/send-money">
        @csrf
        <label for="employee_id">Employee ID:</label>
        <input type="text" name="employee_id" placeholder="Employee ID" required>
        <br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" placeholder="Amount" required>
        <br>
        <button type="submit">Send Money</button>
    </form>

    <script>
        // Handle the form submission
        document.getElementById('payment-form').onsubmit = function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('Error: ' + data.error);
                } else {
                    alert('Payment initiated: ' + JSON.stringify(data));
                    // Optionally, you can redirect or handle success here
                }
            })
            .catch(error => {
                alert('Error: ' + error);
            });
        };
    </script>
</body>
</html>
