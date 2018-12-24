<?php

require_once 'koneksi.php';




//set bot API Token
$botToken = "";
$website  = "https://api.telegram.org/bot".$botToken;

//grab the info from the webhook, parse it and put it into $message
$content = file_get_contents("php://input");
$update = json_decode($content, TRUE);
$message = $update["message"];

//make some helpful variables
$chatId = $message["chat"]["id"];

$jawab;
$getcontents=null;

//$query = mysqli_query($conn,"insert into test values ('".$text."')");
//$query = mysqli_query($conn,"insert into telegram (test) values ('".$message['text']."')");

if(isset($message["text"])){

            $query = mysqli_query($conn,"select tajuk from islam_gov where huraian '".$message["text"]."'");
            if (mysqli_num_rows($query)>0){

                  while ($has = mysqli_fetch_row($query)){

                        $jawab = $has['0'];



                        if(strpos($jawab, '%nama%')){

                              $jawab = str_replace("%nama%", $message['from']['first_name'], $jawab);       

                        }

                  }

            } else {

                  $jawab = "Maaf, kata kunci tidak sesuai :(";

            }

            $getcontents = $website."/sendmessage?chat_id=".$chatId."&text=".urlencode($jawab);
            
file_get_contents($getcontents);
      }




?>