<?php
class website {

	# ====================================
	#			General Functions
	# ====================================
	public static function website_protocol() {
		return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' && $_SERVER['HTTPS'] ? 'https://' : 'http://');
	}

	public static function website_url() {
		return (self::website_protocol() . $_SERVER['HTTP_HOST'] . preg_replace('/\/$/', '', dirname($_SERVER['PHP_SELF'])) . '/');
	}

	public static function current_url() {
		return (self::website_protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}

	public static function website_redirect($url) {
		header('location: ' . $url);
		exit;
	}

	public static function classThis($content) {
		return (json_decode(json_encode($content)));
	}

	public static function http_request($url, $post = false, $headers = false, $timeout = 2) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		if ( $post ) {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}
		if ( $headers ) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		return array(
			'data'		=> curl_exec($ch),
			'redirect'	=> curl_getinfo($ch, CURLINFO_REDIRECT_URL),
			'status'		=> curl_getinfo($ch, CURLINFO_HTTP_CODE)
		);
	}

	# ====================================
	#			Discord Functions
	# ====================================
	public static function discord_auth_redirect($client_id, $scopes) {
		self::website_redirect('https://discordapp.com/api/oauth2/authorize?' . http_build_query(array(
			'response_type'	=> 'code',
			'client_id'			=> $client_id,
			'scope'				=> $scopes
		)));
	}

	public static function discord_auth($client_id, $client_secret, $scopes, $code) {
		$request = self::http_request('https://discordapp.com/api/oauth2/token',
			http_build_query(array( 'grant_type' => 'authorization_code', 'client_id' => $client_id, 'client_secret' => $client_secret, 'scope' => $scopes, 'code' => $code)),
			array( 'content-type: application/x-www-form-urlencoded' )
		);
		return ($request['status'] === 200 ? json_decode($request['data'], true) : false);
	}

	public static function discord_user_info($token) {
		$request = self::http_request('https://discordapp.com/api/users/@me', false, array( 'authorization: Bearer ' . $token ));
		return ($request['status'] === 200 ? json_decode($request['data'], true) : false);
	}

}
?>
