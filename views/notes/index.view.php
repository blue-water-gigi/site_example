<!DOCTYPE html>
<html lang="ru">
<?php require base_path('/views/partials/head.php'); ?>

<body class="bg-[#0a0c10] text-gray-200 antialiased">
    <?php
    require base_path('/views/partials/header.php');
    ?>

    <main class="relative max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="text-left py-20">
            <h1 class="text-gray-400">My notes</h1>
            <ul class="text-gray-400 mt-4">
                <?php foreach ($notes as $note) { ?>
                    <li
                        class="flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white/5 transition-colors group">
                        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-400 hover:text-blue-300 transition-colors">
                            <?= htmlspecialchars($note['title']) ?>
                        </a>
                        <form method="POST" action="/note" class="ml-4">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $note['id'] ?>">
                            <button
                                class="text-red-400/70 hover:text-red-300 transition-colors duration-200 flex items-center gap-1 text-sm">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span class="hidden sm:inline">Delete</span>
                            </button>
                        </form>
                    </li>
                <?php } ?>
            </ul>
            <p class="text-gray-600 mt-6">
                <a href="/notes/create" class=" text-blue-500 hover:underline">Create Note</a>
            </p>
        </div>

    </main>


    <?php require base_path('/views/partials/footer.php'); ?>

</body>

</html>