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
                font-family: Arial, sans-serif;
                background-color: #e9f7fe;
                padding: 20px;
                margin: 0;
            }
            .data-box {
                max-width: 600px;
                margin: auto;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 20px;
                text-align: center;
            }
            .header {
                background-color: #d4edda;
                color: #155724;
                padding: 15px;
                border-radius: 8px 8px 0 0;
                font-size: 20px;
                font-weight: bold;
            }
            .content {
                text-align: left;
                padding: 10px 20px;
            }
            .content div {
                margin: 10px 0;
                padding: 10px;
                background-color: #f8f9fa;
                border-radius: 4px;
                font-size: 16px;
            }
            .button-container {
                margin-top: 20px;
                text-align: center;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                margin: 5px;
                color: #fff;
                background-color: #007bff;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                font-size: 16px;
                font-weight: bold;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: background-color 0.3s, transform 0.2s;
            }
            .button:hover {
                background-color: #0056b3;
                transform: scale(1.05);
            }
            .footer {
                margin-top: 20px;
                text-align: center;
                color: #555;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class='data-box'>
            <div class='header'>Registration Successful</div>
            <div class='content'>
                <div><strong>Full Name:</strong> " . $row['fullname'] . "</div>
                <div><strong>Student ID:</strong> " . $row['studentid'] . "</div>
                <div><strong>Email:</strong> " . $row['email'] . "</div>
                <div><strong>Date of Birth:</strong> " . $row['dob'] . "</div>
                <div><strong>Gender:</strong> " . $row['gender'] . "</div>
                <div><strong>Department:</strong> " . $row['department'] . "</div>
                <div><strong>Contact:</strong> " . $row['contact'] . "</div>
                <div><strong>Address:</strong> " . $row['address'] . "</div>
            </div>
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
