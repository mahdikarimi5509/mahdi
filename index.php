<?php
define('API_KEY','**495717033:AAHM7Slds1XnyGh9qz4L7SJDIM3YIS8ntwg**');
//در این قسمت به جای **495717033:AAHM7Slds1XnyGh9qz4L7SJDIM3YIS8ntwg** توکن ربات خود را قرار دهید.
function cyber_official($method,$datas=[]){
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
//-------------------
$update = json_decode(file_get_contents('php://input'));
$from_id = $update->message->from->id;
$step = file_get_contents("data/$from_id/step.txt");
$ADMIN = **75888229**;
//در این قسمت به جای **75888229** ایدی عددی خود را قرار دهید.
$chat_id = $update->message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$text = $update->message->text;
$message_id = $update->callback_query->message->message_id;
$message_id_feed = $update->message->message_id;
$from_first = $update->message->from->first_name;
$from_last = $update->message->from->last_name;
$from_user = $update->message->from->username;
$textstart = file_get_contents("textstart.txt");
$textbaner = file_get_contents("baner.txt");
$texttah = file_get_contents("tah.txt");
$textcode = file_get_contents("textcode.txt");
$textposh = file_get_contents("posh.txt");
$amar = file_get_contents("data/users.txt");
$membersidd= explode("\n",$amar);
$mmemcount = count($membersidd) -1;
//------------------
if(preg_match('/^\/([Ss]tart)/',$text)){
cyber_official('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"$textstart",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  	  [
      ['text'=>'📤دریافت بنر','callback_data'=>'a'],['text'=>'📥تحویل بنر','callback_data'=>'b']
	  ],
    [ ['text'=>'🗣پشتیبانی🗣','callback_data'=>'c'],['text'=>'📝کد نویس📝','callback_data'=>'d']
			]
		]
		])
  ]);
  }elseif($type == 'private') {

   file_put_contents("data/users.txt","$chat_id\n");

}elseif ($data == "blok") {
  cyber_official('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"$textstart️",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [
      ['text'=>'📤دریافت بنر','callback_data'=>'a'],['text'=>'📥تحویل بنر','callback_data'=>'b']
	  ],
    [ ['text'=>'🗣پشتیبانی🗣','callback_data'=>'c'],['text'=>'📝کد نویس📝','callback_data'=>'d']
			]
		]
		])
  ]);
}elseif ($data == "a") {
  cyber_official('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"$textbaner",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [	    ['text'=>'بازگشت🔙','callback_data'=>'blok']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "b") {
  cyber_official('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"$texttah",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [	    ['text'=>'بازگشت🔙','callback_data'=>'blok']
	  ]
      ]
    ])
  ]);
  }elseif ($data == "d") {
  cyber_official('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"$textcode",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
	  [	    ['text'=>'بازگشت🔙','callback_data'=>'blok']
	  ]
      ]
    ])
  ]);
 }elseif ($data == "c") {
  cyber_official('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"$textposh",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [	    ['text'=>'بازگشت🔙','callback_data'=>'blok']
	  ]
      ]
    ])
  ]);
 }		
elseif ($text == '/set start' && $from_id == $ADMIN) {
    save("data/$from_id/step.txt","setm");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"#به_بخش_تنظیم_متن_استارت_خوشامدید🌹

لطفا متنی که میخواهید جایگزین متن استارت الانتان شود ارسال نمایید😉

متن استارت فعلی 👇🏻
➖➖➖➖➖➖➖➖➖➖➖


$textstart


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($step == 'setm') {
 save("textstart.txt","$text");
save("data/$from_id/step.txt","none");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" متن استارت ربات با موفقیت تغییر یافت 😉🌹

متن استارت حال ربات👇🏻
➖➖➖➖➖➖➖➖➖➖➖


$textstart


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($text == '/set d baner' && $from_id == $ADMIN) {
    save("data/$from_id/step.txt","setb");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"#به_بخش_تنظیم_متن_دریافت_بنر_خوشامدید💐

لطفا متنی که میخواهید جایگزین متن دکمه دریافت بنر الانتان شود ارسال نمایید🙃

متن دکمه دریافت بنر فعلی 👇🏻🏻
➖➖➖➖➖➖➖➖➖➖➖


$textbaner


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($step == 'setb') {
 save("baner.txt","$text");
save("data/$from_id/step.txt","none");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه دریافت بنر ربات با موفقیت تغییر یافت 🙃❤️🏻
➖➖➖➖➖➖➖➖➖➖➖


$textbaner


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($text == '/set t baner' && $from_id == $ADMIN) {
    save("data/$from_id/step.txt","settah");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"#به_بخش_تنظیم_متن_تحویل_بنر_خوشامدید🌹

لطفا متنی که میخواهید جایگزین متن دکمه تحویل بنر الانتان شود ارسال نمایید😉

متن فعلی دکمه تحویل بنر👇🏻🏻
➖➖➖➖➖➖➖➖➖➖➖


$texttah


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($step == 'settah') {
 save("tah.txt","$text");
save("data/$from_id/step.txt","none");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه تحویل بنر ربات با موفقیت تغییر یافت 😉🏆

متن دکمه تحویل بنر حال ربات👇🏻🏻
➖➖➖➖➖➖➖➖➖➖➖


$texttah


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($text == '/set code' && $from_id == $ADMIN) {
    save("data/$from_id/step.txt","setcode");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"#به_بخش_تنظیم_متن_کد_نویس_خوشامدید🌹

لطفا متنی که میخواهید جایگزین متن دکمه کد نویس الانتان شود ارسال نمایید😍

متن فعلی دکمه کد نویس👇🏻🏻
➖➖➖➖➖➖➖➖➖➖➖


$textcode


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($step == 'setcode') {
 save("textcode.txt","$text");
save("data/$from_id/step.txt","none");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه کد نویس ربات با موفقیت تغییر یافت ❤️🏆

متن دکمه کد نویس حال ربات👇🏻🏻
➖➖➖➖➖➖➖➖➖➖➖


$textcode


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($text == '/set posh' && $from_id == $ADMIN) {
    save("data/$from_id/step.txt","setposh");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"#به_بخش_تنظیم_متن_پشتیبانی_خوشامدید🌹

لطفا متنی که میخواهید جایگزین متن دکمه پشتیبانی الانتان شود ارسال نمایید😍

متن فعلی دکمه پشتیبانی👇🏻🏻
➖➖➖➖➖➖➖➖➖➖➖


$textposh


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($step == 'setposh') {
 save("posh.txt","$text");
save("data/$from_id/step.txt","none");
cyber_official('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"متن دکمه پشتیبانی ربات با موفقیت تغییر یافت 😉💚

متن دکمه پشتیبانی حال ربات👇🏻🏻
➖➖➖➖➖➖➖➖➖➖➖


$textposh


➖➖➖➖➖➖➖➖➖➖➖");
}
elseif ($text == '/stats all' && $from_id == $ADMIN) {
cyber_official('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"👤آمار کاربران ربات شما : $mmemcount");
}
elseif ($text == '/panel' && $from_id == $ADMIN) {
cyber_official('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"دستورات مدیریتی👇🏻👇🏻

/set start
📮تنظیم متن استارت

/set t baner
📥تنظیم متن تحویل بنر

/set d baner
📤تنظیم متن دریافت بنر

/set code
📁تنظیم متن کد نویس

/stats all
👤آمار ربات

/set posh
😎تنظیم متن پشتیبانی");
}
?>