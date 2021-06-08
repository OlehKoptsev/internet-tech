 <?php
  header('Content-Type:application/json');

    require "connect.php";

    $data = $_GET["Third"];
    $responce = $collection->find(
        ["auditory" => $data], 
        ["sort" =>["date" => 1,"time"=>1],"projection" => 
            ["date"=>1,"time"=>1,"discipl"=>1,"teachers"=>1,"groups"=>1,"type"=>1]
        ])->toArray();

    echo json_encode($responce);
 ?>