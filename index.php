<?php
$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true); // Specify true to decode as an associative array
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title> <!-- Added a title for your HTML document -->
</head>

<body>
    <form action="new_todo.php" method="POST">
        <input type="text" name="to_do_name" placeholder="Enter your todo">
        <button type="submit">Add Todo</button> <!-- Changed the button text for clarity -->
    </form>
    <br />

    <?php foreach ($todos as $todoName => $todo) : ?>
        <div style="margin-bottom:20px;">
            <form style="display: inline-block;" action='checkbox_status.php' method='POST'>
                <input type="hidden" name="to_do_name" value="<?php echo $todoName ?>" />
                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ' ' ?> />
            </form>


            Todo: <?php echo $todoName; ?> <!-- Display the todo name -->
            <form style="display:inline-block;" action="delete.php" method="POST">
                <input type="hidden" name="to_do_name" value="<?php echo $todoName ?>">
                <button>Delete</button>
            </form>

        </div>
    <?php endforeach ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit();
            };
        });
    </script>

</body>

</html>