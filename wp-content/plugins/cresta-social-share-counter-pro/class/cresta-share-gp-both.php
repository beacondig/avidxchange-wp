<?php
/**
 * Stumbleupon Get share
 */
class crestaShareSocialCountPRO {
	private $url;
	private $token;
	function __construct($url) {
		$this->url=rawurlencode($url);
		$oldurl = preg_replace("/^https:/i", "http:", $url);
		$this->oldurl =rawurlencode($oldurl);
	}
	function get_stumble() {
		$json_string = $this->get_json_values('https://www.stumbleupon.com/services/1.01/badge.getinfo?url='.$this->url);
		$json_string_old = $this->get_json_values('https://www.stumbleupon.com/services/1.01/badge.getinfo?url='.$this->oldurl);
		if (is_wp_error($json_string)) {
			return 0;
		}
		if (is_wp_error($json_string_old)) {
			return 0;
		}
		$json = json_decode( $json_string, true );
		$json_old = json_decode( $json_string_old, true );
		$json_result = (isset($json['result']['views']) ? $json['result']['views'] : 0);
		$json_result_old = (isset($json_old['result']['views']) ? $json_old['result']['views'] : 0);
		return ($json_result + $json_result_old) ? $json_result + $json_result_old : '0';
	}
	function get_linkedin() {
		$json_string = $this->get_json_values( 'https://www.linkedin.com/countserv/count/share?url='.$this->url.'&format=json' );
		if (is_wp_error($json_string)) {
			return 0;
		}
		$json = json_decode( $json_string, true );
		$json_result = isset( $json['count'] ) ? intval( $json['count'] ) : 0;
		return ($json_result) ? $json_result : '0';
	}
	function get_facebook($value) {
		$this->token=esc_attr($value);
		$json_string = $this->get_json_values('https://graph.facebook.com/v2.7/?id=' . $this->url . '&access_token=' . $this->token );
		$json_string_old = $this->get_json_values('https://graph.facebook.com/v2.7/?id=' . $this->oldurl . '&access_token=' . $this->token );
		if (is_wp_error($json_string)) {
			return 0;
		}
		if (is_wp_error($json_string_old)) {
			return 0;
		}
		$json = json_decode( $json_string, true );
		$json_old = json_decode( $json_string_old, true );
		$json_result = (isset($json['share']['share_count']) ? intval($json['share']['share_count']) : 0);
		$json_result_old = (isset($json_old['share']['share_count']) ? intval($json_old['share']['share_count']) : 0);
		return ($json_result + $json_result_old) ? $json_result + $json_result_old : '0';
	}
	private function get_json_values( $url ) {
		$args            = array( 'timeout' => 6 );
		$response        = wp_remote_get( $url, $args );
		$json_response   = wp_remote_retrieve_body( $response );
		return $json_response;
	}
}

?>