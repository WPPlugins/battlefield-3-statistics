<?php 

/**
 * @package battlefield-3-statistics
 * @version 1.0.1
 * @license GPLv2 - http://www.gnu.org/licenses/gpl-2.0.html
 * @author Jeroen Weustink
 *
 */

class api
{
	/**
	 * Get data from battlefield API
	 * @param string $player
	 * @param string $platform
	 * @return array|string $response;
	 */
	public function getPlayer($player, $platform)
	{
		$postData = array(
			'player' => $player,
			'opt' => json_encode(array(
				'all' => TRUE
			))
		);
		
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, "http://api.bf3stats.com/{$platform}/player/");
		curl_setopt($curl ,CURLOPT_USERAGENT, "BF3StatsAPI/0.1");
		curl_setopt($curl ,CURLOPT_HTTPHEADER, array("Expect:"));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_POST, TRUE);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		return $response;
	}
}

?>