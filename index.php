<?php
    // Starts session - so cookies can hold session data
    session_start();
    // If activeList array has not been initialized (new session), initialize both active and completed arrays
    if ( !isset( $_SESSION['activeList'])){
        $_SESSION['activeList'] = array();
        $_SESSION['completedList'] = array();
    }
    $newToDo = '';

    include './templates/header.php';

    if(isset($_POST['add']))
    {
        if ( ( !empty( $_POST)) && ($_POST['newTask'] !== '' ) && ( !in_array( $_POST['newTask'], $_SESSION['activeList']) ) )
        {
            $newToDo = $_POST['newTask'];
            array_push( $_SESSION[ 'activeList' ], "{$newToDo}" );
            $newToDo = '';
        }
        var_dump($_SESSION['activeList']);
    }
    if(isset($_POST['reset']))
    {
        session_unset();
        session_destroy();
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
    <input type="submit" name="add" value="Add To List">
    <input type="submit" name="reset" value="Reset List">
</form>

<h2>Active To-Dos</h2>
<ul>
<?php if ( !empty($_SESSION['activeList']) ) : ?> 
    <?php foreach ( $_SESSION[ 'activeList' ] as $task ) : ?>
        <li>
            <?php echo $task ?>
            <button type="delete" value="delete">Delete</button>
        </li>
    <?php endforeach; ?>
<?php endif ?>


</ul>

<h2>Completed To-Dos</h2>

<h2>Debugging</h2>


<?php
    include './templates/footer.php';
?>