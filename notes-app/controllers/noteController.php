<?php
// require_once __DIR__ . '/../models/db.php';
// require_once __DIR__ . '/../models/noteModel.php';

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if (!empty($_POST['title']) && !empty($_POST['content'])) {
//         addNote($pdo, $_POST['title'], $_POST['content']);
//     }
//     header("Location: index.php");
//     exit;
// }

// if (isset($_GET['delete'])) {
//     deleteNote($pdo, $_GET['delete']);
//     header("Location: index.php");
//     exit;
// }

// if (isset($_GET['search']) && isset($_GET['field'])) {
//     $search = $_GET['search'];
//     $field = $_GET['field'];
//     $notes = searchNotes($pdo, $search, $field);
// } else {
//     $notes = getNotes($pdo);
// }


require 'models/db.php';
require 'models/noteModel.php';

function indexNotes() {
    // $notes = getNotes();
    if (isset($_GET['search']) && isset($_GET['field'])) {
        $search = $_GET['search'];
        $field = $_GET['field'];
        $notes = searchNotes($search, $field);
    } else {
        $notes = getNotes();
    }
    include 'views/header.php';
    include 'views/notes.php';
    include 'views/footer.php';
}

function createNote() {
    include 'views/header.php';
    include 'views/form.php';
    include 'views/footer.php';
}

function storeNote() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        addNote($_POST['title'], $_POST['content']);
    }
    header("Location: index.php?route=notes.index");
}

function deleteNote() {
    if (isset($_GET['id'])) {
        deleteNoteById($_GET['id']);
    }
    header("Location: index.php?route=notes.index");
}