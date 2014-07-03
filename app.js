(function() {
  var app = angular.module('efra', []);
  
  app.controller('StoreController', ['$http', function($http){
		this.twitter={};
	this.feedsTwitter = function(artcrt){
            $http({
                method: 'POST', 
                url: 'serveryou.php',
				/*headers: {
				    Content-Type: 'application / json'
					Accept: 'application / json'
				},*/
				data: {
				'usuario':"efra",
				'password':"margarito"
				}
            }).success(function(data) {
				artcrt.twitter=data;
               console.log(data);
			   
            }).error(function(data, status, headers, config) {
                console.log('error');
               //$scope.data = status;
            });
        };
  }]);
})();
