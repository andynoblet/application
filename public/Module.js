(function (app) {
    app.AppModule = function AppModule() {
    }

    app.AppModule.annotations = [
        new ng.core.NgModule({
            imports: [
                ng.platformBrowser.BrowserModule,
                ng.platformBrowser.animations.BrowserAnimationsModule,
                ng.material.MatToolbarModule,
                ng.material.MatSidenavModule,
                ng.material.MatCardModule,
                ng.material.MatExpansionModule,
                ng.material.MatButtonModule,
                ng.material.MatMenuModule,
                ng['flex-layout'].FlexLayoutModule
            ],
            declarations: [app.AppComponent],
            bootstrap: [app.AppComponent]
        })
    ]
})(window.app || (window.app = {}));