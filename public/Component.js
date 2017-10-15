(function(app) {
    app.AppComponent = function() {

    };

    app.AppComponent.annotations = [ new ng.core.Component({
        selector : 'app',
        templateUrl : 'App.html',
    }) ];
})(window.app || (window.app = {}));