$(document).ready(function () {
	$('#disable').click(function () {
		var requesttoken = $('head').data('requesttoken');
		$.post('/index.php/settings/ajax/disableapp.php?requesttoken=' + requesttoken, {appid: 'chat'}, function () {
			location.href ="/index.php";
		});
	});
});
