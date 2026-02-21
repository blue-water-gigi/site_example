<!DOCTYPE html>
<html lang="ru">
<?php require base_path('/views/partials/head.php'); ?>

<body class="bg-[#0a0c10] text-gray-200 antialiased">
    <?php
    require base_path('/views/partials/header.php');
    ?>

    <main class="relative max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="text-left py-20">
            <h1 class="text-gray-100 "><?= htmlspecialchars($note['title']) ?> </h1>
            <p class="text-gray-400 mt-4">
                <?= htmlspecialchars($note['body']) ?>
            </p>

            <div class="mt-10 mb-5">
                <a href="/note/edit?id=<?= $note['id'] ?>"
                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Edit</a>
            </div>

            <p class="mt-1">
                <a class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                    href="/notes">
                    Go back
                </a>
            </p>
        </div>

    </main>

    <?php require base_path('/views/partials/footer.php'); ?>

</body>

</html>