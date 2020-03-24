<?php class SimpleInstagram {
	private $user_id = NULL;
	public $access_token = '';
	public $api_url = '';
	
	public function __construct($access_token){
		$this->access_token = $access_token;
		$this->user_id = substr($access_token, 0, strpos($access_token, '.'));
	}
	
	public function get_media($count){
		$api_url = 'https://api.instagram.com/v1/users/'.$this->user_id.'/media/recent/?access_token='.$this->access_token.'&count='.$count;
		$this->api_url = $api_url;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3); // wait for 3 sec to get data
		$data = curl_exec($ch);
		curl_close($ch);

		$obj = json_decode($data);

        if ( !$obj->meta->code ):

            $ret = array();
            $i = 0;

            foreach ($obj->data as $data){
                $ret[$i] = new stdClass();
                $ret[$i]->link = $data->link;
                $ret[$i]->likes = $data->likes->count;
                $ret[$i]->imageLowResolutionUrl = $data->images->low_resolution->url;
                $ret[$i]->imageStandardResolutionUrl = $data->images->standard_resolution->url;
                $ret[$i]->created = $data->created_time;
                $ret[$i]->caption  = $data->caption->text;

                $i++;
            }
            return $ret;

		endif;

	}
}

//object(stdClass)#1510 (1) { ["meta"]=> object(stdClass)#1528 (3) { ["code"]=> int(400) ["error_type"]=> string(25) "OAuthAccessTokenException" ["error_message"]=> string(37) "The access_token provided is invalid." } }
//W