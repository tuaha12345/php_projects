<?php
include '../inc/connect.php';
include 'admin_navbar.php';
?>
<head>
    <title>Invoice</title>
	<title>Invoice Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .invoice {
            padding: 20px;
            border: 1px solid #000;
        }

        /* Add more styles as needed */
    </style>
</head>
<body class="books">
<div class="container">
    <div class="srch">
        
    </div>

    <h3 style="text-align: center; font-weight: bold;">Invoice</h3>
    


    <h1>Invoice Generator</h1>
    <form id="invoice-form">
        <label for="invoice-number">Invoice Number:</label>
        <input type="text" id="invoice-number" name="invoice-number" required>
        <br>
        <label for="invoice-date">Invoice Date:</label>
        <input type="date" id="invoice-date" name="invoice-date" required>
        <br>
        <label for="customer-name">Reader Name:</label>
        <input type="text" id="customer-name" name="customer-name" required>
        <br>
		
        <label for="customer-name">ID:</label>
        <input type="text" id="customer-id" name="customer-id" required>
        <br>
        <label for="item-description">Book name:</label>
        <input type="text" id="item-description" name="item-description" required>
        <br>
        <label for="item-quantity">Days:</label>
        <input type="number" id="item-quantity" name="item-quantity" required>
        <br>
        <label for="item-price">Fine per day:</label>
        <input type="number" id="item-price" name="item-price" required>
        <br>
        <input type="submit" value="Generate Invoice">
    </form>

    <div class="invoice-output" id="invoice-output">
        <!-- Invoice content will be displayed here -->
    </div>

    <button id="print-button" style="display:none;">Print Invoice</button>

    <script>
        document.getElementById('invoice-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const invoiceNumber = document.getElementById('invoice-number').value;
            const invoiceDate = document.getElementById('invoice-date').value;
            const customerName = document.getElementById('customer-name').value;
			const customerId = document.getElementById('customer-id').value;
            const itemDescription = document.getElementById('item-description').value;
            const itemQuantity = document.getElementById('item-quantity').value;
            const itemPrice = document.getElementById('item-price').value;

            const totalAmount = itemQuantity * itemPrice;

            const invoiceHTML = `
                <div class="invoice">
                    <h2>Invoice</h2>
                    <p>Invoice Number: ${invoiceNumber}</p>
                    <p>Invoice Date: ${invoiceDate}</p>
                    <p>Reader Name: ${customerName}</p>
					<p>ID: ${customerId}</p>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th>Book name</th>
                                <th>Days</th>
                                <th>Fine per day</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${itemDescription}</td>
                                <td>${itemQuantity}</td>
                                <td>৳${itemPrice}</td>
                                <td>৳${totalAmount.toFixed(2)}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;

            document.getElementById('invoice-output').innerHTML = invoiceHTML;
            document.getElementById('print-button').style.display = 'block'; // Display the "Print Invoice" button
        });

        document.getElementById('print-button').addEventListener('click', function () {
            window.print(); // Open the browser's print dialog
        });
    </script>
</body>


<?php include '../inc/footer.php'; ?>
