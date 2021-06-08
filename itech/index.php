<?php
require_once './select/publisher.php';
require_once './select/author.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
Last results:
<p id="last-results"></p>
<form action="publisher.php">
    <p>Get by publisher</p>
    <select name="publisher">
        <?php
        foreach ($publishers as $publisher) {
            echo "<option value='{$publisher}'>{$publisher}</option>";
        }
        ?>
    </select>
    <p><input type="submit" value="Search"></p>
</form>
<form action="index.php">
    <p>Get by author</p>
    <select name="author" onchange='getFromStorage()'>
        <?php
        foreach ($authors as $author) {
            echo "<option value='{$author}'>{$author}</option>";
        }
        ?>
    </select>
    <p>
        <input type="button" value="Search" onclick="send()">
        <input type="button" value="Delete from storage" onclick="deleteFromStorage()">
    </p>
</form>
<form action="range.php">
    <p>Get by range</p>
    <input type="date" name="date_start">
    <input type="date" name="date_end">
    <p>
        <input type="submit" value="Search">
    </p>
</form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function send() {
        let authorName = $('[name="author"]').val();
        $.ajax({
            type: "GET",
            url: "author.php",
            data: {author: authorName},
            success: function (result) {
                let resultString = JSON.parse(result).join(' ');
                localStorage.setItem(authorName, resultString);

                $('#last-results').html(resultString);
            }
        });
    }

    function getFromStorage() {
        let authorName = $('[name="author"]').val();
        let literature = localStorage.getItem(authorName);

        $('#last-results').html(literature || `No results found for ${authorName}`);
    }

    function deleteFromStorage() {
        let authorName = $('[name="author"]').val();

        localStorage.removeItem(authorName);
    }
</script>
</html>