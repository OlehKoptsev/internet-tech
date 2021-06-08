 <?php
  header('Content-Type:application/json');

    require "connect.php";

    $data = $_GET["Second"];
    $responce = $collection->find(    
        ["teachers" => $data], 
        ["sort" =>["date" => 1,"time"=>1], "projection" => 
            ["date"=>1,"time"=>1,"discipl"=>1,"groups"=>1,"type"=>1,"auditory"=>1]
        ])->toArray();

    echo json_encode($responce);
 ?>