var trafikApp = angular.module('trafikApp',[]);

trafikApp.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('{%');
    $interpolateProvider.endSymbol('%}');
});

trafikApp.controller('TrafikListController', function($scope, $http){

    $http.get('/trafik/api').success(function(trafiks){
       $scope.trafiks = trafiks;
    });

    $scope.remaining = function() {
        var count = 0;
        angular.forEach($scope.trafiks, function(trafik) {
            count += trafik.tgrp ? 0 : 1;
        });
        return count;
    };
});