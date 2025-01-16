<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College Hall Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: black;
            font-family: 'Roboto', sans-serif;
            color: white;
        }
        h1, h2 {
            font-weight: 700;
        }
        .card-header {
            background-color: #ffc107; /* Deep yellow */
            color: black;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
            color: black;
        }
        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        select.form-control {
            background-color: #333;
            color: white;
        }
        select.form-control option {
            color: black;
        }
    </style>
</head>
<body>
