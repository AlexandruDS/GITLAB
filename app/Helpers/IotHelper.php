<?php
	/**
	 * Created by PhpStorm.
	 * User: penicamihai
	 * Date: 30/09/2018
	 * Time: 22:57
	 */

	namespace App\Helpers;


	use App\Modules\Users\Models\Session;
    use Redis;

	class IotHelper
	{




		public  static function sendRedistoUsers($userId, $event, $data, $notifBody = NULL)
		{


            $sessions =Session::where('user_id', $userId)
                ->where('expires_at', '>=', time())
                ->get();

			if ($notifBody) {
				$notification = Session::create([
					'user_id' => $userId,
					'event' => $event,
					'body' => $notifBody,
					'extra' => $data
				]);
				$data['notification'] = $notification;
			}
			foreach ($sessions as $session) {
				Redis::publish($session->token, json_encode([
					'event' => $event,
					'data' => $data
				]));

			}

			return true;
		}


		public static function sendRedistoIot($device_id,$message=NULL)
		{
			$session = "#DEVICE".$device_id.'#';
			$event = 'SERVER_EVENT';
			if($message==NULL)
			{
				$message ='UPDATE';
			}

				Redis::publish($session, json_encode([
					'event' => $event,
					'data' => $message
				]));
				//Redis::publish($session->token, $event,json_encode($data));
				//event(new RedisMessage(, $event, $data));


			return true;
		}




	}
