<?php
date_default_timezone_set('Asia/Baghdad');
if(!file_exists('config.json')){
	$token = readline('Enter Token: ');
	$id = readline('Enter Id: ');
	file_put_contents('config.json', json_encode(['id'=>$id,'token'=>$token]));
	
} else {
		  $config = json_decode(file_get_contents('config.json'),1);
	$token = $config['token'];
	$id = $config['id'];
}

if(!file_exists('accounts.json')){
    file_put_contents('accounts.json',json_encode([]));
}
include 'index.php';
try {
	$callback = function ($update, $bot) {
		global $id;
		if($update != null){
		  $config = json_decode(file_get_contents('config.json'),1);
		  $config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
      $accounts = json_decode(file_get_contents('accounts.json'),1);
			if(isset($update->message)){
				$message = $update->message;
				$chatId = $message->chat->id;
				$text = $message->text;
				if($chatId == $id){
					if($text == '/start'){
              $bot->sendphoto([ 'chat_id'=>$chatId,
                  'photo'=>"https://t.me/K_W_0",
                   'caption'=>'๐ ๐๐๐๐๐๐๐๐ เน Muhammed Hamadi bot๐ฐ',
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุชุณุฌูู ุญุณุงุจ ๐','callback_data'=>'login']],
                       [['text'=>"ุงุถุบุท ููุฑุงุณูู ุงููุทูุฑ ููุงุจูุงุบ ุนู ูุดุงูู ๐ฎ๐ถ", 'url'=>"https://t.me/K_W_0"]],
                       [['text'=>"ุงุถุบุท ููุฑุงุณูู ุงููุทูุฑ ุงูุงุณุงุณู๐ฅบ", 'url'=>"https://t.me/K_W_0"]],
                      ]
                  ])
              ]);   
          } 
if($text == '/help'){
              $bot->sendvideo([ 'chat_id'=>$chatId,
              'video'=>"https://t.me/nnnneueh2/54",
              'caption'=>'ุทุฑู ุงูุณุญุจุจ๐ค๐',
                      'reply_markup'=>json_encode([
                      'inline_keyboard'=>[                       
                       [['text'=>"๐ช๐ฌุบุท ููุฑุงุณูู ุงููุทูุฑ ููุงุจูุงุบ ุนู ูุดุงูู ๐ช๐ฌ", 'url'=>"https://t.me/K_W_0"]],
                       ]
                       ])
                       ]);
    
              $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/nnnneueh2/57",
                           'caption'=>'ุงูุตูุฏ ุชุถูู ููู๐๐ค',
                ]);
                      $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/nnnneueh2/61",
              'caption'=>'ููู ุชุฌูู ููุฒุฑุงุช ููุตูุฏ ๐ฅบโค',
             ]);
            
 }

    elseif($text != null){
          	if($config['mode'] != null){
          		$mode = $config['mode'];
          		if($mode == 'addL'){
          			$ig = new ig(['file'=>'','account'=>['useragent'=>'Instagram 27.0.0.7.97 Android (23/6.0.1; 640dpi; 1440x2392; LGE/lge; RS988; h1; h1; en_US)']]);
          			list($user,$pass) = explode(':',$text);
          			list($headers,$body) = $ig->login($user,$pass);
          			 echo $body;
          			$body = json_decode($body);
          			if(isset($body->message)){
          				if($body->message == 'challenge_required'){
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"ููุฏ ุชู ุฑูุถ ุงูุญุณุงุจ ูุงูู ูุญุธูุฑ ุงู ุงูู ูุทูุจ ูุตุงุฏููโ๏ธ"
          					]);
          				} else {
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"ูููู ุงูุณุฑ ุงู ุงูููุฒุฑ ุฎุทุฃ๐ช"
          					]);
          				}
          			} elseif(isset($body->logged_in_user)) {
          				$body = $body->logged_in_user;
          				preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $headers, $matches);
								  $CookieStr = "";
								  foreach($matches[1] as $item) {
								      $CookieStr .= $item."; ";
								  }
          				$account = ['cookies'=>$CookieStr,'useragent'=>'Instagram 27.0.0.7.97 Android (23/6.0.1; 640dpi; 1440x2392; LGE/lge; RS988; h1; h1; en_US)'];
          				
          				$accounts[$text] = $account;
          				file_put_contents('accounts.json', json_encode($accounts));
          				$mid = $config['mid'];
          				$bot->sendMessage([
          				      'parse_mode'=>'markdown',
          							'chat_id'=>$chatId,
          							'text'=>"ุชู ุงุถุงูู ุญุณุงุจ ุฌุฏูุฏ ุงูู ุงูุงุฏุงู ๐ฃ.*\n _Username_ : [$user])(instagram.com/$user)\n_Account Name_ : _{$body->full_name}_",
												'reply_to_message_id'=>$mid		
          					]);
          				$keyboard = ['inline_keyboard'=>[
										[['text'=>"ุงุถุงูู ุญุณุงุจ ุฌุฏูุฏ๐",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ุชุณุฌูู ุงูุฎุฑูุฌ",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'ุงูุตูุญู ุงูุฑุฆุณูู','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                  'text'=>"ุตูุญู ุงูุชุญูู ุจุงูุญุณุงุจุงุช ุงูููููู",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
		              $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          			}
          		}  elseif($mode == 'selectFollowers'){
          		  if(is_numeric($text)){
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>"ุชู ุงูุชุนุฏูู.",
          		        'reply_to_message_id'=>$config['mid']
          		    ]);
          		    $config['filter'] = $text;
          		    $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"ุตูุญู ุงูุชุญูู ุงูุฎุงุตู ุจู ุนุฒูุฒู ุงุณุชูุชุน ูุน ุงุณูู ุทุฑููู ูุณุญุจ ุงูุญุณุงุจุงุช ู ุงููุงูุง
ููุฑุงุณู ุงููุทูุฑ - @K_W_0",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุชุณุฌูู ุญุณุงุจ ๐','callback_data'=>'login']],
                          [['text'=>'ุงููุงุน ุงูุณุญุจ โจ','callback_data'=>'grabber']],
                          [['text'=>'ุจุฏุก ุงูุตูุฏ ๐','callback_data'=>'run'],['text'=>'ุงููุงู ุงูุตูุฏ ๐','callback_data'=>'stop']],
                              [['text'=>'ุญุงูู ุงูุญุณุงุจุงุช โ','callback_data'=>'status']],
                      ]
                  ])
                  ]);
          		    $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          		  } else {
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>'- ูุฑุฌู ุงุฑุณุงู ุฑูู ููุท .'
          		    ]);
          		  }
          		} else {
          		  switch($config['mode']){
          		    case 'search': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php search.php');
          		      break;
          		      case 'followers': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php followers.php');
          		      break;
          		      case 'following': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php following.php');
          		      break;
          		      case 'hashtag': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php hashtag.php');
          		      break;
          		  }
          		}
          	}
          }
				} else {
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"ูุฐุง ุงูุจูุช ูุฏููุน ู ููุณ ูุฌุงูู 
ููููู ุงูุญุตูู ุนูู ูุณุฎู ูู ุงูุจูุช ุจุนุฏ ุดุฑุงุฆู ูู ุงููุทูุฑ 
ุงุถุบุท ูู ุงูุงุณูู ููุฑุงุณูู ุงููุทูุฑ ๐",
							'reply_markup'=>json_encode([
                  'inline_keyboard'=>[
                      [['text'=>'ุงุถุบุท ููุฑุงุณูู ุงููุทูุฑ ๐ฃ','url'=>'https://t.me/K_W_0']]
                  ]
							])
					]);
				}
			} elseif(isset($update->callback_query)) {
          $chatId = $update->callback_query->message->chat->id;
          $mid = $update->callback_query->message->message_id;
          $data = $update->callback_query->data;
          echo $data;
          if($data == 'login'){
              
        		$keyboard = ['inline_keyboard'=>[
									[['text'=>"ุงุถุงูู ุญุณุงุจ ุฌุฏูุฏ๐",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ุชุณุฌูู ุงูุฎุฑูุฌ",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'ุงูุตูุญู ุงูุฑุฆุณูู','callback_data'=>'back']];
		              $bot->sendMessage([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                   'text'=>"ุตูุญู ุงูุชุญูู ุจุงูุญุณุงุจุงุช ุงูููููู",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          } elseif($data == 'addL'){
          	
          	$config['mode'] = 'addL';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          	$bot->sendMessage([
          			'chat_id'=>$chatId,
          			'text'=>"  ุงุฑุณู ุงูุญุณุงุจ ุจูุฐุง ุงูููุท `user:pass`",
          			'parse_mode'=>'markdown'
          	]);
          } elseif($data == 'grabber'){
            
            $for = $config['for'] != null ? $config['for'] : 'ุญุฏุฏ ุงูุญุณุงุจ';
            $count = count(explode("\n", file_get_contents($for)));
            $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                        [['text'=>'ุจุญุซ ูููุงุช','callback_data'=>'search']],
                        [['text'=>'ูู ูุงุดุชุงู ','callback_data'=>'hashtag'],['text'=>'ูู ุงูุงูุณุจููุฑ','callback_data'=>'explore']],
                        [['text'=>'ูู ุงููุชุงุจุนูู','callback_data'=>'followers'],['text'=>"ูู ุงููุชุงุจุนูู",'callback_data'=>'following']],
                        [['text'=>"ุงูุญุณุงุจ ุงููุญุฏุฏ : $for",'callback_data'=>'for']],
                        [['text'=>'ูุณุชู ุฌุฏูุฏู','callback_data'=>'newList'],['text'=>'ูุณุชู ุณุงุจูู','callback_data'=>'append']],
                        [['text'=>'ุงูุตูุญู ุงูุฑุฆูุณูู ','callback_data'=>'back']],
                    ]
                ])
            ]);
          } elseif($data == 'search'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงููููู ุงูุชุฑูุฏ ุงูุจุญุซ ุนูููุง ู ุงูุถุง ููููู ูู ุงุณุชุฎุฏุงู ุงูุซุฑ ูู ูููู ุนู ุทุฑูู ูุถุน ููุงุตู ุจูู ุงููููุงุชโ๏ธ"
            ]);
            $config['mode'] = 'search';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'followers'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงูููุฒุฑ ุงูุชุฑูุฏ ุณุญุจ ูุชุงุจุนูู ู ุงูุถุง ููููู ูู ุงุณุชุฎุฏุงู ุงูุซุฑ ูู ููุฒุฑ ุนู ุทุฑูู ูุถุน ููุงุตู ุจูู ุงูููุฒุฑุงุช ๐ช"
            ]);
            $config['mode'] = 'followers';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'following'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงูููุฒุฑ ุงูุชุฑูุฏ ุณุญุจ ุงูุฐู  ูุชุงุจุนูู ู ุงูุถุง ููููู ูู ุงุณุชุฎุฏุงู ุงูุซุฑ ูู ููุฒุฑ ุนู ุทุฑูู ูุถุน ููุงุตู ุจูู ุงูููุฒุฑุงุช ๐ช"
            ]);
            $config['mode'] = 'following';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'hashtag'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงููุงุดุชุงู ุจุฏูู ุนูุงูู # ููููู ๐งฟุงุณุชุฎุฏุงู ูุงุดุชุงู ูุงุญุฏ ููุท"
            ]);
            $config['mode'] = 'hashtag';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'newList'){
            file_put_contents('a','new');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุชู ุงุฎุชูุงุฑ ูุณุชู ุฌุฏูุฏู ุจูุฌุงุญ",
							'show_alert'=>1
						]);
          } elseif($data == 'append'){ 
            file_put_contents('a', 'ap');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุชู ุงุฎุชูุงุฑ ูุณุชู ุณุงุจูู ุจูุฌุงุญ",
							'show_alert'=>1
						]);
						
          } elseif($data == 'for'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'forg&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"ุงุฎุชุงุฑ ุงูุญุณุงุจ",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุงุถู ุญุณุงุจ ุจุงูุงูู๐",
							'show_alert'=>1
						]);
            }
          } elseif($data == 'selectFollowers'){
            bot('sendMessage',[
                'chat_id'=>$chatId,
                'text'=>'ูู ุจุฃุฑุณุงู ุนุฏุฏ ูุชุงุจุนูู .'  
            ]);
            $config['mode'] = 'selectFollowers';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          } elseif($data == 'run'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'start&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"ุญุฏุฏ ุญุณุงุจ",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ูู ุจุชุณุฌูู ุญุณุงุจ ุงููุง ๐",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stop'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'stop&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"ุงุฎุชุงุฑ ุงูุญุณุงุจ",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ูู ุจุชุณุฌูู ุญุณุงุจ ุงููุง ๐",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stopgr'){
            shell_exec('screen -S gr -X quit');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุชู ุงูุงูุชูุงุก ูู ุงูุณุญุจ",
							'show_alert'=>1
						]);
						$for = $config['for'] != null ? $config['for'] : 'Select Account';
            $count = count(explode("\n", file_get_contents($for)));
						$bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                       [['text'=>'ุจุญุซ ูููุงุช','callback_data'=>'search']],
                        [['text'=>'ูู ูุงุดุชุงู ','callback_data'=>'hashtag'],['text'=>'ูู ุงูุงูุณุจููุฑ','callback_data'=>'explore']],
                        [['text'=>'ูู ุงููุชุงุจุนูู','callback_data'=>'followers'],['text'=>"ูู ุงููุชุงุจุนูู",'callback_data'=>'following']],
                        [['text'=>"ุงูุญุณุงุจ ุงููุญุฏุฏ : $for",'callback_data'=>'for']],
                        [['text'=>'ูุณุชู ุฌุฏูุฏู','callback_data'=>'newList'],['text'=>'ูุณุชู ุณุงุจูู','callback_data'=>'append']],
                        [['text'=>'ุงูุตูุญู ุงูุฑุฆูุณูู','callback_data'=>'back']],
                    ]
                ])
            ]);
          } elseif($data == 'explore'){
            exec('screen -dmS gr php explore.php');
          } elseif($data == 'status'){
					$status = '';
					foreach($accounts as $account => $ac){
						$c = explode(':', $account)[0];
						$x = exec('screen -S '.$c.' -Q select . ; echo $?');
						if($x == '0'){
				        $status .= "*$account* ~> _Working_\n";
				    } else {
				        $status .= "*$account* ~> _Stop_\n";
				    }
					}
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"ุญุงูู ุงูุญุณุงุจุงุช : \n\n $status",
							'parse_mode'=>'markdown'
						]);
				} elseif($data == 'back'){
          	$bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                     'text'=>"ุตูุญู ุงูุชุญูู ุงูุฎุงุตู ุจู ุนุฒูุฒู ุงุณุชูุชุน ูุน ุงุณูู ุทุฑููู ูุณุญุจ ุงูุญุณุงุจุงุช ู ุงููุงูุง
ููุฑุงุณู ุงููุทูุฑ - @K_W_0",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุชุณุฌูู ุญุณุงุจ ๐','callback_data'=>'login']],
                          [['text'=>'ุงููุงุน ุงูุณุญุจ โจ','callback_data'=>'grabber']],
                          [['text'=>'ุจุฏุก ุงูุตูุฏ ๐','callback_data'=>'run'],['text'=>'ุงููุงู ุงูุตูุฏ ๐','callback_data'=>'stop']],
                         [['text'=>'ุญุงูู ุงูุญุณุงุจุงุช โ','callback_data'=>'status']],
                      ]
                  ])
                  ]);
          } else {
          	$data = explode('&',$data);
          	if($data[0] == 'del'){
          		
          		unset($accounts[$data[1]]);
          		file_put_contents('accounts.json', json_encode($accounts));
              $keyboard = ['inline_keyboard'=>[
							[['text'=>"ุงุถู ุญุณุงุจ ุฌุฏูุฏ",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ุชุณุฌูู ุงูุฎุฑูุฌ",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'ุงูุตูุญู ุงูุฑุฆูุณูู','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                    'text'=>"ุตูุญู ุงูุชุญูู ุจุงูุญุณุงุจุงุช ุงูููููู",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          	} elseif($data[0] == 'forg'){
          	  $config['for'] = $data[1];
          	  file_put_contents('config.json',json_encode($config));
              $for = $config['for'] != null ? $config['for'] : 'Select';
              $count = count(file_get_contents($for));
              $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                            [['text'=>'ุจุญุซ ูููุงุช','callback_data'=>'search']],
                        [['text'=>'ูู ูุงุดุชุงู ','callback_data'=>'hashtag'],['text'=>'ูู ุงูุงูุณุจููุฑ','callback_data'=>'explore']],
                        [['text'=>'ูู ุงููุชุงุจุนูู','callback_data'=>'followers'],['text'=>"ูู ุงููุชุงุจุนูู",'callback_data'=>'following']],
                        [['text'=>"For Account : $for",'callback_data'=>'for']],
                        [['text'=>'ูุณุชู ุฌุฏูุฏู','callback_data'=>'newList'],['text'=>'ูุณุชู ุณุงุจูู','callback_data'=>'append']],
                        [['text'=>'ุงูุตูุญู ุงูุฑุฆูุณูู','callback_data'=>'back']],
                    ]
                ])
            ]);
          	} elseif($data[0] == 'start'){
          	  file_put_contents('screen', $data[1]);
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                       'text'=>"ุตูุญู ุงูุชุญูู ุงูุฎุงุตู ุจู ุนุฒูุฒู ุงุณุชูุชุน ูุน ุงุณูู ุทุฑููู ูุณุญุจ ุงูุญุณุงุจุงุช ู ุงููุงูุง
ููุฑุงุณู ุงููุทูุฑ - @K_W_0",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุชุณุฌูู ุญุณุงุจ ๐','callback_data'=>'login']],
                          [['text'=>'ุงููุงุน ุงูุณุญุจ โจ','callback_data'=>'grabber']],
                          [['text'=>'ุจุฏุก ุงูุตูุฏ ๐','callback_data'=>'run'],['text'=>'ุงููุงู ุงูุตูุฏ ๐','callback_data'=>'stop']],
                         [['text'=>'ุญุงูู ุงูุญุณุงุจุงุช โ','callback_data'=>'status']],
                      ]
                  ])
                  ]);
              exec('screen -dmS '.explode(':',$data[1])[0].' php start.php');
              $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"*ุจุฏุก ุงูุตูุฏ.*\n Account: `".explode(':',$data[1])[0].'`',
                'parse_mode'=>'markdown'
              ]);
          	} elseif($data[0] == 'stop'){
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"ุตูุญู ุงูุชุญูู ุงูุฎุงุตู ุจู ุนุฒูุฒู ุงุณุชูุชุน ูุน ุงุณูู ุทุฑููู ูุณุญุจ ุงูุญุณุงุจุงุช ู ุงููุงูุง
ููุฑุงุณู ุงููุทูุฑ - @K_W_0",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุชุณุฌูู ุญุณุงุจ ๐','callback_data'=>'login']],
                          [['text'=>'ุงููุงุน ุงูุณุญุจ โจ','callback_data'=>'grabber']],
                          [['text'=>'ุจุฏุก ุงูุตูุฏ ๐','callback_data'=>'run'],['text'=>'ุงููุงู ุงูุตูุฏ ๐','callback_data'=>'stop']],
                         [['text'=>'ุญุงูู ุงูุญุณุงุจุงุช โ','callback_data'=>'status']],
                      ]
                    ])
                  ]);
              exec('screen -S '.explode(':',$data[1])[0].' -X quit');
          	}
          }
			}
		}
	};
	$bot = new EzTG(array('throw_telegram_errors'=>false,'token' => $token, 'callback' => $callback));
} catch(Exception $e){
	echo $e->getMessage().PHP_EOL;
	sleep(1);
}