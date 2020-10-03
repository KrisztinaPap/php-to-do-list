<?php
    // Starts session - so cookies can hold session data
    session_start();
    // If activeList array has not been initialized (new session), initialize both active and completed arrays
    if ( !isset( $_SESSION['activeList'])){
        $_SESSION['activeList'] = array();
        $_SESSION['completedList'] = array();
    }

    include './templates/header.php';
?>

<h1>Welcome to Krisztina's PHP To-Do List</h1>

<h2>Add a To-Do</h2>

<form method="POST" action="index.php">
    <label for="newTask">
        Enter a new task:
        <input 
            id="newTask" 
            name="newTask"
            type="string"
            value="">
    </label>
    <input type="submit" value="Add To List">
</form>

<h2>Active To-Dos</h2>

<h2>Completed To-Dos</h2>

<h2>Debugging</h2>


<?php
    include './templates/footer.php';
?>