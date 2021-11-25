<html>
<head>
  <title>PHP Denomination Indonesia</title>
</head>

<body>
<?php


$input = $_POST["money"];

function denomination($amt){
    $paper = [100000 => 0, 50000 => 0, 20000 => 0, 10000 => 0, 5000 => 0, 2000 => 0, 1000 => 0];
    $coin = [500 => 0, 200 => 0, 100 => 0];
    $str= "Uang anda: Rp ".number_format($amt,2,',','.')."<hr><br>";
    krsort($paper);// if given array isn't sorted in descending order
    foreach($paper as $money_type => $qty){
        $qty = intval($amt / $money_type);
        $amt -= $money_type * $qty;
        $paper[$money_type] = $qty;
        $str.= $qty."x lembar Rp ".number_format($money_type,2,',','.')." <br>";
        

    }
    
    foreach($coin as $money_type => $qty){
        $qty = intval($amt / $money_type);
        $amt -= $money_type * $qty;
        $coin[$money_type] = $qty;
        $str.= $qty."x keping Rp ".number_format($money_type,2,',','.')." <br>";
    }
    
    $str.= "<hr>Sisa: Rp ".number_format($amt,2,',','.');
    
    
    
    return $str;
}

echo denomination($input);

?>


</body>
</html>