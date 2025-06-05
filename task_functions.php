<?php
    function print_task_result ($data){
        foreach ($data as $task) {
               echo "id task: ".$task['id']."\n";
               echo "name task: ".$task['name']."\n";
               echo "status task: ".$task['status']."\n";
               } 
    }
?>