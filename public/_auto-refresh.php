<?php
	$time = (int) $_GET['ts'];

	print json_encode(!!`find .. -type d -newermt '@$time' -not \( -wholename '../cache*' -o -wholename '../.git*' \)`);
