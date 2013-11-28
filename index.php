<!DOCTYPE html>
<html>
<head>
<title>Gorman Creative LTD</title>
<meta name="description" content="Gorman Creative LTD"/>
<meta name="keywords" content="Gorman,Creative"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<meta charset="utf-8"/>
<meta name="robots" content="noindex,nofollow"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="apple-touch-icon" href="/apple-touch-icon.png"/>
<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/mobile.css" media="all and (max-width: 959px)"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<div id="content">
	<form id="contentForm" action="./" method="post">
		<fieldset>
			<p><input type="radio" name="strtype" id="strtype1" value="numeric" checked="checked" />
				<label for="strtype1">Numeric to Roman</label>
			<input type="radio" name="strtype" id="strtype2" value="roman" />
				<label for="strtype2">Roman to Numeric</label>
			</p>

			<p><label for="strvalue">Enter Value</label>
			<input type="text" name="strvalue" id="strvalue" value="" /></p>

			<p><input type="submit" value="convert" id="submit" /></p>
		</fieldset>
	</form>
	<div id="result"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#contentForm").submit(function(e) {
            e.preventDefault();
			$('#result').show();
			$.ajax({
				url: 'process.php',
				data: $('#contentForm').serialize(),
				cache: false,
				type: 'POST',
				dataType: 'json',
				success: function(r, status) {
					$('#result').html(r.message);
				},
				error:function(data,status){
					alert(status);
				}
			});
		});
	});
</script>
</body>
</html>