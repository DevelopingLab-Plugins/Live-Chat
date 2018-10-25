<?php

echo '<b>Scritto da t.me/Matxk</b>';

																		t.me/DevelopingLab;

$rfuserID = $update['message']['reply_to_message']['forward_from']['id'];
$table = 'NOMETABELLA'; //Inserire  il nome della tabella che contiene tutte le informazioni di un utente
$u = mysql_query("SELECT * FROM $table WHERE user_id = $userID");
$admins = [ID, ID]; //Inserire gli ID delle persone che riceveranno i messaggi

if(in_array($userID, $admins)) {
	$isadmin = true;
}else{
	$isadmin = false;
}

//Comandi start
if($msg == '/start') {
	mysql_query("UPDATE $table SET page = '' WHERE user_id = $userID");
	$menu[] = [['text' => 'Admin Chat', 'callback_data' => '/achat'],];
	
	sm($chatID, "<i>Bot avviato con successo</i>\n\n<b>Clicca il bottone sottostante per avviare la chat con un Admin del Bot</b>", $menu);
}

if($msg == '/cbstart')
{
	mysql_query("UPDATE $table SET page = '' WHERE user_id = $userID");
	$menu[] = array(
	array(
	'text' => 'Admin Chat',
	'callback_data' => '/achat',
	),
	);
	
	cb_reply($cbid, "Caricamento", false, $cbmid, "<i>Bot avviato con successo</i>\n\n<b>Clicca il bottone sottostante per avviare la chat con un Admin del Bot</b>", $menu);
}

//Comandi per la Live-Chat
if($msg == "/achat")
{
	mysql_query("UPDATE $table SET page = 'chat' WHERE user_id = $userID");

	$menu[] = array(
   array(
   'text' => 'Indietro',
   'callback_data' => '/cbstart',
   ),
   );

   cb_reply($cbid, "Caricamento", false, $cbmid, "<b>Chat con gli admin avviata!\nClicca il bottone sottostante per chiuderla</b>", $menu);
}

if($msg and $u['page'] == 'chat')
{
foreach($admins as $ad)
{
fm($ad, $userID, $msgID);
}
}

if($isadmin and $rfuserID and $msg) {
    sm($rfuserID, "<b>Staff:</b> $msg");
    sm($chatID, '<b>Risposta Inviata!</b>');
}