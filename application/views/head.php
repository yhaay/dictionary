<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/static/lib/bootstrap/css/bootstrap.css"
	rel="stylesheet" media="screen">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
function createAutoClosingAlert(selector, delay) {
	   var alert = $(selector).alert();
	   window.setTimeout(function() { alert.alert('close') }, delay);
	}
</script>
</head>
<body>