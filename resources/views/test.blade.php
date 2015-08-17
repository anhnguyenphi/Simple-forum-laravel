<!DOCTYPE html>
<html>
<head>
	<title>Testing</title>
	<link href="/css/mfb.css" rel="stylesheet"/>
</head>
<body>
	<nav mfb-menu position="br" effect="zoomin" label="hover here"
     active-icon="ion-edit" resting-icon="ion-plus-round"
     toggling-method="click">
  <button mfb-button icon="paper-airplane" label="menu item"></button>
</nav>
	<script src="/js/angular.min.js">
	</script>
	<script src="/js/mfb-directive.js">
		var app = angular.module('your-app', ['ng-mfb']);
	</script>
</body>
</html>