 <?php
  header('Content-Type:application/json');

    require "connect.php";

    $data = $_GET["First"];
    $responce = $collection->find(
        ["groups" => $data], 
        ["sort" =>["date" => 1,"time"=>1],"projection" => 
            ["date"=>1,"time"=>1,"discipl"=>1,"teachers"=>1,"auditory"=>1]
        ])->toArray();
       
    echo json_encode($responce);
 ?>