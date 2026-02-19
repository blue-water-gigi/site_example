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

            <form class="mt-10" action="" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input class="" type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>

            <p class="mt-1">
                <a class="text-blue-500 underline" href="/notes">
                    go back...
                </a>
            </p>
        </div>

    </main>

    <?php require base_path('/views/partials/footer.php'); ?>

</body>

</html>