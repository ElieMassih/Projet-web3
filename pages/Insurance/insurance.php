<!DOCTYPE html>
<html>
<head>
    <style>
        input[type="text"],
        input[type="email"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label {
            margin-top: 10px;
            display: block;
        }

        .submit {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 12px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <section class="bleu-section">
    <?php include '../Header/header.php'; ?>
    <form action="#" method="post">
        <input type="text" id="name" placeholder="Full Name" required>

        <input type="email" id="email" placeholder="Email" required>

        <input type="text" id="phone" placeholder="Phone Number" required>

        <input type="text" id="destination" placeholder="Destination" required>

        <label for="departure-date">Departure Date:</label>
        <input type="date" id="departure-date" name="departure-date" required>

        <label for="return-date">Return Date:</label>
        <input type="date" id="return-date" name="return-date" required>

        <label for="coverage-type">Coverage Type:</label>
        <select id="coverage-type" name="coverage-type">
            <option value="Basic">Basic</option>
            <option value="Standard">Standard</option>
            <option value="Premium">Premium</option>
        </select>
        <input type="submit" value="Submit" class="submit">
    </form>
</body>
</html>
