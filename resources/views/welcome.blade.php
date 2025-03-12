<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Card Invitations</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        <!-- Font Awesome for Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Instrument Sans', sans-serif;
                background-color: #FDFDFC;
                color: #1b1b18;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                padding: 2rem;
                margin: 0;
            }

            .container {
                width: 100%;
                max-width: 1024px;
                text-align: center;
            }

            .card {
                background-color: white;
                padding: 2rem;
                border-radius: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                margin: 1rem;
                text-align: center;
                transition: transform 0.3s ease;
            }

            .card:hover {
                transform: translateY(-10px);
            }

            .card-header {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 1rem;
            }

            .card-body {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .card-footer {
                display: flex;
                justify-content: center;
                gap: 1rem;
            }

            .button {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 5px;
                font-size: 1rem;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .button:hover {
                background-color: #45a049;
            }

            .button:focus {
                outline: none;
            }

            .icon {
                margin-right: 0.5rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <nav class="flex justify-end gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="button">
                                <i class="fas fa-tachometer-alt icon"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="button">
                                <i class="fas fa-sign-in-alt icon"></i> Log in
                            </a>
                        @endauth
                    @endif
                </nav>
            </header>

          
        </div>
    </body>
</html>
