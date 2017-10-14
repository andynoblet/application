(function(app) {
    app.AppComponent = function() {

    };

    app.AppComponent.annotations = [ new ng.core.Component({
        selector : 'app',
        templateUrl : 'App.html',
        // directives : [ app.HelloWorldComponent ]
    }) ];
})(window.app || (window.app = {}));