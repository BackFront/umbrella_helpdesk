angular.module('appUosh', []).config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});


var ctrlDashboard = function ($scope) {
    $scope.tickets = [
        {
            hash: "0d581bf28e",
            nome: "descrição"
        },
        {
            hash: "7e80cd980a",
            nome: "Olá mundo"
        }
    ];
};