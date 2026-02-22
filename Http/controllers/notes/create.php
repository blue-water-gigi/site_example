<?php
declare(strict_types=1);

//! shows a form to create a new note

view('/notes/create.view.php', [
    'heading' => "Create a note",
    'errors' => []
]);