<?php
    // Starts session - so cookies can hold session data
    session_start();
    // If activeList array has not been initialized (new session), initialize both active and completed arrays
    if ( !isset( $_SESSION['activeList'])){
        $_SESSION['activeList'] = array();
        $_SESSION['completedList'] = array();
    }
    var_dump($_SESSION['activeList']);
    $newToDo = FALSE;

    include './templates/header.php';


    if ( ( !empty( $_POST)) && ($_POST['newTask'] !== '' ))
    {
        $newToDo = $_POST['newTask'];
        array_push( $_SESSION[ 'activeList' ], "{$newToDo}" );
        $newToDo = '';
    }
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
<ul>
<?php foreach ( $_SESSION[ 'activeList' ] as $task ) : ?>
    <li>
        <?php echo $task ?>
        <button type="delete" value="delete">Delete</button>
    </li>
<?php endforeach; ?>
</ul>

<h2>Completed To-Dos</h2>

<h2>Debugging</h2>


<?php
    include './templates/footer.php';
?>