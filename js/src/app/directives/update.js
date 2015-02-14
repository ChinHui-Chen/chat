angular.module('chat').directive('update', function () {
	return function (scope, element, attrs) {
		element.bind("keydown keypress", function (event) {
			if(event.which === 13) {
				var val = element.val();
				element.val('');
				scope.sendChatMsg(val);
			}
		});
	};
});