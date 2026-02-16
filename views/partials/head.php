
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(168, 85, 247, 0.2);
            }
            50% {
                box-shadow: 0 0 35px rgba(168, 85, 247, 0.5);
            }
        }

        .glow-card {
            animation: glow 6s infinite ease-in-out;
        }
    </style>
</head>

