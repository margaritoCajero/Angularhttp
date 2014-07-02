(function() {
  var app = angular.module('efra', []);
  
  app.controller('StoreController', ['$http', function($http){
    
	this.feedsTwitter = function(){
            console.log('entro');
            $http({
                method: 'POST', 
                url: 'get-tweets.php',
				data: {
				'user':"efra",
				'pass':"margarito"
				}
            }).success(function(data) {
               console.log(data);
            }).error(function(data, status, headers, config) {
                console.log('error');
               //$scope.data = status;
            });
        };
  }]);
})();
