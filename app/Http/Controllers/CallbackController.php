<?php

namespace Zaikok\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Log\Logger;
use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\CarouselContainerBuilder;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\KitchenSink\EventHandler\MessageHandler\TextMessageHandler;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\Event\PostbackEvent;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class CallbackController extends Controller
{
    /**
     * @param Request $request
     * @param Logger $logger
     */
    public function index(Request $request, Logger $logger)
    {
        $httpClient = new CurlHTTPClient(env('CHANNEL_ACCESS_TOKEN'));
        $bot        = new LINEBot($httpClient, ['channelSecret' => env('CHANNEL_SECRET')]);

        $signature = $request->header(HTTPHeader::LINE_SIGNATURE);
        $events    = $bot->parseEventRequest($request->getContent(), $signature);

        foreach ($events as $event) {
            if (!($event instanceof MessageEvent) and !($event instanceof PostbackEvent)) {
                continue;
            }

            $messages = [];
            $token    = $event->getReplyToken();

            switch (true) {
                case $event instanceof MessageEvent:
//            $bot->replyText($token, "userId {$event->getUserId()}");
                    $yesPost    = new PostbackTemplateActionBuilder('はい', 'yes');
                    $noPost     = new PostbackTemplateActionBuilder('いいえ', 'no');
                    $confirm    = new ConfirmTemplateBuilder('メッセージ', [$yesPost, $noPost]);
                    $messages[] = new TemplateMessageBuilder('メッセージのタイトル', $confirm);
                    break;

                case $event instanceof PostbackEvent:
                    $messages[] = new TextMessageBuilder('ポストがきたよ');
                    break;
            }

            $multiMessage = new MultiMessageBuilder;
            foreach ($messages as $message) {
                $multiMessage->add($message);
            }

            $bot->replyMessage($token, $multiMessage);
        }
    }
}
