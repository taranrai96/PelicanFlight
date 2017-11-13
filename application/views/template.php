<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
        <div id="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<ul class="nav navbar-nav">
						{menubar}
					</ul>
				 </div>
			</nav>
			{content}
        </div>
				
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	</body>
</html>