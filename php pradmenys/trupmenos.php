<?php

if(isset($_GET["a1"]) && !empty($_GET["a1"]) && isset($_GET["a2"]) && !empty($_GET["a2"]) && isset($_GET["b1"]) && !empty($_GET["b1"]) && isset($_GET["b2"]) && !empty($_GET["b2"]) ) {
$skatiklisa =$_GET["a1"];
$vardiklisa =$_GET["a2"];
$skatiklisb =$_GET["b1"];
$vardiklisb =$_GET["b2"];
$trupmenuOperator=$_GET["operator"];
$skaitiklioRezultatas="";
$vardiklioRezultatas="";
$didziausiasBendrasDaliklis ="";
$sveikasis ="";
switch($trupmenuOperator){
    case "+":
   $vardiklioRezultatas= $vardiklisa*$vardiklisb;
   $skatiklisa*=$vardiklisb;
   $skatiklisb*=$vardiklisa;
   $skaitiklioRezultatas = $skatiklisa +$skatiklisb;
   break;
   case "-":
    $vardiklioRezultatas= $vardiklisa*$vardiklisb;
   $skatiklisa*=$vardiklisb;
   $skatiklisb*=$vardiklisa;
   $skaitiklioRezultatas = $skatiklisa - $skatiklisb;
   break;
   case "*":
    $skaitiklioRezultatas = $skatiklisa * $skatiklisb;
    $vardiklioRezultatas= $vardiklisa*$vardiklisb;
   break;
   case "/":
    $skaitiklioRezultatas = $skatiklisa * $vardiklisb;
    $vardiklioRezultatas= $vardiklisa*$skatiklisb;
   break;
}
$sveikasis= intval($skaitiklioRezultatas / $vardiklioRezultatas);
$skaitiklioRezultatas %= $vardiklioRezultatas;
if($skaitiklioRezultatas!=0){
for ( $i = 1; $i <= $skaitiklioRezultatas && $i <= $vardiklioRezultatas; $i++) {
    if( $skaitiklioRezultatas % $i == 0 && $vardiklioRezultatas % $i == 0) {
       $didziausiasBendrasDaliklis = $i;
    }
}
$skaitiklioRezultatas/=$didziausiasBendrasDaliklis;
$vardiklioRezultatas/=$didziausiasBendrasDaliklis;
echo "<input disabled='true' value='$sveikasis' />";
echo "<input disabled='true' value='$skaitiklioRezultatas' />";
echo "/";
echo "<input disabled='true' value='$vardiklioRezultatas' />";
}
else{
    echo "<input disabled='true' value='$sveikasis' />";
}

}
else {
    echo "ivyko error";
}
?>