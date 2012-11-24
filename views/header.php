<html>
	<head>
		<title><?php if (!empty($title)) {echo $title;} ?> YAF实例</title>
		<link rel="stylesheet" type="text/css" href="/public/css/site.css">
		<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">

		<script type="text/javascript" src="/public/js/seajs/1.3.0/sea-debug.js"></script>
		<script type="text/javascript">

			function load(module) {
				var module = module;
				seajs.use('/public/js/app.js', function(app){
					app.bootstrap();
					if (module.constructor === Array) {
						$.each(module, function(index){
							app.load(module[index]);
						});
					} else {
						app.load(module);
					}
				});
			}
		</script>
	</head>
	<body>