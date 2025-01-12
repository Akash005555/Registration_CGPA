<?php

function getCGPA($mark) {
    if ($mark >= 80) return 4.0;
    else if ($mark >= 75) return 3.75;
    else if ($mark >= 70) return 3.5;
    else if ($mark >= 65) return 3.25;
    else if ($mark >= 60) return 3.0;
    else if ($mark >= 55) return 2.75;
    else if ($mark >= 50) return 2.5;
    else if ($mark >= 45) return 2.25;
    else if ($mark >= 40) return 2.0;
    else return 0.0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marks = [
        $_POST['mark1'],
        $_POST['mark2'],
        $_POST['mark3'],
        $_POST['mark4'],
        $_POST['mark5']
    ];

    if (in_array(null, $marks, true)) {
        echo "All fields are required!";
        exit();
    }

    $totalCGPA = 0;
    foreach ($marks as $mark) {
        $totalCGPA += getCGPA($mark);
    }
    $averageCGPA = $totalCGPA / count($marks);

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>CGPA Result</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                text-align: center;
                background-color: #f0f0f0;
                padding: 20px;
            }
            .result-box {
                display: inline-block;
                padding: 20px;
                background-color: white;
                border-radius: 8px;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
                box-sizing: border-box;
                margin: auto;
            }
            h1 {
                color: #007bff;
                margin-bottom: 20px;
            }
            p {
                font-size: 18px;
            }
            .button {
                margin: 10px;
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                display: inline-block;
            }
            .button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class='result-box'>
            <h1>CGPA Result</h1>
            <p>Your CGPA is: <strong>" . number_format($averageCGPA, 2) . "</strong></p>
            <a class='button' href='cgpa.html'>Go back to Calculator</a>
            <a class='button' href='register.html'>Go back to Registration Form</a>
        </div>
    </body>
    </html>";
} else {
    echo "Invalid request method.";
}

?>
