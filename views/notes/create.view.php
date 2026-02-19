<!DOCTYPE html>
<html lang="ru">
<?php require base_path('/views/partials/head.php'); ?>

<body class="bg-[#0a0c10] text-gray-200 antialiased">
    <?php
    require base_path('/views/partials/header.php');
        ?>

    <main class="relative max-w-7xl mx-auto px-6 py-16 md:py-24">
        <h1 class="block text-sm/6 font-medium text-white">Note creation</h1>
        <form method="post" action="">
            <div class="space-y-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-white">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                <div class="shrink-0 text-base text-gray-400 select-none sm:text-sm/6">Title
                                </div>
                                <input id="title" type="text" name="title" placeholder="My note"
                                    value="<?= $_POST['title'] ?? '' ?>"
                                    class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                            </div>
                            <?php if (isset($errors['title'])) { ?>
                                <p class="text-red-500 text-xs mt-5"><?= $errors['title'] ?></p>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-white">About</label>
                        <div class="mt-2">
                            <textarea placeholder="Give your note a description" id="body" name="body" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5
                                      text-base text-white outline-1 -outline-offset-1 outline-white/10
                                      placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2
                                      focus:outline-indigo-500 sm:text-sm/6"><?= $_POST['body'] ?? '' ?></textarea>
                        </div>
                        <?php if (isset($errors['body'])) { ?>
                            <p class="text-red-500 text-xs mt-5"><?= $errors['body'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
                <button type="submit"
                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    Save
                </button>
            </div>
        </form>

    </main>

    <?php require base_path('/views/partials/footer.php'); ?>

</body>

</html>