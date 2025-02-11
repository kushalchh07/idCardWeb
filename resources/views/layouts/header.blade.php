<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id Card Web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        body {
            background-color: rgb(234, 234, 234);
            font-family: 'poppins';
        }


        .small-rounded-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin: 20px auto;
        }

        .info-row {
            color: #333;
        }

        table tr td {
            padding: 4px 6px !important;
        }

        .card {
            border: none !important;
            padding-bottom: 45px;
        }

        .nipunasewa-logo {
            width: 120px;
            object-fit: contain;
        }

        .position-absolute-logo {
            position: absolute;
            top: 15px !important;
            right: 10px !important;
        }

        .absolute-button {
            top:160px;
            left:30%;
        }
        .form-error{
            color:red;
        }

        .footer-container{
            position:absoute;
            bottom:0;
            width: 100vw !important;
            /* background-color: red; */
            background-color:white;

        }

        body{
            min-height: 100vh !important;
            position: relative;
            /* padding-bottom: 250px; */
            /* background:red; */
        }
        .logo{
            font-size:2.4rem;
        }

        .nav-title{
            font-size:1.2rem;
            align-self: center;
            padding-top:6px;
            margin-left:15px;

            /* color:red; */
        }

        @media print {
            @page {
                margin: 0;
            }

            button  {
                display: none !important;
            }

            a {
                display: none !important;
            }

            
            .card {
                transform: scale(1.9);
                margin-top: 38% !important;
                border: 1px solid rgb(200, 200, 200) !important;
            }
            .footer-container{
                display:none;
            }
            .navbar{
                display: none; 
            }


        }
    </style>
</head>

<body>