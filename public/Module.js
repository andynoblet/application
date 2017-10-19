(function (app) {
    app.AppModule = function AppModule() {
    }

    var Routes = [
        {
            path: ':Route*',
            component: app.RouteComponent
        }
    ];

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
                ng.material.MatDialogModule,
                // ng['flex-layout'].FlexLayoutModule
                ng.router.RouterModule.forRoot(
                    Routes,
                    {enableTracing: true} // <-- debugging purposes only
                )
            ],
            declarations: [app.AppComponent, app.RouteComponent],
            bootstrap: [app.AppComponent]
        })
    ];
})(window.app || (window.app = {}));