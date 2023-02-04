<?php
    require '../classes/Table.php';
    $booksTable = new Table("books");
    $booksTable->deleteThing($_GET['id']);
    header("Location: index.php");
    exit;