<?php
namespace MyAdmin\Daemon;

/**
 * Example Queue Consumer class implementing the PHP Simple Daemon Worker interface.
 * Simulates an Queue Call by generating random results and sleeping a randomly long amount of time.
 *
 * @author: Shane Harter
 */
class Queue implements \Core_IWorker
{
	/**
	 * Provided Automatically
	 * @var \Core_Worker_Mediator
	 */
	public $mediator;

	/**
	 * Queue Endpoint
	 * @var String
	 */
	private $uri;

	/**
	 * Queue Username
	 * @var String
	 */
	private $username;

	/**
	 * Queue Token
	 * @var String
	 */
	private $token;

	/**
	 * Array of results
	 * @var array
	 */
	private $results = [];

	/**
	 * Called on Construct or Init
	 * @return void
	 */
	public function setup()
	{
		// Read Queue details from the INI file
		// The ini plugin is created in the Poller::setup() method
		$ini = $this->mediator->daemon('ini');
		$this->uri      = $ini['queue']['uri'];
		$this->username = $ini['queue']['username'];
		$this->token    = $ini['queue']['token'];
	}

	/**
	 * Called on Destruct
	 * @return void
	 */
	public function teardown()
	{
	}

	/**
	 * This is called during object construction 2to validate any dependencies
	 * @return Array    Return array of error messages (Think stuff like "GD Library Extension Required" or
	 *                  "Cannot open /tmp for Writing") or an empty array
	 */
	public function check_environment(array $errors = array())
	{
		$errors = [];
		if (!function_exists('curl_init')) {
			$errors[] = 'PHP Curl Extension Required: Recompile PHP using the --with-curl option.';
		}

		// Currently this class just simulates an Queue call by generating random results and sleeping a random time.
		// Curl isn't actually being used but it's included here in the interest of making this feel more real and
		// therefore be a better example application.

		return $errors;
	}

	/**
	 * Poll the Queue for updated information -- Simulate an Queue call of varying duration.
	 * @return Array    Return associative array of results
	 */
	public function poll(array $existing_results)
	{
		static $calls = 0;
		$calls++;

		$this->results = $existing_results;
		$this->mediator->log('Calling Queue...');

		// If this is our first call, create initial results
		//      if ($calls == 1) {
		$this->results['queue'] = trim(`curl -s --connect-timeout 60 --max-time 600 -k -d action=get_queue 'https://myvps2.interserver.net/vps_queue.php'`);
		return $this->results;
		//      }

		// Increase the stats in our results array accordingly
	//    $multiplier = mt_rand(100, 125) / 100;
	//    $this->results['customers'] = intval($this->results['customers'] * $multiplier);
	//    $this->results['sales'] = intval($this->results['sales'] * $multiplier);

	//    return $this->results;
	}
}
