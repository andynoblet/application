(function (app) {
    app.AppModule = function AppModule() {}

    app.AppModule.annotations = [
        new ng.core.NgModule({
            imports: [ng.platformBrowser.BrowserModule, ng.material],
            declarations: [app.AppComponent],
            bootstrap: [app.AppComponent]
        })
    ]
})(window.app || (window.app = {}));