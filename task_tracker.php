<?php
include './task_functions.php';
   $file_path = __DIR__."/task.json";

   if (!file_exists("task.json")) {
        file_put_contents($file_path,json_encode([]));
   }
   $template = [
      'id'=>0,
      'name' => '',
      'status' => 'todo',
      'createAt' => date("Y-m-d H:i:s"),
      'updateAt' => date("Y-m-d H:i:s")
   ];
   $action = "";
   $argument1 = isset($argv[2]) || null;
   $argument1 = isset($argv[3]) || null;
   
   if (isset($argv[1])) {
      $action = strtolower($argv[1]);
   }
   else {
      echo "write a action(add, update, delete, list)";
   }
   $json = file_get_contents($file_path);
   $data = json_decode($json,true);
   
   
   switch ($action) { 
      case 'list':
         if (isset($argv[2])) {
            $filtered = array_filter($data,function($item_task) use ($argv){
               return $item_task['status'] === strtolower($argv[2]);
            });
            print_task_result($filtered);
         }
         else {
           print_task_result($data);
         }
         break;

      case 'add':
         if (!isset($argv[2])) {
            echo "enter a name for the task";
         }else{
            $template['id'] = count($data)+1;
            $template['name'] = $argv[2];
            array_push($data, $template);
            file_put_contents($file_path,json_encode($data,JSON_PRETTY_PRINT));
           
         }
         break;
      case 'update':
        
         break;
      case 'date':
         echo date("Y-m-d H:i:s");
         break;
      case 'test' : 
         echo "hola";
         print_r($argv);
         break;
      }
      
        
?>