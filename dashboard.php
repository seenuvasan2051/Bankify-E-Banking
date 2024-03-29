<?php
session_start();
$user_id;
if (isset($_SESSION['loggedin']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/png" href="img/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/utility.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script defer src="js/dashboard.js"></script>
    <title>Bankify</title>
</head>

<body>
    <!-- TOP NAVIGATION -->
    <nav>
        <p class="welcome"></p>
        <img src="img/logo.png" alt="Logo" class="logo" />
        <button class="logout-btn">&larr; Logout</button>
    </nav>

    <main class="app">
        <!-- BALANCE -->
        <div class="balance">
            <div>
                <p class="balance__label">Current balance</p>
                <p class="balance__date">
                    As of <span class="date">05/03/2037</span>
                </p>
            </div>
            <p class="balance__value">0000€</p>
        </div>

        <!-- MOVEMENTS -->
        <div class="movements">

        </div>

        <!-- SUMMARY -->
        <div class="summary">
            <p class="summary__label">In</p>
            <p class="summary__value summary__value--in">0000€</p>
            <p class="summary__label">Out</p>
            <p class="summary__value summary__value--out">0000€</p>
            <p class="summary__label">Interest</p>
            <p class="summary__value summary__value--interest">0000€</p>
            <button class="btn--sort">&downarrow; SORT</button>
        </div>

        <!-- OPERATION: TRANSFERS -->
        <div class="operation operation--transfer">
            <h2>Transfer money</h2>
            <form class="form form--transfer">
                <input type="text" class="form__input form__input--to" />
                <input type="number" class="form__input form__input--amount" />
                <button class="form__btn form__btn--transfer">&rarr;</button>
                <label class="form__label">Transfer to</label>
                <label class="form__label">Amount</label>
            </form>
        </div>

        <!-- OPERATION: LOAN -->
        <div class="operation operation--loan">
            <h2>Request loan</h2>
            <form class="form form--loan">
                <input type="number" class="form__input form__input--loan-amount" />
                <button class="form__btn form__btn--loan">&rarr;</button>
                <label class="form__label form__label--loan">Amount</label>
            </form>
        </div>

        <!-- OPERATION: CLOSE -->
        <div class="operation operation--close">
            <h2>Close account</h2>
            <form class="form form--close">
                <input autocomplete="off" type="text" class="form__input form__input--user" />
                <input autocomplete="off" type="password" class="form__input form__input--pin" />
                <button class="form__btn form__btn--close">&rarr;</button>
                <label class="form__label">Confirm Email</label>
                <label class="form__label">Confirm Password</label>
            </form>
        </div>

        <!-- LOGOUT TIMER -->
        <p class="logout-timer">
            You will be logged out in <span class="timer">05:00</span>
        </p>

    </main>
</body>

</html>