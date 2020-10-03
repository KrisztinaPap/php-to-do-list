<?php
class NewTask
{
    public $task = '';
    public $isCompleted = false;
    
    function __construct( $task = '', $isCompleted = false )
    {
        $this->task = $task;
        $this->isCompleted = $isCompleted;   
    }    
}
$newTask = new NewTask ( 'go for a run', false );
var_dump( $newTask );

?>