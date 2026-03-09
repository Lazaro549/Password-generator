<?php

function generatePassword($length, $upper, $lower, $numbers, $symbols) {
    $characters = '';

    if ($upper) {
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    if ($lower) {
        $characters .= 'abcdefghijklmnopqrstuvwxyz';
    }

    if ($numbers) {
        $characters .= '0123456789';
    }

    if ($symbols) {
        $characters .= '!@#$%^&*()-_=+[]{}<>?';
    }

    if ($characters === '') {
        return "Select at least one character type.";
    }

    $password = '';
    $maxIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $maxIndex)];
    }

    return $password;
}

$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length  = (int)($_POST['length'] ?? 12);
    $upper   = isset($_POST['upper']);
    $lower   = isset($_POST['lower']);
    $numbers = isset($_POST['numbers']);
    $symbols = isset($_POST['symbols']);

    $password = generatePassword($length, $upper, $lower, $numbers, $symbols);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            padding-top: 60px;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 8px;
            width: 320px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="number"] {
            width: 100%;
            padding: 6px;
        }

        .password {
            margin-top: 15px;
            padding: 10px;
            background: #eee;
            word-break: break-all;
            font-weight: bold;
        }

        button {
            margin-top: 10px;
            padding: 8px;
            width: 100%;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🔐 Password Generator</h2>

    <form method="POST">
        <label>Password Length</label>
        <input type="number" name="length" value="12" min="4" max="128">

        <p>
            <label><input type="checkbox" name="upper" checked> Uppercase</label><br>
            <label><input type="checkbox" name="lower" checked> Lowercase</label><br>
            <label><input type="checkbox" name="numbers" checked> Numbers</label><br>
            <label><input type="checkbox" name="symbols"> Symbols</label>
        </p>

        <button type="submit">Generate Password</button>
    </form>

    <?php if ($password): ?>
        <div class="password">
            <?php echo htmlspecialchars($password); ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
