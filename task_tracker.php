<?php
   $file_path = __DIR__."/task.json";

   if (!file_exists("task.json")) {
        file_put_contents($archivo,json_encode([]));
   }
 
   $file_task = fopen($file_path, 'rw');
   $json = file_get_contents($file_path);
   $data = json_decode($json,true);
   
   
   switch ($argv[1]) {
      case 'list':
         foreach ($data as $task) {
            echo "id task: ".$task['id']."\n";
            echo "name task: ".$task['name']."\n";
            echo "status task: ".$task['status']."\n";
         }
         break;
      case 'add':
         
         break;
   }
