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

$marks = [
    $_POST['mark1'],
    $_POST['mark2'],
    $_POST['mark3'],
    $_POST['mark4'],
    $_POST['mark5']
];

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
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
            margin: 0;
        }
        .result-box {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 18px;
            color: #333;
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
    </style>
</head>
<body>
    <div class='result-box'>
        <h1>CGPA Result:</h1>
        <p>Your CGPA is: <strong>" . number_format($averageCGPA, 2) . "</strong></p>
        <div class='button-container'>
            <a class='button' href='cgpa.html'>Go Back to Calculator</a>
            <a class='button' href='register.html'>Go Back to Registration</a>
        </div>
    </div>
</body>
</html>";
?>
