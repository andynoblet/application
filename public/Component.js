(function (app) {
    app.AppComponent = function () {
    };
    app.AppComponent = ng.core.Class({
        constructor: function() {
            console.log(this.router);
        }});

    var component = new ng.core.Component();
    console.log(component);
    app.AppComponent.annotations = [new ng.core.Component({
        selector: 'app',
        templateUrl: 'Layout/Index/App',
    })];
})(window.app || (window.app = {}));