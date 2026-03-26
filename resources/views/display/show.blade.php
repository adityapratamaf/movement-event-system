<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #000000, #434343);
            color: white;
        }

        .welcome-box {
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .guest-name {
            font-size: 3rem;
            font-weight: bold;
        }

        .vip {
            color: gold;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

<div class="welcome-box">

    <h1>🎉 Welcome 🎉</h1>

    <div class="guest-name {{ $guest->category->name == 'VIP' ? 'vip' : '' }}">
        {{ $guest->name }}
    </div>

    <h3 class="mt-3">
        Category: {{ $guest->category->name }}
    </h3>

    @if($guest->table)
        <h2 class="mt-3">
            🪑 Table: {{ $guest->table->name }}
        </h2>
    @endif

</div>

<script>
    // Auto redirect back after 5 seconds
    setTimeout(() => {
        window.location.href = "/checkin";
    }, 5000);
</script>

</body>
</html>