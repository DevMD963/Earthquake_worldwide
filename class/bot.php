<?php
class bot {
    const telgramApi = 'https://api.telegram.org/bot';
    public function __construct(private string $token) {}
    public function bot (string $Method,array $datas = []) {
        $request =  (new \Curl\Curl())->get(self::telgramApi.$this->token."/{$Method}",$datas);
    }
    public function sendMessage (int|string $chat_id,string $text,?string $parse_mode = '',array $reply_markup = [],int $reply_to_message_id = 0) :self {
        $this->bot('sendMessage',[
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'reply_markup' => $reply_markup,
            'reply_to_message_id' => $reply_to_message_id
        ]);
        return $this;
    }
    public function loop(callable $function,database $database,request $request) :void {
        while (true) { $function($database,$request); usleep(20000); }
    }
    public function start (database $database,request $request) :void {
        $this->loop(function:function(database $database,request $request) {
            $request = new request();
            foreach ($request->arabic() as $key => $value) {
                $txt = "🚨 رسالة زلزال 🚨\n\nالوقت : {$value['time']}  🕔\nالمدينة :  {$value['country']} 🌍\nالموقع : {$value['location']}  🗾\nالعمق : {$value['depth']} 🕳\nالقوة :  {$value['mag']} ⚡️\nاسم المكان : {$value['place']} 🏢\nالقارة : {$value['continent']} 🗺\n\n🚧 ابق آمنا 🚧";
                if ($database->isTrue($txt)) {
                    $database->addData(result:$txt);
                    $this->sendMessage(chat_id:'-1001834003495',text:$txt);
                }
            }
        },database:$database,request:$request);
    }
}

