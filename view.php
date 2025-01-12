<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>View Data</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f8f9fa;
                padding: 20px;
                text-align: center;
            }
            .data-box {
                display: inline-block;
                text-align: left;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 100%;
                margin: auto;
            }
            .data-box h2 {
                color: #28a745;
                text-align: center;
                margin-bottom: 20px;
            }
            .data-box div {
                margin: 10px 0;
                padding: 10px;
                background-color: #f1f3f5;
                border-radius: 4px;
                font-size: 16px;
                color: #495057;
            }
            .button-container {
                text-align: center;
                margin-top: 20px;
            }
            .button {
                margin: 10px;
                padding: 12px 25px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                display: inline-block;
                font-size: 16px;
                font-weight: bold;
            }
            .button:hover {
                background-color: #0056b3;
            }
            .button:active {
                background-color: #004085;
            }
        </style>
    </head>
    <body>
        <div class='data-box'>
            <h2>Registration Successful!</h2>
            <div>Full Name: " . $row['fullname'] . "</div>
            <div>Student ID: " . $row['studentid'] . "</div>
            <div>Email: " . $row['email'] . "</div>
            <div>Date of Birth: " . $row['dob'] . "</div>
            <div>Gender: " . $row['gender'] . "</div>
            <div>Department: " . $row['department'] . "</div>
            <div>Contact: " . $row['contact'] . "</div>
            <div>Address: " . $row['address'] . "</div>
            <div class='button-container'>
                <a class='button' href='register.html'>Go Back to Registration</a>
                <a class='button' href='cgpa.html'>Calculate CGPA</a>
            </div>
        </div>
    </body>
    </html>
    ";
} else {
    echo "No data found.";
}

$conn->close();
?>
