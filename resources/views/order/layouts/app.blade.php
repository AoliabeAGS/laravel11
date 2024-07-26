<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - softsul</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>

                table {
                width: 80%;
                margin: 0 auto;
                border-collapse: collapse;
                }
                .div-container-body {
                width: 80%;
                margin: 0 auto;
                border-collapse: collapse;
                }

                table, th, td {
                    border: 1px solid black;
                }

                th, td {
                    padding: 8px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                .flex-container {
                    display: flex;
                    justify-content: center;


                }
                .max-acoes {
                    max-width: 50px;
                }

                .header-herder {
                    background: #A4D12D;
                    text-align: center;
                    height: 50px;
                    padding: -5px;
                }
                body {
                    margin: 0;
                    padding: 0;
                }

                .footer-footer {
                    background: #A4D12D;
                    text-align: center;
                    height: 25px;
                    padding: -5px;
                    position: fixed;
                    bottom: 0;
                    width: 100%;
                }

                .gap-10 {
                    gap: 10px;
                }

    </style>



</head>
<body>
 <header class="header-herder">Seja Bem vindo</header>
    <div class="div-container-body"></div>
    @yield('content')
 <footer class="footer-footer">Copyright © 2024</footer>
 <!-- Adicione isto antes do fechamento do </body> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
