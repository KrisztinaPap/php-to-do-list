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



<?php
    include './templates/footer.php';
?>