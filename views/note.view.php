<!DOCTYPE html>
<html lang="ru">
<?php require_once __DIR__ . "/partials/head.php"; ?>

<body class="bg-[#0a0c10] text-gray-200 antialiased">
<?php
require_once __DIR__ . "/partials/header.php"
?>
<!-- ОСНОВНОЙ КОНТЕНТ: ПУСТОЙ BODY -->
<main class="relative max-w-7xl mx-auto px-6 py-16 md:py-24">
    <div class="text-left py-20">
        <h1 class="text-gray-400"><?= htmlspecialchars($note['title']) ?> </h1>
        <p class="text-gray-400 mt-4">
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <p class="mt-10">
            <a class="text-blue-500 underline" href="/notes">
                go back...
            </a>
        </p>
    </div>

</main>

<?php require_once __DIR__ . "/partials/footer.php"; ?>

</body>
</html>