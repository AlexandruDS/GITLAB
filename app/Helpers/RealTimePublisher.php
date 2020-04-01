<?php
/**
 * Created by PhpStorm.
 * Date: 26/02/2018
 * Time: 17:00
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Redis;

class RealTimePublisher
{

    /**
     * Application events
     */
	CONST NEW_NOTIFICATION_EVENT = 'NEW_NOTIFICATION';
	CONST NEW_ACCESS_DEVICE_EVENT = 'ACCESS_DEVICE_EVENT';
	CONST NEW_ORDER_MESSAGE_EVENT = 'NEW_ORDER_MESSAGE';
	CONST NEW_ORDER = 'NEW_ORDER';
	/**
     * Broadcast an event with(or without) data to a
     * specified redis channel.
     * @param $channel
     * @param $event
     * @param null $data
     * @return mixed
     */
    public static function publishOnRedis($channel, $event, $data = NULL)
    {
        return Redis::publish($channel, json_encode([
            'event' => $event,
            'data' => $data
        ]));
    }
}