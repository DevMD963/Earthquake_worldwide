<?php
require_once 'vendor/autoload.php';
class bot {
    const telgramApi = 'https://api.telegram.org/bot';
    public function __construct(private string $token) {}
    public function bot (string $Method,array $datas = []) {
        $request =  (new \Curl\Curl())->get(self::telgramApi.$this->token."/{$Method}",$datas);
    }
    public function sendMessage (int|string $chat_id,string $text,?string $parse_mode = '',array $reply_markup = [],int $reply_to_message_id) :self {
        $this->bot('sendMessage',[
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'reply_markup' => $reply_markup,
            'reply_to_message_id' => $reply_to_message_id
        ]);
        return $this;
    }
    public function loop(callable $function) :void {
        while (true) { $function(); usleep(20000); }
    }
    public function start () :void {
        
    }
}

