angular.module('newsFormApp')
    .factory('FormService', function($resource){
        return $resource('http://localhost:3000/api/fetchnewscard/:user', {user: '@user'});
    })