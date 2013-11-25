(function _autoRefresh() {
	var xhr = new XMLHttpRequest();
	
	xhr.onload = function() {
		if (xhr.responseText == 'true')
			location.reload();
	};
	
	xhr.open('get', '/_auto-refresh.php?ts=' + _pageInit, true);
	xhr.send();

	setTimeout(_autoRefresh, 1000);
})();
