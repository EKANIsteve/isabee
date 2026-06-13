<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion - ISABEE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #063f2b, #0b7a4b);
            min-height: 100vh;
        }

        .auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .auth-card {
            width: 100%;
            max-width: 460px;
            background: #ffffff;
            border-radius: 26px;
            padding: 35px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .auth-logo img {
            width: 95px;
            height: 95px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .auth-logo h1 {
            font-size: 28px;
            font-weight: 900;
            color: #063f2b;
            margin: 0;
        }

        .auth-logo p {
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }

        .auth-card label {
            color: #063f2b;
            font-weight: 700;
        }

        .auth-card input[type="email"],
        .auth-card input[type="password"],
        .auth-card input[type="text"] {
            width: 100%;
            height: 48px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 0 14px;
            margin-top: 6px;
            font-size: 15px;
        }

        .auth-card input:focus {
            outline: none;
            border-color: #0b7a4b;
            box-shadow: 0 0 0 3px rgba(11, 122, 75, 0.15);
        }

        .auth-card button {
            background: #0b7a4b !important;
            color: white !important;
            border: none;
            border-radius: 12px;
            padding: 12px 22px;
            font-weight: 800;
            cursor: pointer;
        }

        .auth-card button:hover {
            background: #063f2b !important;
        }

        .auth-card a {
            color: #0b7a4b;
            font-weight: 700;
            text-decoration: none;
        }

        .auth-card a:hover {
            text-decoration: underline;
        }

        .auth-card svg {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>

    <div class="auth-page">
        <div class="auth-card">

            <div class="auth-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo ISABEE">
                </a>

                <h1>ISABEE</h1>
                <p>Connexion à l’espace administrateur</p>
            </div>

            {{ $slot }}

        </div>
    </div>

</body>
</html>