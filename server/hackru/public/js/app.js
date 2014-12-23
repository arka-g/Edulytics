(function(){
	var app = angular.module('store',[]);
	app.controller('formController', function(){
		this.product = gem;
	});

	var gem = {
		assessment_id: 'name',
		mark: '0.7',
	};
})();
