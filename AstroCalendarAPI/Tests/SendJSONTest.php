<?php
require_once('AstroCalendarAPI\API\sendJSON.php');

/**
 * Test that JSON is sent to the app properly.
 * @author Rodney
 */
class SendJSONTest extends PHPUnit_Framework_TestCase{
	protected $jsonOutput;
	protected function setUp(){

		$jsonObj = new sendJSON();
		$info = array();
		$info['count'] = 2;
		$info[0] = array();
		$info[0]['day'] = 'Monday';
		$info[0]['dayNumerical'] = '14';
		$info[0]['month'] = 'November';
		$info[0]['year'] = '2011';
		$info[0]['payload'] = array(
			'sunrise'  => '07-44-00',
            'sunset'   => '17-34-23',
            'moonrise' => '13-08-00',
            'moonset'  => '22-08-00'
            );
            $info[1] = array();
            $info[1]['day'] = 'Tuesday';
            $info[1]['dayNumerical'] = '15';
            $info[1]['month'] = 'Novmeber';
            $info[1]['year'] = '2011';
            $info[1]['payload'] = array(
			'sunrise'  => '07-52-00',
            'sunset'   => '17-28-00',
            'moonrise' => '13-02-22',
            'moonset'  => '22-15-38'
            );
            $json = $jsonObj->createJSON($info);
            $this->jsonOutput = json_decode($json, true);
	}
	/**
	 * Test to check that the JSON had counted the number of days given.
	 */
	public function testJSONNHasCountKey(){

		$this->assertArrayHasKey('count', $this->jsonOutput);
	}
	/**
	 * Test to check that a set has a day.
	 */
	public function testFirstIndexHasKeyDay(){

		$this->assertArrayHasKey('day', $this->jsonOutput[0]);
	}
	/**
	 * Test to check that a set has a numerical version of the day.
	 */
	public function testFirstIndexHasKeyDayNumercial(){

		$this->assertArrayHasKey('dayNumerical', $this->jsonOutput[0]);
	}
	/**
	 * Test to check that a set has a month.
	 */
	public function testFirstIndexHasKeyMonth(){

		$this->assertArrayHasKey('month', $this->jsonOutput[0]);
	}
	/**
	 * Test to check that a set has a year.
	 */
	public function testFirstIndexHasKeyYear(){

		$this->assertArrayHasKey('year', $this->jsonOutput[0]);
	}
	/**
	 * Test to check that a set has an array of information.
	 */
	public function testFirstIndexHasKeyPayload(){

		$this->assertArrayHasKey('payload', $this->jsonOutput[0]);
	}
	/**
	 * Test to check that a payload has sunrise.
	 */
	public function testFirstPayloadHasKeySunrise(){

		$this->assertArrayHasKey('sunrise', $this->jsonOutput[0]['payload']);
	}
	/**
	 * Test to check that a payload has sunset.
	 */
	public function testFirstPayloadHasKeySunset(){

		$this->assertArrayHasKey('sunset', $this->jsonOutput[0]['payload']);
	}
	/**
	 * Test to check that a payload has moonrise.
	 */
	public function testFirstPayloadHasKeyMoonrise(){

		$this->assertArrayHasKey('moonrise', $this->jsonOutput[0]['payload']);
	}
	/**
	 * Test to check that a payload has moonset.
	 */
	public function testFirstPayloadHasKeyMoonset(){

		$this->assertArrayHasKey('moonset', $this->jsonOutput[0]['payload']);
	}
	/**
	 * Check that the count is 2.
	 */
	public function testJSONNHas2Counts(){

		$this->assertEquals(2, $this->jsonOutput['count']);
	}
	/**
	 * Check that the first index has day Monday.
	 */
	public function testFirstIndexHasDayMonday(){

		$this->assertEquals('Monday', $this->jsonOutput[0]['day']);
	}
	/**
	 * Check that the first index has numerical day 14.
	 */
	public function testFirstIndexHasDayNumerical14(){

		$this->assertEquals('14', $this->jsonOutput[0]['dayNumerical']);
	}
	/**
	 * Check that the first index has month November.
	 */
	public function testFirstIndexHasMonthNovember(){

		$this->assertEquals('November', $this->jsonOutput[0]['month']);
	}
	/**
	 * Check that the first index has year 2011.
	 */
	public function testFirstIndexHasYear2011(){

		$this->assertEquals('2011', $this->jsonOutput[0]['year']);
	}
	/**
	 * Check that the first payload sunrise is 07-44-00.
	 */
	public function testFirstPayloadHasSunrise074400(){

		$this->assertEquals('07-44-00', $this->jsonOutput[0]['payload']['sunrise']);
	}
	/**
	 * Check that the first payload sunset is 17-34-23.
	 */
	public function testFirstPayloadHasSunset173423(){

		$this->assertEquals('17-34-23', $this->jsonOutput[0]['payload']['sunset']);
	}
	/**
	 * Check that the first payload moonrise is 13-08-00.
	 */
	public function testFirstPayloadHasMoonrise130800(){

		$this->assertEquals('13-08-00', $this->jsonOutput[0]['payload']['moonrise']);
	}
	/**
	 * Check that the first payload moonset is 22-08-00.
	 */
	public function testFirstPayloadHasMoonset220800(){

		$this->assertEquals('22-08-00', $this->jsonOutput[0]['payload']['moonset']);
	}
}