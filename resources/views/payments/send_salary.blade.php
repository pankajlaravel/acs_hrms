<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Salary</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h1>Send Salary to Employee</h1>
    <form action="{{route('sendSalary',$employeeId)}}" method="POST">
        @csrf
        <label for="amount">Amount (in INR):</label>
        <input type="number" id="amount" name="amount" required min="1">
        <input type="hidden" id="employeeId" value="{{ $employeeId }}">
        <button type="submit">Pay Salary</button>
    </form>

    <script>
        document.getElementById('salaryForm').onsubmit = function(e) {
            e.preventDefault(); // Prevent form submission

            const employeeId = document.getElementById('employeeId').value;
            const amount = document.getElementById('amount').value;
            // alert(employeeId);
            // Create a payment request to your Laravel backend id="salaryForm"
            fetch(`/admin/salary/send/${employeeId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ amount: amount })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }

                const options = {
                    key: '{{ env('RAZORPAY_KEY') }}', // Razorpay API Key
                    amount: data.payment.amount, // Payment amount
                    currency: data.payment.currency,
                    name: 'Company Name',
                    description: 'Salary Payment',
                    image: 'https://your-logo-url.com/logo.png', // Optional
                    order_id: data.payment.id, // Unique order ID
                    handler: function (response) {
                        // Handle success response
                        confirmPayment(response.razorpay_payment_id);
                    },
                    prefill: {
                        name: 'Employee Name', // Employee's name (optional)
                        email: 'employee@example.com', // Employee's email (optional)
                        contact: '9999999999' // Employee's contact number (optional)
                    },
                    notes: {
                        employee_id: employeeId,
                    },
                    theme: {
                        color: '#F37254' // Customize the theme color
                    }
                };

                const razorpay = new Razorpay(options);
                razorpay.open(); // Open Razorpay modal
            })
            .catch(error => {
                console.error('Error:', error);
            });
        };

        function confirmPayment(paymentId) {
            // Confirm the payment on your backend
            fetch('/salary/confirm', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ payment_id: paymentId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('Payment confirmation failed: ' + data.error);
                } else {
                    alert('Payment successful: ' + JSON.stringify(data.payment));
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
