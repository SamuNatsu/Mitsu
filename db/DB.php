<?php
namespace Mitsu;

class DB {
	private $p_lock, $p_db;

	public function __construct() {
		if (!file_exists(__DIR__ . '/config.php') || !is_file(__DIR__ . '/config.php')) {
			$lN = substr(md5(time()), 0, 8);
			$dbN = substr(sha1(time()), 0, 8);
			file_put_contents(__DIR__ . '/config.php', "<?php \$K='$lN,$dbN';", LOCK_EX);
			touch(__DIR__ . '/' . $lN);
			file_put_contents(__DIR__ . '/' . $dbN, '{}', LOCK_EX);
		}
		$config = file_get_contents(__DIR__ . '/config.php');
		$this->p_lock = __DIR__ . '/' . substr($config, 10, 8);
		$this->p_db = __DIR__ . '/' . substr($config, 19, 8);
	}
	public function get(string $idx) {
		$fp = fopen($this->p_lock, 'rw');
		$rtn = null;
		if (flock($fp, LOCK_EX)) {
			$json = json_decode(file_get_contents($this->p_db), true);
			if ($idx === '') {
				flock($fp, LOCK_UN);
				fclose($fp);
				return $json;
			}
			$ls = explode('.', $idx);
			foreach ($ls as $key)
				if (is_array($json) && array_key_exists($key, $json))
					$json = $json[$key];
				else {
					$json = null;
					break;
				}
			$rtn = $json;
			flock($fp, LOCK_UN);
		}
		fclose($fp);
		return $rtn;
	}
	public function fetchAdd(string $idx, $val) {
		$fp = fopen($this->p_lock, 'rw');
		$rtn = null;
		if (flock($fp, LOCK_EX)) {
			$json = json_decode(file_get_contents($this->p_db), true);
			if ($idx === '') {
				flock($fp, LOCK_UN);
				fclose($fp);
				return null;
			}
			$ls = explode('.', $idx);
			$ref = &$json;
			foreach ($ls as $key)
				if (is_array($ref) && array_key_exists($key, $ref))
					$ref = &$ref[$key];
				else if (!is_array($ref)) {
					$ref = [$key => null];
					$ref = &$ref[$key];
				}
				else {
					$ref[$key] = null;
					$ref = &$ref[$key];
				}
			if (!is_int($ref))
				$ref = $val;
			else 
				$ref += $val;
			file_put_contents($this->p_db, json_encode($json), LOCK_EX);
			$rtn = $ref;
			flock($fp, LOCK_UN);
		}
		fclose($fp);
		return $rtn;
	}
}
