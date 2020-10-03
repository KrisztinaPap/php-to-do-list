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
    }
    if(isset($_POST['reset']))
    {
        session_unset();
        session_destroy();
    }
    // Received advice re: using isset instead of onclick on delete button from Lindsey Graham
    if (isset($_POST['deleteTask'])) {
        // Received guidance from Lindsey Graham but I worked through the below 3 lines of code line-by-line!
        // var_dump(array_keys($_POST['deleteTask'])[0]);
        $deleteId = array_keys($_POST['deleteTask'])[0];
        unset($_SESSION[ 'activeList' ][$deleteId]);
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
    <!-- Received advice from Lindsey Graham re: adding id to following code line -->
    <?php foreach ( $_SESSION[ 'activeList' ] as $id=>$task ) : ?>
        <li>
            <?php echo $task ?>
            <form method="POST" action="index.php">
                <!-- Received advice from Lindsey Graham re: how to add id number to following code line (htmlspecialchars) -->
                <input id="<?php echo $task?>" type="submit" name="deleteTask[<?php echo htmlspecialchars($id); ?>]" value="delete"/>
            </form>
        </li>
    <?php endforeach; ?>
<?php endif ?>


</ul>

<h2>Completed To-Dos</h2>

<h2>Debugging</h2>


<?php
    include './templates/footer.php';
?>