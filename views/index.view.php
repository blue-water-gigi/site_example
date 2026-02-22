<!DOCTYPE html>
<html lang="ru">
<?php
require_once __DIR__ . "/partials/head.php";
?>

<body class="bg-[#0a0c10] text-gray-200 antialiased">
    <?php
    require_once __DIR__ . "/partials/header.php"
        ?>
    <!-- ОСНОВНОЙ КОНТЕНТ: ПУСТОЙ BODY -->
    <main class="relative max-w-7xl mx-auto px-6 py-16 md:py-24">
        <h1>Welcome back, <?= $_SESSION['user']['email'] ?? 'Guest' ?></h1>
        <div class="text-center py-20">
            <p class="text-gray-400 mt-4">This is my main page</p>
        </div>

    </main>

    <?php
    require_once __DIR__ . "/partials/footer.php";
    ?>

</body>

</html>