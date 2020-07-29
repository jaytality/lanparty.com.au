<?php

class Error {
	function notFound($data) {
		echo '<h1>Error Report</h1>';
		echo '<hr />';
		echo "<p>You've managed to hit a URL which returned an error! Our development team has been notified of this;";
		echo "please hit your browser's back button, sorry for the inconvenience!</p>";
		echo '<br>';
		echo '<pre>';
		$data['message'] = 'No controller was found for this path';
		print_r($data);
		die();
	}
}