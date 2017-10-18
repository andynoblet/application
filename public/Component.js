(function(app) {
    app.AppComponent = function() {

    };

    app.AppComponent.annotations = [ new ng.core.Component({
        selector : 'app',
        templateUrl : 'Layout/Index/App',
    }) ];
})(window.app || (window.app = {}));