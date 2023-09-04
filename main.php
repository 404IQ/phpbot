<?php

//=================//
$sudo = 1379547142;//ايديك
$userbot = "1415139463";
//=================//
define('API_KEY',"6388195194:AAETxAVdkUnIUOiiGLobNjiST3YbrSnI8aM");
//=================//
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message->text;
$chat_id = $update->message->chat->id;

$userId = $update->message->from->id;

$firstname = $update->message->from->first_name;

$lastname = $update->message->from->last_name;

$username = $update->message->from->username;

$chattype = $update->message->chat->type;

if($message == '/start'){
    
    bot('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=>"$username"]);}
