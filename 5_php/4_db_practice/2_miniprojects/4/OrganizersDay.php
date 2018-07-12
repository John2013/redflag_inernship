<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 12.07.2018
 * Time: 15:29
 */

class OrganizersDay
{
	public $wday;
	public $tasks;

	const TABLE_NAME = 'organizer';

	function __construct($wday, $tasks)
	{
		$this->wday = $wday;
		$this->tasks = $tasks;
	}

	function save()
	{
		return
			pg_update(DBCONN, self::TABLE_NAME, ['tasks' => $this->tasks], ['wday' => $this->wday]);
	}

	static function load($wday = null)
	{
		if (isset($wday)) {
			$assoc = pg_select(DBCONN, self::TABLE_NAME, ['wday' => $wday]);
			return new self($assoc['wday'], $assoc['tasks']);
		}
		$query = "SELECT * FROM " . self::TABLE_NAME . " ORDER BY wday";
		$rs = pg_query(DBCONN, $query);
		$days = pg_fetch_all($rs);
		/** @var self[] $models */
		$models = [];
		foreach ($days as $day) {
			$models[$day['wday']] = new self($day['wday'], $day['tasks']);
		}
		return $models;
	}

	function get_weeks_day_name()
	{
		$days_of_week_names = ['понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье'];

		return $days_of_week_names[$this->wday];
	}

	function __toString()
	{
		return $this->tasks;
	}
}