<!DOCTYPE html>
<html>
<head>
<title>Spring SSE Push Notifications</title>
<script>
	function initialize() {
		const eventSource = new EventSource('http://localhost:8080');
		eventSource.onmessage = e => {
			const msg = e.data;
			document.getElementById("greet").innerHTML = msg;
		};
		eventSource.onopen = e => console.log('open');
		eventSource.onerror = e => {
			if (e.readyState == EventSource.CLOSED) {
				console.log('close');
			}
			else {
				console.log(e);
			}
		};
		eventSource.addEventListener('second', function(e) {
			console.log('second', e.data);
		}, false);
	}
	window.onload = initialize;
</script>
</head>
<body>
	<div id="greet"></div>
</body>
</html>