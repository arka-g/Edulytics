// public/core.js
var scotchTodo = angular.module('scotchTodo', []);

scotchTodo.controller('mainController', ['$scope', function($scope) {
  $scope.greeting = 'Hola!';
  console.log("Test");
}]);