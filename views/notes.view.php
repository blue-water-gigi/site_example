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
        <h1 class="text-gray-400">My notes</h1>
        <ul class="text-gray-400 mt-4">
            <?php foreach ($notes as $note) { ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['title']) ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <p class="text-gray-600 mt-6">
            <a href="/notes/create" class=" text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>

</main>

<?php require_once __DIR__ . "/partials/footer.php"; ?>

</body>
</html>