<?php
class rex_markdown {
	public static function getHtml($md, $breaksEnabled = true) {
		$parsedown = new Parsedown();
		$parsedown->setBreaksEnabled($breaksEnabled);

		return $parsedown->text($md);
	}

	public static function getHtmlLine($md, $breaksEnabled = true) {
		$parsedown = new Parsedown();
		$parsedown->setBreaksEnabled($breaksEnabled);

		return $parsedown->line($md);
	}

	public static function getString($key, $breaksEnabled = true) {
		$md = rex_string_table::getString($key);

		return self::getHtml($md, $breaksEnabled);
	}

	public static function getStringLine($key, $breaksEnabled = true) {
		$md = rex_string_table::getString($key);

		return self::getHtmlLine($md, $breaksEnabled);
	}
}

