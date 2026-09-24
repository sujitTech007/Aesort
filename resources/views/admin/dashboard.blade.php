@include('admin.include.header')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            
            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0 py-2">Dashboards</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0 fs-13">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ddAeshort</a></li>
                        
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            

            

            <div class="page-container">

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Revenue">
                                            Total Revenue</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">$1.25M</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-1"><i class="ri-arrow-up-line"></i>
                                                15.34%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded fs-28">
                                            <iconify-icon icon="solar:wallet-bold-duotone"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M5.75 7a.75.75 0 0 0 0 1.5h4a.75.75 0 0 0 0-1.5z"></path><path fill="currentColor" fill-rule="evenodd" d="M21.188 8.004q-.094-.005-.2-.004h-2.773C15.944 8 14 9.736 14 12s1.944 4 4.215 4h2.773q.106.001.2-.004c.923-.056 1.739-.757 1.808-1.737c.004-.064.004-.133.004-.197V9.938c0-.064 0-.133-.004-.197c-.069-.98-.885-1.68-1.808-1.737m-3.217 5.063c.584 0 1.058-.478 1.058-1.067c0-.59-.474-1.067-1.058-1.067s-1.06.478-1.06 1.067c0 .59.475 1.067 1.06 1.067" clip-rule="evenodd"></path><path fill="currentColor" d="M21.14 8.002c0-1.181-.044-2.448-.798-3.355a4 4 0 0 0-.233-.256c-.749-.748-1.698-1.08-2.87-1.238C16.099 3 14.644 3 12.806 3h-2.112C8.856 3 7.4 3 6.26 3.153c-1.172.158-2.121.49-2.87 1.238c-.748.749-1.08 1.698-1.238 2.87C2 8.401 2 9.856 2 11.694v.112c0 1.838 0 3.294.153 4.433c.158 1.172.49 2.121 1.238 2.87c.749.748 1.698 1.08 2.87 1.238c1.14.153 2.595.153 4.433.153h2.112c1.838 0 3.294 0 4.433-.153c1.172-.158 2.121-.49 2.87-1.238q.305-.308.526-.66c.45-.72.504-1.602.504-2.45l-.15.001h-2.774C15.944 16 14 14.264 14 12s1.944-4 4.215-4h2.773q.079 0 .151.002" opacity=".5"></path></svg></template></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-revenue" style="min-height: 45px;"><div id="apexchartsoom6djiy" class="apexcharts-canvas apexchartsoom6djiy apexcharts-theme-" style="width: 290px; height: 45px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="290" height="45"><foreignobject x="0" y="0" width="290" height="45"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 22.5px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apexcharts-legend-group-horizontal {
        flex-direction: column;
      }
      .apexcharts-legend-group {
        display: flex;
      }
      .apexcharts-legend-group-vertical {
        flex-direction: column-reverse;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
        align-items: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
        align-items: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
        align-items: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }

    </style></foreignobject><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0.5)"><defs><clippath id="gridRectMaskoom6djiy"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectBarMaskoom6djiy"><rect width="295" height="49" x="-2.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectMarkerMaskoom6djiy"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMaskoom6djiy"></clippath><clippath id="nonForecastMaskoom6djiy"></clippath><lineargradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1000"><stop stop-opacity="0.5" stop-color="rgba(62,195,150,0.5)" offset="0"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="0.9"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="1"></stop></lineargradient></defs><line x1="0" y1="0" x2="0" y2="44" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="44" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g class="apexcharts-grid"><g class="apexcharts-gridlines-horizontal" style="display: none;"><line x1="0" y1="0" x2="290" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="22" x2="290" y2="22" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="44" x2="290" y2="44" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g class="apexcharts-gridlines-vertical" style="display: none;"></g><line x1="0" y1="44" x2="290" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line x1="0" y1="1" x2="0" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g class="apexcharts-grid-borders" style="display: none;"></g><g class="apexcharts-area-series apexcharts-plot-series"><g class="apexcharts-series" zIndex="0" seriesName="Revenue" data:longestSeries="true" rel="1" data:realIndex="0"><path d="M 0 22.000000000000004C 14.5 22.000000000000004 26.92857142857143 6.600000000000001 41.42857142857143 6.600000000000001C 55.92857142857143 6.600000000000001 68.35714285714286 17.6 82.85714285714286 17.6C 97.35714285714286 17.6 109.78571428571429 7.105427357601002e-15 124.28571428571429 7.105427357601002e-15C 138.78571428571428 7.105427357601002e-15 151.21428571428572 13.200000000000003 165.71428571428572 13.200000000000003C 180.21428571428572 13.200000000000003 192.64285714285714 24.200000000000003 207.14285714285714 24.200000000000003C 221.64285714285714 24.200000000000003 234.07142857142858 4.400000000000006 248.57142857142858 4.400000000000006C 263.07142857142856 4.400000000000006 275.5 11 290 11C 290 11 290 11 290 44 L 0 44z" fill="url(#SvgjsLinearGradient1000)" fill-opacity="1" stroke="none" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskoom6djiy)" pathTo="M 0 22.000000000000004C 14.5 22.000000000000004 26.92857142857143 6.600000000000001 41.42857142857143 6.600000000000001C 55.92857142857143 6.600000000000001 68.35714285714286 17.6 82.85714285714286 17.6C 97.35714285714286 17.6 109.78571428571429 7.105427357601002e-15 124.28571428571429 7.105427357601002e-15C 138.78571428571428 7.105427357601002e-15 151.21428571428572 13.200000000000003 165.71428571428572 13.200000000000003C 180.21428571428572 13.200000000000003 192.64285714285714 24.200000000000003 207.14285714285714 24.200000000000003C 221.64285714285714 24.200000000000003 234.07142857142858 4.400000000000006 248.57142857142858 4.400000000000006C 263.07142857142856 4.400000000000006 275.5 11 290 11C 290 11 290 11 290 44 L 0 44z" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44z"></path><path d="M 0 22.000000000000004C 14.5 22.000000000000004 26.92857142857143 6.600000000000001 41.42857142857143 6.600000000000001C 55.92857142857143 6.600000000000001 68.35714285714286 17.6 82.85714285714286 17.6C 97.35714285714286 17.6 109.78571428571429 7.105427357601002e-15 124.28571428571429 7.105427357601002e-15C 138.78571428571428 7.105427357601002e-15 151.21428571428572 13.200000000000003 165.71428571428572 13.200000000000003C 180.21428571428572 13.200000000000003 192.64285714285714 24.200000000000003 207.14285714285714 24.200000000000003C 221.64285714285714 24.200000000000003 234.07142857142858 4.400000000000006 248.57142857142858 4.400000000000006C 263.07142857142856 4.400000000000006 275.5 11 290 11" fill="none" fill-opacity="1" stroke="#3ec396" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskoom6djiy)" pathTo="M 0 22.000000000000004C 14.5 22.000000000000004 26.92857142857143 6.600000000000001 41.42857142857143 6.600000000000001C 55.92857142857143 6.600000000000001 68.35714285714286 17.6 82.85714285714286 17.6C 97.35714285714286 17.6 109.78571428571429 7.105427357601002e-15 124.28571428571429 7.105427357601002e-15C 138.78571428571428 7.105427357601002e-15 151.21428571428572 13.200000000000003 165.71428571428572 13.200000000000003C 180.21428571428572 13.200000000000003 192.64285714285714 24.200000000000003 207.14285714285714 24.200000000000003C 221.64285714285714 24.200000000000003 234.07142857142858 4.400000000000006 248.57142857142858 4.400000000000006C 263.07142857142856 4.400000000000006 275.5 11 290 11" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44" fill-rule="evenodd"></path><g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"></g></g><g class="apexcharts-datalabels" data:realIndex="0"></g></g><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g class="apexcharts-xaxis" transform="translate(0, 0)"><g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g class="apexcharts-yaxis-annotations"></g><g class="apexcharts-xaxis-annotations"></g><g class="apexcharts-point-annotations"></g></g></svg></div></div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Products Sold">
                                            Products Sold</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">48.7k</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-1"><i class="ri-arrow-up-line"></i>
                                                10.12%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded fs-28">
                                            <iconify-icon icon="solar:cart-bold-duotone"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.023 2a1.75 1.75 0 0 0 0 3.5h4a1.75 1.75 0 1 0 0-3.5zM3.887 16.205C3.029 12.773 2.6 11.058 3.5 9.904S6.17 8.75 9.708 8.75h4.63c3.538 0 5.306 0 6.207 1.154s.472 2.87-.386 6.301c-.546 2.183-.818 3.274-1.632 3.91c-.814.635-1.939.635-4.189.635h-4.63c-2.25 0-3.375 0-4.189-.635c-.814-.636-1.087-1.727-1.632-3.91" opacity=".5"></path><path fill="currentColor" d="M15.604 4.502a1.74 1.74 0 0 0 .002-1.501c.683.005 1.216.036 1.691.222a3.25 3.25 0 0 1 1.426 1.09c.367.494.54 1.127.777 1.999l.046.17l.513 2.963c-.409-.282-.936-.45-1.618-.55l-.36-2.087c-.285-1.04-.388-1.367-.562-1.601a1.75 1.75 0 0 0-.768-.587c-.22-.086-.485-.11-1.147-.118M8.441 3.001a1.74 1.74 0 0 0 .002 1.501c-.662.007-.927.032-1.147.118a1.75 1.75 0 0 0-.768.587c-.174.234-.277.561-.561 1.6l-.361 2.089c-.682.1-1.209.267-1.618.548l.513-2.962l.046-.17c.237-.872.41-1.505.777-2A3.25 3.25 0 0 1 6.75 3.224c.475-.186 1.008-.217 1.691-.222"></path></svg></template></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-products" style="min-height: 45px;"><div id="apexcharts1mizu0hw" class="apexcharts-canvas apexcharts1mizu0hw apexcharts-theme-" style="width: 290px; height: 45px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="290" height="45"><foreignobject x="0" y="0" width="290" height="45"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 22.5px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apexcharts-legend-group-horizontal {
        flex-direction: column;
      }
      .apexcharts-legend-group {
        display: flex;
      }
      .apexcharts-legend-group-vertical {
        flex-direction: column-reverse;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
        align-items: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
        align-items: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
        align-items: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }

    </style></foreignobject><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0.5)"><defs><clippath id="gridRectMask1mizu0hw"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectBarMask1mizu0hw"><rect width="295" height="49" x="-2.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectMarkerMask1mizu0hw"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMask1mizu0hw"></clippath><clippath id="nonForecastMask1mizu0hw"></clippath><lineargradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1001"><stop stop-opacity="0.5" stop-color="rgba(52,140,212,0.5)" offset="0"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="0.9"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="1"></stop></lineargradient></defs><line x1="0" y1="0" x2="0" y2="44" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="44" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g class="apexcharts-grid"><g class="apexcharts-gridlines-horizontal" style="display: none;"><line x1="0" y1="0" x2="290" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="22" x2="290" y2="22" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="44" x2="290" y2="44" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g class="apexcharts-gridlines-vertical" style="display: none;"></g><line x1="0" y1="44" x2="290" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line x1="0" y1="1" x2="0" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g class="apexcharts-grid-borders" style="display: none;"></g><g class="apexcharts-area-series apexcharts-plot-series"><g class="apexcharts-series" zIndex="0" seriesName="Expenses" data:longestSeries="true" rel="1" data:realIndex="0"><path d="M 0 30.8C 14.5 30.8 26.92857142857143 17.6 41.42857142857143 17.6C 55.92857142857143 17.6 68.35714285714286 28.6 82.85714285714286 28.6C 97.35714285714286 28.6 109.78571428571429 8.800000000000004 124.28571428571429 8.800000000000004C 138.78571428571428 8.800000000000004 151.21428571428572 22.000000000000004 165.71428571428572 22.000000000000004C 180.21428571428572 22.000000000000004 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 13.200000000000003 248.57142857142858 13.200000000000003C 263.07142857142856 13.200000000000003 275.5 19.8 290 19.8C 290 19.8 290 19.8 290 44 L 0 44z" fill="url(#SvgjsLinearGradient1001)" fill-opacity="1" stroke="none" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask1mizu0hw)" pathTo="M 0 30.8C 14.5 30.8 26.92857142857143 17.6 41.42857142857143 17.6C 55.92857142857143 17.6 68.35714285714286 28.6 82.85714285714286 28.6C 97.35714285714286 28.6 109.78571428571429 8.800000000000004 124.28571428571429 8.800000000000004C 138.78571428571428 8.800000000000004 151.21428571428572 22.000000000000004 165.71428571428572 22.000000000000004C 180.21428571428572 22.000000000000004 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 13.200000000000003 248.57142857142858 13.200000000000003C 263.07142857142856 13.200000000000003 275.5 19.8 290 19.8C 290 19.8 290 19.8 290 44 L 0 44z" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44z"></path><path d="M 0 30.8C 14.5 30.8 26.92857142857143 17.6 41.42857142857143 17.6C 55.92857142857143 17.6 68.35714285714286 28.6 82.85714285714286 28.6C 97.35714285714286 28.6 109.78571428571429 8.800000000000004 124.28571428571429 8.800000000000004C 138.78571428571428 8.800000000000004 151.21428571428572 22.000000000000004 165.71428571428572 22.000000000000004C 180.21428571428572 22.000000000000004 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 13.200000000000003 248.57142857142858 13.200000000000003C 263.07142857142856 13.200000000000003 275.5 19.8 290 19.8" fill="none" fill-opacity="1" stroke="#348cd4" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask1mizu0hw)" pathTo="M 0 30.8C 14.5 30.8 26.92857142857143 17.6 41.42857142857143 17.6C 55.92857142857143 17.6 68.35714285714286 28.6 82.85714285714286 28.6C 97.35714285714286 28.6 109.78571428571429 8.800000000000004 124.28571428571429 8.800000000000004C 138.78571428571428 8.800000000000004 151.21428571428572 22.000000000000004 165.71428571428572 22.000000000000004C 180.21428571428572 22.000000000000004 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 13.200000000000003 248.57142857142858 13.200000000000003C 263.07142857142856 13.200000000000003 275.5 19.8 290 19.8" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44" fill-rule="evenodd"></path><g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"></g></g><g class="apexcharts-datalabels" data:realIndex="0"></g></g><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g class="apexcharts-xaxis" transform="translate(0, 0)"><g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g class="apexcharts-yaxis-annotations"></g><g class="apexcharts-xaxis-annotations"></g><g class="apexcharts-point-annotations"></g></g></svg></div></div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="New Customers">
                                            New Customers</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">1.2k</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-danger me-1"><i class="ri-arrow-down-line"></i>
                                                5.47%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded fs-28">
                                            <iconify-icon icon="solar:user-bold-duotone"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><circle cx="12" cy="6" r="4" fill="currentColor"></circle><path fill="currentColor" d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" opacity=".5"></path></svg></template></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-customers" style="min-height: 45px;"><div id="apexchartsawbpplso" class="apexcharts-canvas apexchartsawbpplso apexcharts-theme-" style="width: 290px; height: 45px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="290" height="45"><foreignobject x="0" y="0" width="290" height="45"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 22.5px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apexcharts-legend-group-horizontal {
        flex-direction: column;
      }
      .apexcharts-legend-group {
        display: flex;
      }
      .apexcharts-legend-group-vertical {
        flex-direction: column-reverse;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
        align-items: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
        align-items: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
        align-items: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }

    </style></foreignobject><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0.5)"><defs><clippath id="gridRectMaskawbpplso"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectBarMaskawbpplso"><rect width="295" height="49" x="-2.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectMarkerMaskawbpplso"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMaskawbpplso"></clippath><clippath id="nonForecastMaskawbpplso"></clippath><lineargradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1002"><stop stop-opacity="0.5" stop-color="rgba(243,98,112,0.5)" offset="0"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="0.9"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="1"></stop></lineargradient></defs><line x1="0" y1="0" x2="0" y2="44" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="44" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g class="apexcharts-grid"><g class="apexcharts-gridlines-horizontal" style="display: none;"><line x1="0" y1="0" x2="290" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="44" x2="290" y2="44" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g class="apexcharts-gridlines-vertical" style="display: none;"></g><line x1="0" y1="44" x2="290" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line x1="0" y1="1" x2="0" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g class="apexcharts-grid-borders" style="display: none;"></g><g class="apexcharts-area-series apexcharts-plot-series"><g class="apexcharts-series" zIndex="0" seriesName="Investments" data:longestSeries="true" rel="1" data:realIndex="0"><path d="M 0 29.333333333333332C 14.5 29.333333333333332 26.92857142857143 14.666666666666664 41.42857142857143 14.666666666666664C 55.92857142857143 14.666666666666664 68.35714285714286 25.666666666666664 82.85714285714286 25.666666666666664C 97.35714285714286 25.666666666666664 109.78571428571429 7.333333333333329 124.28571428571429 7.333333333333329C 138.78571428571428 7.333333333333329 151.21428571428572 18.333333333333332 165.71428571428572 18.333333333333332C 180.21428571428572 18.333333333333332 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 11 248.57142857142858 11C 263.07142857142856 11 275.5 22 290 22C 290 22 290 22 290 44 L 0 44z" fill="url(#SvgjsLinearGradient1002)" fill-opacity="1" stroke="none" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskawbpplso)" pathTo="M 0 29.333333333333332C 14.5 29.333333333333332 26.92857142857143 14.666666666666664 41.42857142857143 14.666666666666664C 55.92857142857143 14.666666666666664 68.35714285714286 25.666666666666664 82.85714285714286 25.666666666666664C 97.35714285714286 25.666666666666664 109.78571428571429 7.333333333333329 124.28571428571429 7.333333333333329C 138.78571428571428 7.333333333333329 151.21428571428572 18.333333333333332 165.71428571428572 18.333333333333332C 180.21428571428572 18.333333333333332 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 11 248.57142857142858 11C 263.07142857142856 11 275.5 22 290 22C 290 22 290 22 290 44 L 0 44z" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44z"></path><path d="M 0 29.333333333333332C 14.5 29.333333333333332 26.92857142857143 14.666666666666664 41.42857142857143 14.666666666666664C 55.92857142857143 14.666666666666664 68.35714285714286 25.666666666666664 82.85714285714286 25.666666666666664C 97.35714285714286 25.666666666666664 109.78571428571429 7.333333333333329 124.28571428571429 7.333333333333329C 138.78571428571428 7.333333333333329 151.21428571428572 18.333333333333332 165.71428571428572 18.333333333333332C 180.21428571428572 18.333333333333332 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 11 248.57142857142858 11C 263.07142857142856 11 275.5 22 290 22" fill="none" fill-opacity="1" stroke="#f36270" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskawbpplso)" pathTo="M 0 29.333333333333332C 14.5 29.333333333333332 26.92857142857143 14.666666666666664 41.42857142857143 14.666666666666664C 55.92857142857143 14.666666666666664 68.35714285714286 25.666666666666664 82.85714285714286 25.666666666666664C 97.35714285714286 25.666666666666664 109.78571428571429 7.333333333333329 124.28571428571429 7.333333333333329C 138.78571428571428 7.333333333333329 151.21428571428572 18.333333333333332 165.71428571428572 18.333333333333332C 180.21428571428572 18.333333333333332 192.64285714285714 33 207.14285714285714 33C 221.64285714285714 33 234.07142857142858 11 248.57142857142858 11C 263.07142857142856 11 275.5 22 290 22" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44" fill-rule="evenodd"></path><g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"></g></g><g class="apexcharts-datalabels" data:realIndex="0"></g></g><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g class="apexcharts-xaxis" transform="translate(0, 0)"><g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g class="apexcharts-yaxis-annotations"></g><g class="apexcharts-xaxis-annotations"></g><g class="apexcharts-point-annotations"></g></g></svg></div></div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Profit Margin">
                                            Profit Margin</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">38.5%</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-1"><i class="ri-arrow-up-line"></i>
                                                8.21%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-28">
                                            <iconify-icon icon="solar:graph-up-bold-duotone"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M2 12c0-4.714 0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464C22 4.93 22 7.286 22 12s0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12" opacity=".5"></path><path fill="currentColor" d="M14.5 10.75a.75.75 0 0 1 0-1.5H17a.75.75 0 0 1 .75.75v2.5a.75.75 0 0 1-1.5 0v-.69l-2.013 2.013a1.75 1.75 0 0 1-2.474 0l-1.586-1.586a.25.25 0 0 0-.354 0L7.53 14.53a.75.75 0 0 1-1.06-1.06l2.293-2.293a1.75 1.75 0 0 1 2.474 0l1.586 1.586a.25.25 0 0 0 .354 0l2.012-2.013z"></path></svg></template></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-profit" style="min-height: 45px;"><div id="apexchartsknidz2cg" class="apexcharts-canvas apexchartsknidz2cg apexcharts-theme-" style="width: 290px; height: 45px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="290" height="45"><foreignobject x="0" y="0" width="290" height="45"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 22.5px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apexcharts-legend-group-horizontal {
        flex-direction: column;
      }
      .apexcharts-legend-group {
        display: flex;
      }
      .apexcharts-legend-group-vertical {
        flex-direction: column-reverse;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
        align-items: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
        align-items: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
        align-items: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }

    </style></foreignobject><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0.5)"><defs><clippath id="gridRectMaskknidz2cg"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectBarMaskknidz2cg"><rect width="295" height="49" x="-2.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectMarkerMaskknidz2cg"><rect width="290" height="44" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMaskknidz2cg"></clippath><clippath id="nonForecastMaskknidz2cg"></clippath><lineargradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1003"><stop stop-opacity="0.5" stop-color="rgba(249,188,11,0.5)" offset="0"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="0.9"></stop><stop stop-opacity="0.1" stop-color="rgba(255,255,255,0.1)" offset="1"></stop></lineargradient></defs><line x1="0" y1="0" x2="0" y2="44" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="44" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g class="apexcharts-grid"><g class="apexcharts-gridlines-horizontal" style="display: none;"><line x1="0" y1="0" x2="290" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="22" x2="290" y2="22" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="44" x2="290" y2="44" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g class="apexcharts-gridlines-vertical" style="display: none;"></g><line x1="0" y1="44" x2="290" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line x1="0" y1="1" x2="0" y2="44" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g class="apexcharts-grid-borders" style="display: none;"></g><g class="apexcharts-area-series apexcharts-plot-series"><g class="apexcharts-series" zIndex="0" seriesName="Savings" data:longestSeries="true" rel="1" data:realIndex="0"><path d="M 0 26.400000000000002C 14.5 26.400000000000002 26.92857142857143 13.200000000000003 41.42857142857143 13.200000000000003C 55.92857142857143 13.200000000000003 68.35714285714286 22.000000000000004 82.85714285714286 22.000000000000004C 97.35714285714286 22.000000000000004 109.78571428571429 4.400000000000006 124.28571428571429 4.400000000000006C 138.78571428571428 4.400000000000006 151.21428571428572 17.6 165.71428571428572 17.6C 180.21428571428572 17.6 192.64285714285714 28.6 207.14285714285714 28.6C 221.64285714285714 28.6 234.07142857142858 8.800000000000004 248.57142857142858 8.800000000000004C 263.07142857142856 8.800000000000004 275.5 15.400000000000002 290 15.400000000000002C 290 15.400000000000002 290 15.400000000000002 290 44 L 0 44z" fill="url(#SvgjsLinearGradient1003)" fill-opacity="1" stroke="none" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskknidz2cg)" pathTo="M 0 26.400000000000002C 14.5 26.400000000000002 26.92857142857143 13.200000000000003 41.42857142857143 13.200000000000003C 55.92857142857143 13.200000000000003 68.35714285714286 22.000000000000004 82.85714285714286 22.000000000000004C 97.35714285714286 22.000000000000004 109.78571428571429 4.400000000000006 124.28571428571429 4.400000000000006C 138.78571428571428 4.400000000000006 151.21428571428572 17.6 165.71428571428572 17.6C 180.21428571428572 17.6 192.64285714285714 28.6 207.14285714285714 28.6C 221.64285714285714 28.6 234.07142857142858 8.800000000000004 248.57142857142858 8.800000000000004C 263.07142857142856 8.800000000000004 275.5 15.400000000000002 290 15.400000000000002C 290 15.400000000000002 290 15.400000000000002 290 44 L 0 44z" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44z"></path><path d="M 0 26.400000000000002C 14.5 26.400000000000002 26.92857142857143 13.200000000000003 41.42857142857143 13.200000000000003C 55.92857142857143 13.200000000000003 68.35714285714286 22.000000000000004 82.85714285714286 22.000000000000004C 97.35714285714286 22.000000000000004 109.78571428571429 4.400000000000006 124.28571428571429 4.400000000000006C 138.78571428571428 4.400000000000006 151.21428571428572 17.6 165.71428571428572 17.6C 180.21428571428572 17.6 192.64285714285714 28.6 207.14285714285714 28.6C 221.64285714285714 28.6 234.07142857142858 8.800000000000004 248.57142857142858 8.800000000000004C 263.07142857142856 8.800000000000004 275.5 15.400000000000002 290 15.400000000000002" fill="none" fill-opacity="1" stroke="#f9bc0b" stroke-opacity="1" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskknidz2cg)" pathTo="M 0 26.400000000000002C 14.5 26.400000000000002 26.92857142857143 13.200000000000003 41.42857142857143 13.200000000000003C 55.92857142857143 13.200000000000003 68.35714285714286 22.000000000000004 82.85714285714286 22.000000000000004C 97.35714285714286 22.000000000000004 109.78571428571429 4.400000000000006 124.28571428571429 4.400000000000006C 138.78571428571428 4.400000000000006 151.21428571428572 17.6 165.71428571428572 17.6C 180.21428571428572 17.6 192.64285714285714 28.6 207.14285714285714 28.6C 221.64285714285714 28.6 234.07142857142858 8.800000000000004 248.57142857142858 8.800000000000004C 263.07142857142856 8.800000000000004 275.5 15.400000000000002 290 15.400000000000002" pathFrom="M 0 44 L 0 44 L 41.42857142857143 44 L 82.85714285714286 44 L 124.28571428571429 44 L 165.71428571428572 44 L 207.14285714285714 44 L 248.57142857142858 44 L 290 44" fill-rule="evenodd"></path><g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"></g></g><g class="apexcharts-datalabels" data:realIndex="0"></g></g><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line x1="0" y1="0" x2="290" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g class="apexcharts-xaxis" transform="translate(0, 0)"><g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g class="apexcharts-yaxis-annotations"></g><g class="apexcharts-xaxis-annotations"></g><g class="apexcharts-point-annotations"></g></g></svg></div></div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="d-flex card-header justify-content-between align-items-center">
                                <div>
                                    <h4 class="header-title">Statistics</h4>
                                </div>
                                <div class="dropdown">
                                    <a href="index.html#" class="dropdown-toggle drop-arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill fs-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-0 pt-0">
                                <div class="bg-light bg-opacity-50">
                                    <div class="row text-center">
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Monthly Income</p>
                                            <h4 class="mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-down-left" class="lucide lucide-arrow-down-left text-success me-1"><path d="M17 7 7 17"></path><path d="M17 17H7V7"></path></svg>
                                                <span>$35,200</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Monthly Expenses</p>
                                            <h4 class="mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-up-right" class="lucide lucide-arrow-up-right text-danger me-1"><path d="M7 7h10v10"></path><path d="M7 17 17 7"></path></svg>
                                                <span>$18,900</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Invested Capital</p>
                                            <h4 class="mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="bar-chart" class="lucide lucide-bar-chart me-1"><line x1="12" x2="12" y1="20" y2="10"></line><line x1="18" x2="18" y1="20" y2="4"></line><line x1="6" x2="6" y1="20" y2="16"></line></svg>
                                                <span>$5,200</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Available Savings</p>
                                            <h4 class="mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="landmark" class="lucide lucide-landmark me-1"><line x1="3" x2="21" y1="22" y2="22"></line><line x1="6" x2="6" y1="18" y2="11"></line><line x1="10" x2="10" y1="18" y2="11"></line><line x1="14" x2="14" y1="18" y2="11"></line><line x1="18" x2="18" y1="18" y2="11"></line><polygon points="12 2 20 7 4 7"></polygon></svg>
                                                <span>$8,100</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div dir="ltr" class="px-1 mt-2">
                                    <div id="revenue-chart" class="apex-charts" data-colors="#02c0ce,#777edd" style="min-height: 315px;"><div id="apexchartswuz129kqh" class="apexcharts-canvas apexchartswuz129kqh apexcharts-theme-" style="width: 696px; height: 300px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="696" height="300"><foreignobject x="0" y="0" width="696" height="300"><div class="apexcharts-legend apexcharts-align-center apx-legend-position-top" xmlns="http://www.w3.org/1999/xhtml" style="right: 0px; position: absolute; left: 0px; top: 4px; max-height: 150px;"><div class="apexcharts-legend-series" rel="1" seriesname="ConversionxRate" data:collapsed="false" style="margin: 4px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%"><path d="M 0, 0 
           m -7, 0 
           a 7,7 0 1,0 14,0 
           a 7,7 0 1,0 -14,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" cx="0" cy="0" shape="circle" class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle" style="transform: translate(50%, 50%);"></path></svg></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Conversion%20Rate" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Conversion Rate</span></div><div class="apexcharts-legend-series" rel="2" seriesname="AveragexSalexValue" data:collapsed="false" style="margin: 4px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="height: 16px; width: 16px; left: 0px; top: 0px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%"><path d="M 0, 0 
           m -7, 0 
           a 7,7 0 1,0 14,0 
           a 7,7 0 1,0 -14,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="1" stroke-dasharray="0" cx="0" cy="0" shape="circle" class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle" style="transform: translate(50%, 50%);"></path></svg></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Average%20Sale%20Value" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Average Sale Value</span></div></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apexcharts-legend-group-horizontal {
        flex-direction: column;
      }
      .apexcharts-legend-group {
        display: flex;
      }
      .apexcharts-legend-group-vertical {
        flex-direction: column-reverse;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
        align-items: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
        align-items: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
        align-items: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }

    </style></foreignobject><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-yaxis" rel="0" transform="translate(21.475000381469727, 0)"><g class="apexcharts-yaxis-texts-g"><text x="20" y="59.666666666666664" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>100</tspan><title>100</title></text><text x="20" y="110.44466666666666" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>50</tspan><title>50</title></text><text x="20" y="161.22266666666667" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>0</tspan><title>0</title></text><text x="20" y="212.00066666666666" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>-50</tspan><title>-50</title></text><text x="20" y="262.77866666666665" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>-100</tspan><title>-100</title></text></g></g><g class="apexcharts-inner apexcharts-graphical" transform="translate(51.47500038146973, 56)"><defs><clippath id="gridRectMaskwuz129kqh"><rect width="611.6465511322021" height="203.112" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectBarMaskwuz129kqh"><rect width="619.6465511322021" height="211.112" x="-4" y="-4" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectMarkerMaskwuz129kqh"><rect width="633.6465511322021" height="225.112" x="-11" y="-11" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMaskwuz129kqh"></clippath><clippath id="nonForecastMaskwuz129kqh"></clippath></defs><line x1="0" y1="0" x2="0" y2="203.112" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="203.112" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><line x1="0" y1="203.112" x2="0" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="67.96072790357802" y1="203.112" x2="67.96072790357802" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="135.92145580715604" y1="203.112" x2="135.92145580715604" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="203.88218371073407" y1="203.112" x2="203.88218371073407" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="271.8429116143121" y1="203.112" x2="271.8429116143121" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="339.8036395178901" y1="203.112" x2="339.8036395178901" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="407.7643674214681" y1="203.112" x2="407.7643674214681" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="475.7250953250461" y1="203.112" x2="475.7250953250461" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="543.6858232286241" y1="203.112" x2="543.6858232286241" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="611.6465511322021" y1="203.112" x2="611.6465511322021" y2="209.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g class="apexcharts-grid"><g class="apexcharts-gridlines-horizontal"><line x1="0" y1="50.778" x2="611.6465511322021" y2="50.778" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="101.556" x2="611.6465511322021" y2="101.556" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="152.334" x2="611.6465511322021" y2="152.334" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g class="apexcharts-gridlines-vertical"></g><line x1="0" y1="203.112" x2="611.6465511322021" y2="203.112" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line x1="0" y1="1" x2="0" y2="203.112" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g class="apexcharts-grid-borders"><line x1="0" y1="0" x2="611.6465511322021" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="203.112" x2="611.6465511322021" y2="203.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="203.112" x2="611.6465511322021" y2="203.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g class="apexcharts-line-series apexcharts-plot-series"><g class="apexcharts-series" zIndex="0" seriesName="ConversionxRate" data:longestSeries="true" rel="1" data:realIndex="0"><path d="M0 55.8558C23.786254766252306 55.8558 44.17447313732571 40.6224 67.96072790357802 40.6224C91.74698266983032 40.6224 112.13520104090372 121.8672 135.92145580715604 121.8672C159.70771057340835 121.8672 180.09592894448176 40.6224 203.88218371073407 40.6224C227.66843847698635 40.6224 248.0566568480598 101.556 271.8429116143121 101.556C295.62916638056436 101.556 316.0173847516378 55.8558 339.8036395178901 55.8558C363.5898942841424 55.8558 383.9781126552158 182.80079999999998 407.76436742146814 182.80079999999998C431.5506221877204 182.80079999999998 451.93884055879386 35.5446 475.72509532504614 35.5446C499.5113500912984 35.5446 519.8995684623718 132.0228 543.6858232286241 132.0228C567.4720779948765 132.0228 587.8602963659498 42.65352 611.6465511322021 42.65352C611.6465511322021 42.65352 611.6465511322021 42.65352 611.6465511322021 42.65352 " fill="none" fill-opacity="1" stroke="rgba(2,192,206,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="4" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskwuz129kqh)" pathTo="M 0 55.8558C 23.786254766252306 55.8558 44.17447313732571 40.6224 67.96072790357802 40.6224C 91.74698266983032 40.6224 112.13520104090372 121.8672 135.92145580715604 121.8672C 159.70771057340835 121.8672 180.09592894448176 40.6224 203.88218371073407 40.6224C 227.66843847698635 40.6224 248.0566568480598 101.556 271.8429116143121 101.556C 295.62916638056436 101.556 316.0173847516378 55.8558 339.8036395178901 55.8558C 363.5898942841424 55.8558 383.9781126552158 182.80079999999998 407.76436742146814 182.80079999999998C 431.5506221877204 182.80079999999998 451.93884055879386 35.5446 475.72509532504614 35.5446C 499.5113500912984 35.5446 519.8995684623718 132.0228 543.6858232286241 132.0228C 567.4720779948765 132.0228 587.8602963659498 42.65352 611.6465511322021 42.65352" pathFrom="M 0 101.556 L 0 101.556 L 67.96072790357802 101.556 L 135.92145580715604 101.556 L 203.88218371073407 101.556 L 271.8429116143121 101.556 L 339.8036395178901 101.556 L 407.76436742146814 101.556 L 475.72509532504614 101.556 L 543.6858232286241 101.556 L 611.6465511322021 101.556" fill-rule="evenodd"></path><g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 0, 55.8558 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="0" cy="55.8558" shape="circle" class="apexcharts-marker no-pointer-events wxyj29m2pl" rel="0" j="0" index="0" default-marker-size="5"></path><path d="M 67.96072790357802, 40.6224 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="67.96072790357802" cy="40.6224" shape="circle" class="apexcharts-marker no-pointer-events w15mwg76r" rel="1" j="1" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 135.92145580715604, 121.8672 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="135.92145580715604" cy="121.8672" shape="circle" class="apexcharts-marker no-pointer-events w5r4g5tmd" rel="2" j="2" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 203.88218371073407, 40.6224 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="203.88218371073407" cy="40.6224" shape="circle" class="apexcharts-marker no-pointer-events wvneedzu7k" rel="3" j="3" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 271.8429116143121, 101.556 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="271.8429116143121" cy="101.556" shape="circle" class="apexcharts-marker no-pointer-events wy646eivo" rel="4" j="4" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 339.8036395178901, 55.8558 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="339.8036395178901" cy="55.8558" shape="circle" class="apexcharts-marker no-pointer-events wi4zpdg2j" rel="5" j="5" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 407.76436742146814, 182.80079999999998 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="407.76436742146814" cy="182.80079999999998" shape="circle" class="apexcharts-marker no-pointer-events wtrbx9sc3" rel="6" j="6" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 475.72509532504614, 35.5446 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="475.72509532504614" cy="35.5446" shape="circle" class="apexcharts-marker no-pointer-events w3azf0l8tl" rel="7" j="7" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 543.6858232286241, 132.0228 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="543.6858232286241" cy="132.0228" shape="circle" class="apexcharts-marker no-pointer-events wcceiy1fu" rel="8" j="8" index="0" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 611.6465511322021, 42.65352 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#02c0ce" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="611.6465511322021" cy="42.65352" shape="circle" class="apexcharts-marker no-pointer-events w96gh3vhk" rel="9" j="9" index="0" default-marker-size="5"></path></g></g></g><g class="apexcharts-series" zIndex="1" seriesName="AveragexSalexValue" data:longestSeries="true" rel="2" data:realIndex="1"><path d="M0 182.80079999999998C23.786254766252306 182.80079999999998 44.17447313732571 40.6224 67.96072790357802 40.6224C91.74698266983032 40.6224 112.13520104090372 20.3112 135.92145580715604 20.3112C159.70771057340835 20.3112 180.09592894448176 142.1784 203.88218371073407 142.1784C227.66843847698635 142.1784 248.0566568480598 86.3226 271.8429116143121 86.3226C295.62916638056436 86.3226 316.0173847516378 40.6224 339.8036395178901 40.6224C363.5898942841424 40.6224 383.9781126552158 142.1784 407.76436742146814 142.1784C431.5506221877204 142.1784 451.93884055879386 20.3112 475.72509532504614 20.3112C499.5113500912984 20.3112 519.8995684623718 152.334 543.6858232286241 152.334C567.4720779948765 152.334 587.8602963659498 99.52488 611.6465511322021 99.52488C611.6465511322021 99.52488 611.6465511322021 99.52488 611.6465511322021 99.52488 " fill="none" fill-opacity="1" stroke="rgba(119,126,221,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="4" stroke-dasharray="8" class="apexcharts-line" index="1" clip-path="url(#gridRectMaskwuz129kqh)" pathTo="M 0 182.80079999999998C 23.786254766252306 182.80079999999998 44.17447313732571 40.6224 67.96072790357802 40.6224C 91.74698266983032 40.6224 112.13520104090372 20.3112 135.92145580715604 20.3112C 159.70771057340835 20.3112 180.09592894448176 142.1784 203.88218371073407 142.1784C 227.66843847698635 142.1784 248.0566568480598 86.3226 271.8429116143121 86.3226C 295.62916638056436 86.3226 316.0173847516378 40.6224 339.8036395178901 40.6224C 363.5898942841424 40.6224 383.9781126552158 142.1784 407.76436742146814 142.1784C 431.5506221877204 142.1784 451.93884055879386 20.3112 475.72509532504614 20.3112C 499.5113500912984 20.3112 519.8995684623718 152.334 543.6858232286241 152.334C 567.4720779948765 152.334 587.8602963659498 99.52488 611.6465511322021 99.52488" pathFrom="M 0 101.556 L 0 101.556 L 67.96072790357802 101.556 L 135.92145580715604 101.556 L 203.88218371073407 101.556 L 271.8429116143121 101.556 L 339.8036395178901 101.556 L 407.76436742146814 101.556 L 475.72509532504614 101.556 L 543.6858232286241 101.556 L 611.6465511322021 101.556" fill-rule="evenodd"></path><g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="1"><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 0, 182.80079999999998 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="0" cy="182.80079999999998" shape="circle" class="apexcharts-marker no-pointer-events wfgvaraiu" rel="0" j="0" index="1" default-marker-size="5"></path><path d="M 67.96072790357802, 40.6224 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="67.96072790357802" cy="40.6224" shape="circle" class="apexcharts-marker no-pointer-events wn3bd6q28" rel="1" j="1" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 135.92145580715604, 20.3112 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="135.92145580715604" cy="20.3112" shape="circle" class="apexcharts-marker no-pointer-events wjbs2vo2r" rel="2" j="2" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 203.88218371073407, 142.1784 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="203.88218371073407" cy="142.1784" shape="circle" class="apexcharts-marker no-pointer-events w0wbxcquw" rel="3" j="3" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 271.8429116143121, 86.3226 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="271.8429116143121" cy="86.3226" shape="circle" class="apexcharts-marker no-pointer-events w9qp3vryi" rel="4" j="4" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 339.8036395178901, 40.6224 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="339.8036395178901" cy="40.6224" shape="circle" class="apexcharts-marker no-pointer-events wxu2mgelbl" rel="5" j="5" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 407.76436742146814, 142.1784 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="407.76436742146814" cy="142.1784" shape="circle" class="apexcharts-marker no-pointer-events w314gpzqbg" rel="6" j="6" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 475.72509532504614, 20.3112 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="475.72509532504614" cy="20.3112" shape="circle" class="apexcharts-marker no-pointer-events wi0xt1qowk" rel="7" j="7" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 543.6858232286241, 152.334 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="543.6858232286241" cy="152.334" shape="circle" class="apexcharts-marker no-pointer-events wei6naizf" rel="8" j="8" index="1" default-marker-size="5"></path></g><g class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskwuz129kqh)"><path d="M 611.6465511322021, 99.52488 
           m -5, 0 
           a 5,5 0 1,0 10,0 
           a 5,5 0 1,0 -10,0" fill="#777edd" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" cx="611.6465511322021" cy="99.52488" shape="circle" class="apexcharts-marker no-pointer-events wf9e35ory" rel="9" j="9" index="1" default-marker-size="5"></path></g></g></g><g class="apexcharts-datalabels" data:realIndex="0"></g><g class="apexcharts-datalabels" data:realIndex="1"></g></g><line x1="0" y1="0" x2="611.6465511322021" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line x1="0" y1="0" x2="611.6465511322021" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g class="apexcharts-xaxis" transform="translate(0, 0)"><g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text x="0" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>January</tspan><title>January</title></text><text x="67.96072790357803" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>February</tspan><title>February</title></text><text x="135.92145580715606" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>March</tspan><title>March</title></text><text x="203.88218371073407" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>April</tspan><title>April</title></text><text x="271.8429116143121" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>May</tspan><title>May</title></text><text x="339.8036395178901" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>June</tspan><title>June</title></text><text x="407.7643674214681" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>July</tspan><title>July</title></text><text x="475.7250953250461" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>August</tspan><title>August</title></text><text x="543.685823228624" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>September</tspan><title>September</title></text><text x="611.646551132202" y="231.112" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>October</tspan><title>October</title></text></g></g><g class="apexcharts-yaxis-annotations apexcharts-hidden-element-shown"></g><g class="apexcharts-xaxis-annotations apexcharts-hidden-element-shown"></g><g class="apexcharts-point-annotations apexcharts-hidden-element-shown"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(2, 192, 206);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(119, 126, 221);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-5">
                        <div class="card">
                            <div class="d-flex card-header justify-content-between align-items-center">
                                <div>
                                    <h4 class="header-title">Total Revenue</h4>
                                </div>
                                <div class="dropdown">
                                    <a href="index.html#" class="dropdown-toggle drop-arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill fs-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-0 pt-0">
                                <div class="border-top border-bottom border-light border-dashed">
                                    <div class="row text-center align-items-center">
                                        <div class="col-md-4">
                                            <p class="text-muted mt-3 mb-1">Revenue</p>
                                            <h4 class="mb-3">
                                                <span class="ri-arrow-left-down-box-line text-success me-1"></span>
                                                <span>$29.5k</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-4 border-start border-light border-dashed">
                                            <p class="text-muted mt-3 mb-1">Expenses</p>
                                            <h4 class="mb-3">
                                                <span class="ri-arrow-left-up-box-line text-danger me-1"></span>
                                                <span>$15.07k</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-4 border-start border-end border-light border-dashed">
                                            <p class="text-muted mt-3 mb-1">Investment</p>
                                            <h4 class="mb-3">
                                                <span class="ri-bar-chart-line me-1"></span>
                                                <span>$3.6k</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div dir="ltr" class="px-2">
                                    <div id="statistics-chart" class="apex-charts" data-colors="#0acf97,#45bbe0" style="min-height: 325px;"><div id="apexchartsew0144j5" class="apexcharts-canvas apexchartsew0144j5 apexcharts-theme-" style="width: 475px; height: 310px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="475" height="310"><foreignobject x="0" y="0" width="475" height="310"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 155px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apexcharts-legend-group-horizontal {
        flex-direction: column;
      }
      .apexcharts-legend-group {
        display: flex;
      }
      .apexcharts-legend-group-vertical {
        flex-direction: column-reverse;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
        align-items: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
        align-items: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
        align-items: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }

    </style></foreignobject><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-yaxis" rel="0" transform="translate(32.60000228881836, 0)"><g class="apexcharts-yaxis-texts-g"><text x="20" y="33.666666666666664" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>120.00</tspan><title>120.00</title></text><text x="20" y="73.51866666666666" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>100.00</tspan><title>100.00</title></text><text x="20" y="113.37066666666666" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>80.00</tspan><title>80.00</title></text><text x="20" y="153.22266666666667" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>60.00</tspan><title>60.00</title></text><text x="20" y="193.07466666666667" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>40.00</tspan><title>40.00</title></text><text x="20" y="232.92666666666668" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>20.00</tspan><title>20.00</title></text><text x="20" y="272.77866666666665" text-anchor="end" dominant-baseline="auto" font-size="11px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>0.00</tspan><title>0.00</title></text></g></g><g class="apexcharts-inner apexcharts-graphical" transform="translate(83.92487519004129, 30)"><defs><clippath id="gridRectMaskew0144j5"><rect width="348.30625738664105" height="239.11199999999997" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectBarMaskew0144j5"><rect width="394.9560031890869" height="243.11199999999997" x="-23.324872901222925" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="gridRectMarkerMaskew0144j5"><rect width="348.30625738664105" height="239.11199999999997" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMaskew0144j5"></clippath><clippath id="nonForecastMaskew0144j5"></clippath><filter id="SvgjsFilter1005" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><fecolormatrix id="SvgjsFeColorMatrix1004" result="brightness" in="SourceGraphic" type="matrix" values="
          2 0 0 0 0
          0 2 0 0 0
          0 0 2 0 0
          0 0 0 1 0
        "></fecolormatrix></filter><filter id="SvgjsFilter1007" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><fecolormatrix id="SvgjsFeColorMatrix1006" result="brightness" in="SourceGraphic" type="matrix" values="
          2 0 0 0 0
          0 2 0 0 0
          0 0 2 0 0
          0 0 0 1 0
        "></fecolormatrix></filter></defs><line x1="31.16420521696737" y1="0" x2="31.16420521696737" y2="239.11199999999997" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="31.16420521696737" y="0" width="1" height="239.11199999999997" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><line x1="0" y1="239.11199999999997" x2="0" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="31.664205216967368" y1="239.11199999999997" x2="31.664205216967368" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="63.328410433934735" y1="239.11199999999997" x2="63.328410433934735" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="94.99261565090211" y1="239.11199999999997" x2="94.99261565090211" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="126.65682086786947" y1="239.11199999999997" x2="126.65682086786947" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="158.32102608483683" y1="239.11199999999997" x2="158.32102608483683" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="189.9852313018042" y1="239.11199999999997" x2="189.9852313018042" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="221.64943651877155" y1="239.11199999999997" x2="221.64943651877155" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="253.3136417357389" y1="239.11199999999997" x2="253.3136417357389" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="284.9778469527063" y1="239.11199999999997" x2="284.9778469527063" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="316.64205216967366" y1="239.11199999999997" x2="316.64205216967366" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line x1="348.30625738664105" y1="239.11199999999997" x2="348.30625738664105" y2="245.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><g class="apexcharts-grid"><g class="apexcharts-gridlines-horizontal"><line x1="-21.324872901222925" y1="39.852" x2="369.631130287864" y2="39.852" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="-21.324872901222925" y1="79.704" x2="369.631130287864" y2="79.704" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="-21.324872901222925" y1="119.55599999999998" x2="369.631130287864" y2="119.55599999999998" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="-21.324872901222925" y1="159.408" x2="369.631130287864" y2="159.408" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="-21.324872901222925" y1="199.26" x2="369.631130287864" y2="199.26" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="-21.324872901222925" y1="239.112" x2="369.631130287864" y2="239.112" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g class="apexcharts-gridlines-vertical"></g><line x1="0" y1="239.11199999999997" x2="348.30625738664105" y2="239.11199999999997" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line x1="0" y1="1" x2="0" y2="239.11199999999997" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g class="apexcharts-grid-borders"><line x1="-21.324872901222925" y1="0" x2="369.631130287864" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="-21.324872901222925" y1="239.11199999999997" x2="369.63113028786404" y2="239.11199999999997" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g class="apexcharts-bar-series apexcharts-plot-series"><g class="apexcharts-series" rel="1" seriesName="OpenxCampaign" data:realIndex="0"><path d="M-9.499261565090212 239.11299999999997L-9.499261565090212 66.27345C-9.499261565090212 63.77345 -6.999261565090212 61.27345 -4.499261565090212 61.27345L4.499261565090212 61.27345C6.999261565090212 61.27345 9.499261565090212 63.77345 9.499261565090212 66.27345L9.499261565090212 239.11299999999997L-9.499261565090212 239.11299999999997C-9.499261565090212 239.11299999999997 -9.499261565090212 239.11299999999997 -9.499261565090212 239.11299999999997C-9.499261565090212 239.11299999999997 -9.499261565090212 239.11299999999997 -9.499261565090212 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M -9.499261565090212 239.11299999999997 L -9.499261565090212 66.27345 C -9.499261565090212 63.77345 -6.999261565090212 61.27344999999999 -4.499261565090212 61.27344999999999 L 4.499261565090212 61.27344999999999 C 6.999261565090212 61.27344999999999 9.499261565090212 63.77345 9.499261565090212 66.27345 L 9.499261565090212 239.11299999999997 z " pathFrom="M -9.499261565090212 239.11299999999997 L -9.499261565090212 239.11299999999997 L 9.499261565090212 239.11299999999997 L 9.499261565090212 239.11299999999997 L 9.499261565090212 239.11299999999997 L 9.499261565090212 239.11299999999997 L 9.499261565090212 239.11299999999997 L -9.499261565090212 239.11299999999997 z" cy="61.27244999999999" cx="9.499261565090212" j="0" val="89.25" barHeight="177.83954999999997" barWidth="18.998523130180423"></path><path d="M22.16494365187716 239.11299999999997L22.16494365187716 47.682492000000025C22.16494365187716 45.182492000000025 24.66494365187716 42.682492000000025 27.16494365187716 42.682492000000025L36.16346678205758 42.682492000000025C38.66346678205758 42.682492000000025 41.16346678205758 45.182492000000025 41.16346678205758 47.682492000000025L41.16346678205758 239.11299999999997L22.16494365187716 239.11299999999997C22.16494365187716 239.11299999999997 22.16494365187716 239.11299999999997 22.16494365187716 239.11299999999997C22.16494365187716 239.11299999999997 22.16494365187716 239.11299999999997 22.16494365187716 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 22.16494365187716 239.11299999999997 L 22.16494365187716 47.68249200000002 C 22.16494365187716 45.18249200000002 24.66494365187716 42.68249200000002 27.16494365187716 42.68249200000002 L 36.16346678205758 42.68249200000002 C 38.66346678205758 42.68249200000002 41.16346678205758 45.18249200000002 41.16346678205758 47.68249200000002 L 41.16346678205758 239.11299999999997 z " pathFrom="M 22.16494365187716 239.11299999999997 L 22.16494365187716 239.11299999999997 L 41.16346678205758 239.11299999999997 L 41.16346678205758 239.11299999999997 L 41.16346678205758 239.11299999999997 L 41.16346678205758 239.11299999999997 L 41.16346678205758 239.11299999999997 L 22.16494365187716 239.11299999999997 z" cy="42.68149200000002" cx="41.16346678205758" j="1" val="98.58" barHeight="196.43050799999995" barWidth="18.998523130180423"></path><path d="M53.82914886884453 239.11299999999997L53.82914886884453 107.14167600000002C53.82914886884453 104.64167600000002 56.32914886884453 102.14167600000002 58.82914886884453 102.14167600000002L67.82767199902494 102.14167600000002C70.32767199902494 102.14167600000002 72.82767199902494 104.64167600000002 72.82767199902494 107.14167600000002L72.82767199902494 239.11299999999997L53.82914886884453 239.11299999999997C53.82914886884453 239.11299999999997 53.82914886884453 239.11299999999997 53.82914886884453 239.11299999999997C53.82914886884453 239.11299999999997 53.82914886884453 239.11299999999997 53.82914886884453 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 53.82914886884453 239.11299999999997 L 53.82914886884453 107.14167600000002 C 53.82914886884453 104.64167600000002 56.32914886884453 102.14167600000002 58.82914886884453 102.14167600000002 L 67.82767199902494 102.14167600000002 C 70.32767199902494 102.14167600000002 72.82767199902494 104.64167600000002 72.82767199902494 107.14167600000002 L 72.82767199902494 239.11299999999997 z " pathFrom="M 53.82914886884453 239.11299999999997 L 53.82914886884453 239.11299999999997 L 72.82767199902494 239.11299999999997 L 72.82767199902494 239.11299999999997 L 72.82767199902494 239.11299999999997 L 72.82767199902494 239.11299999999997 L 72.82767199902494 239.11299999999997 L 53.82914886884453 239.11299999999997 z" cy="102.14067600000001" cx="72.82767199902494" j="2" val="68.74" barHeight="136.97132399999995" barWidth="18.998523130180423"></path><path d="M85.4933540858119 239.11299999999997L85.4933540858119 27.178638000000007C85.4933540858119 24.678638000000007 87.9933540858119 22.178638000000007 90.4933540858119 22.178638000000007L99.49187721599233 22.178638000000007C101.99187721599233 22.178638000000007 104.49187721599233 24.678638000000007 104.49187721599233 27.178638000000007L104.49187721599233 239.11299999999997L85.4933540858119 239.11299999999997C85.4933540858119 239.11299999999997 85.4933540858119 239.11299999999997 85.4933540858119 239.11299999999997C85.4933540858119 239.11299999999997 85.4933540858119 239.11299999999997 85.4933540858119 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 85.4933540858119 239.11299999999997 L 85.4933540858119 27.178638000000003 C 85.4933540858119 24.678638000000003 87.9933540858119 22.178638000000003 90.4933540858119 22.178638000000003 L 99.49187721599233 22.178638000000003 C 101.99187721599233 22.178638000000003 104.49187721599233 24.678638000000003 104.49187721599233 27.178638000000003 L 104.49187721599233 239.11299999999997 z " pathFrom="M 85.4933540858119 239.11299999999997 L 85.4933540858119 239.11299999999997 L 104.49187721599233 239.11299999999997 L 104.49187721599233 239.11299999999997 L 104.49187721599233 239.11299999999997 L 104.49187721599233 239.11299999999997 L 104.49187721599233 239.11299999999997 L 85.4933540858119 239.11299999999997 z" cy="22.177638" cx="104.49187721599233" j="3" val="108.87" barHeight="216.93436199999996" barWidth="18.998523130180423"></path><path d="M117.15755930277928 239.11299999999997L117.15755930277928 89.606796C117.15755930277928 87.106796 119.65755930277928 84.606796 122.15755930277928 84.606796L131.1560824329597 84.606796C133.6560824329597 84.606796 136.1560824329597 87.106796 136.1560824329597 89.606796L136.1560824329597 239.11299999999997L117.15755930277928 239.11299999999997C117.15755930277928 239.11299999999997 117.15755930277928 239.11299999999997 117.15755930277928 239.11299999999997C117.15755930277928 239.11299999999997 117.15755930277928 239.11299999999997 117.15755930277928 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 117.15755930277928 239.11299999999997 L 117.15755930277928 89.606796 C 117.15755930277928 87.106796 119.65755930277928 84.606796 122.15755930277928 84.606796 L 131.1560824329597 84.606796 C 133.6560824329597 84.606796 136.1560824329597 87.106796 136.1560824329597 89.606796 L 136.1560824329597 239.11299999999997 z " pathFrom="M 117.15755930277928 239.11299999999997 L 117.15755930277928 239.11299999999997 L 136.1560824329597 239.11299999999997 L 136.1560824329597 239.11299999999997 L 136.1560824329597 239.11299999999997 L 136.1560824329597 239.11299999999997 L 136.1560824329597 239.11299999999997 L 117.15755930277928 239.11299999999997 z" cy="84.605796" cx="136.1560824329597" j="4" val="77.54" barHeight="154.50620399999997" barWidth="18.998523130180423"></path><path d="M148.82176451974664 239.11299999999997L148.82176451974664 76.674822C148.82176451974664 74.174822 151.32176451974664 71.674822 153.82176451974664 71.674822L162.82028764992705 71.674822C165.32028764992705 71.674822 167.82028764992705 74.174822 167.82028764992705 76.674822L167.82028764992705 239.11299999999997L148.82176451974664 239.11299999999997C148.82176451974664 239.11299999999997 148.82176451974664 239.11299999999997 148.82176451974664 239.11299999999997C148.82176451974664 239.11299999999997 148.82176451974664 239.11299999999997 148.82176451974664 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 148.82176451974664 239.11299999999997 L 148.82176451974664 76.674822 C 148.82176451974664 74.174822 151.32176451974664 71.674822 153.82176451974664 71.674822 L 162.82028764992705 71.674822 C 165.32028764992705 71.674822 167.82028764992705 74.174822 167.82028764992705 76.674822 L 167.82028764992705 239.11299999999997 z " pathFrom="M 148.82176451974664 239.11299999999997 L 148.82176451974664 239.11299999999997 L 167.82028764992705 239.11299999999997 L 167.82028764992705 239.11299999999997 L 167.82028764992705 239.11299999999997 L 167.82028764992705 239.11299999999997 L 167.82028764992705 239.11299999999997 L 148.82176451974664 239.11299999999997 z" cy="71.673822" cx="167.82028764992705" j="5" val="84.03" barHeight="167.43817799999997" barWidth="18.998523130180423"></path><path d="M180.485969736714 239.11299999999997L180.485969736714 142.01217599999998C180.485969736714 139.51217599999998 182.985969736714 137.01217599999998 185.485969736714 137.01217599999998L194.4844928668944 137.01217599999998C196.9844928668944 137.01217599999998 199.4844928668944 139.51217599999998 199.4844928668944 142.01217599999998L199.4844928668944 239.11299999999997L180.485969736714 239.11299999999997C180.485969736714 239.11299999999997 180.485969736714 239.11299999999997 180.485969736714 239.11299999999997C180.485969736714 239.11299999999997 180.485969736714 239.11299999999997 180.485969736714 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 180.485969736714 239.11299999999997 L 180.485969736714 142.01217599999998 C 180.485969736714 139.51217599999998 182.985969736714 137.01217599999998 185.485969736714 137.01217599999998 L 194.4844928668944 137.01217599999998 C 196.9844928668944 137.01217599999998 199.4844928668944 139.51217599999998 199.4844928668944 142.01217599999998 L 199.4844928668944 239.11299999999997 z " pathFrom="M 180.485969736714 239.11299999999997 L 180.485969736714 239.11299999999997 L 199.4844928668944 239.11299999999997 L 199.4844928668944 239.11299999999997 L 199.4844928668944 239.11299999999997 L 199.4844928668944 239.11299999999997 L 199.4844928668944 239.11299999999997 L 180.485969736714 239.11299999999997 z" cy="137.01117599999998" cx="199.4844928668944" j="6" val="51.24" barHeight="102.10082399999999" barWidth="18.998523130180423"></path><path d="M212.1501749536814 239.11299999999997L212.1501749536814 187.18441799999997C212.1501749536814 184.68441799999997 214.6501749536814 182.18441799999997 217.1501749536814 182.18441799999997L226.1486980838618 182.18441799999997C228.6486980838618 182.18441799999997 231.1486980838618 184.68441799999997 231.1486980838618 187.18441799999997L231.1486980838618 239.11299999999997L212.1501749536814 239.11299999999997C212.1501749536814 239.11299999999997 212.1501749536814 239.11299999999997 212.1501749536814 239.11299999999997C212.1501749536814 239.11299999999997 212.1501749536814 239.11299999999997 212.1501749536814 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 212.1501749536814 239.11299999999997 L 212.1501749536814 187.18441799999997 C 212.1501749536814 184.68441799999997 214.6501749536814 182.18441799999997 217.1501749536814 182.18441799999997 L 226.1486980838618 182.18441799999997 C 228.6486980838618 182.18441799999997 231.1486980838618 184.68441799999997 231.1486980838618 187.18441799999997 L 231.1486980838618 239.11299999999997 z " pathFrom="M 212.1501749536814 239.11299999999997 L 212.1501749536814 239.11299999999997 L 231.1486980838618 239.11299999999997 L 231.1486980838618 239.11299999999997 L 231.1486980838618 239.11299999999997 L 231.1486980838618 239.11299999999997 L 231.1486980838618 239.11299999999997 L 212.1501749536814 239.11299999999997 z" cy="182.18341799999996" cx="231.1486980838618" j="7" val="28.57" barHeight="56.92858199999999" barWidth="18.998523130180423"></path><path d="M243.81438017064875 239.11299999999997L243.81438017064875 59.65801800000003C243.81438017064875 57.15801800000003 246.31438017064875 54.65801800000003 248.81438017064875 54.65801800000003L257.8129033008292 54.65801800000003C260.3129033008292 54.65801800000003 262.8129033008292 57.15801800000003 262.8129033008292 59.65801800000003L262.8129033008292 239.11299999999997L243.81438017064875 239.11299999999997C243.81438017064875 239.11299999999997 243.81438017064875 239.11299999999997 243.81438017064875 239.11299999999997C243.81438017064875 239.11299999999997 243.81438017064875 239.11299999999997 243.81438017064875 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 243.81438017064875 239.11299999999997 L 243.81438017064875 59.65801800000002 C 243.81438017064875 57.15801800000002 246.31438017064875 54.65801800000002 248.81438017064875 54.65801800000002 L 257.8129033008292 54.65801800000002 C 260.3129033008292 54.65801800000002 262.8129033008292 57.15801800000002 262.8129033008292 59.65801800000002 L 262.8129033008292 239.11299999999997 z " pathFrom="M 243.81438017064875 239.11299999999997 L 243.81438017064875 239.11299999999997 L 262.8129033008292 239.11299999999997 L 262.8129033008292 239.11299999999997 L 262.8129033008292 239.11299999999997 L 262.8129033008292 239.11299999999997 L 262.8129033008292 239.11299999999997 L 243.81438017064875 239.11299999999997 z" cy="54.65701800000002" cx="262.8129033008292" j="8" val="92.57" barHeight="184.45498199999994" barWidth="18.998523130180423"></path><path d="M275.47858538761614 239.11299999999997L275.47858538761614 159.70646399999998C275.47858538761614 157.20646399999998 277.97858538761614 154.70646399999998 280.47858538761614 154.70646399999998L289.4771085177966 154.70646399999998C291.9771085177966 154.70646399999998 294.4771085177966 157.20646399999998 294.4771085177966 159.70646399999998L294.4771085177966 239.11299999999997L275.47858538761614 239.11299999999997C275.47858538761614 239.11299999999997 275.47858538761614 239.11299999999997 275.47858538761614 239.11299999999997C275.47858538761614 239.11299999999997 275.47858538761614 239.11299999999997 275.47858538761614 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 275.47858538761614 239.11299999999997 L 275.47858538761614 159.70646399999998 C 275.47858538761614 157.20646399999998 277.97858538761614 154.70646399999998 280.47858538761614 154.70646399999998 L 289.4771085177966 154.70646399999998 C 291.9771085177966 154.70646399999998 294.4771085177966 157.20646399999998 294.4771085177966 159.70646399999998 L 294.4771085177966 239.11299999999997 z " pathFrom="M 275.47858538761614 239.11299999999997 L 275.47858538761614 239.11299999999997 L 294.4771085177966 239.11299999999997 L 294.4771085177966 239.11299999999997 L 294.4771085177966 239.11299999999997 L 294.4771085177966 239.11299999999997 L 294.4771085177966 239.11299999999997 L 275.47858538761614 239.11299999999997 z" cy="154.70546399999998" cx="294.4771085177966" j="9" val="42.36" barHeight="84.40653599999999" barWidth="18.998523130180423"></path><path d="M307.1427906045835 239.11299999999997L307.1427906045835 67.747974C307.1427906045835 65.247974 309.6427906045835 62.747974 312.1427906045835 62.747974L321.14131373476397 62.747974C323.64131373476397 62.747974 326.14131373476397 65.247974 326.14131373476397 67.747974L326.14131373476397 239.11299999999997L307.1427906045835 239.11299999999997C307.1427906045835 239.11299999999997 307.1427906045835 239.11299999999997 307.1427906045835 239.11299999999997C307.1427906045835 239.11299999999997 307.1427906045835 239.11299999999997 307.1427906045835 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 307.1427906045835 239.11299999999997 L 307.1427906045835 67.747974 C 307.1427906045835 65.247974 309.6427906045835 62.74797399999999 312.1427906045835 62.74797399999999 L 321.14131373476397 62.74797399999999 C 323.64131373476397 62.74797399999999 326.14131373476397 65.247974 326.14131373476397 67.747974 L 326.14131373476397 239.11299999999997 z " pathFrom="M 307.1427906045835 239.11299999999997 L 307.1427906045835 239.11299999999997 L 326.14131373476397 239.11299999999997 L 326.14131373476397 239.11299999999997 L 326.14131373476397 239.11299999999997 L 326.14131373476397 239.11299999999997 L 326.14131373476397 239.11299999999997 L 307.1427906045835 239.11299999999997 z" cy="62.746973999999994" cx="326.14131373476397" j="10" val="88.51" barHeight="176.36502599999997" barWidth="18.998523130180423"></path><path d="M338.8069958215509 239.11299999999997L338.8069958215509 171.243618C338.8069958215509 168.743618 341.3069958215509 166.243618 343.8069958215509 166.243618L352.80551895173136 166.243618C355.30551895173136 166.243618 357.80551895173136 168.743618 357.80551895173136 171.243618L357.80551895173136 239.11299999999997L338.8069958215509 239.11299999999997C338.8069958215509 239.11299999999997 338.8069958215509 239.11299999999997 338.8069958215509 239.11299999999997C338.8069958215509 239.11299999999997 338.8069958215509 239.11299999999997 338.8069958215509 239.11299999999997 " fill="rgba(10,207,151,0.85)" fill-opacity="1" stroke="#0acf97" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskew0144j5)" pathTo="M 338.8069958215509 239.11299999999997 L 338.8069958215509 171.243618 C 338.8069958215509 168.743618 341.3069958215509 166.243618 343.8069958215509 166.243618 L 352.80551895173136 166.243618 C 355.30551895173136 166.243618 357.80551895173136 168.743618 357.80551895173136 171.243618 L 357.80551895173136 239.11299999999997 z " pathFrom="M 338.8069958215509 239.11299999999997 L 338.8069958215509 239.11299999999997 L 357.80551895173136 239.11299999999997 L 357.80551895173136 239.11299999999997 L 357.80551895173136 239.11299999999997 L 357.80551895173136 239.11299999999997 L 357.80551895173136 239.11299999999997 L 338.8069958215509 239.11299999999997 z" cy="166.242618" cx="357.80551895173136" j="11" val="36.57" barHeight="72.86938199999999" barWidth="18.998523130180423"></path><g class="apexcharts-bar-goals-markers"><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g><g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskew0144j5)"></g></g><g class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g></g><g class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g></g><line x1="-21.324872901222925" y1="0" x2="369.631130287864" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line x1="-21.324872901222925" y1="0" x2="369.631130287864" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g class="apexcharts-xaxis" transform="translate(0, 0)"><g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text x="0" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Jan</tspan><title>Jan</title></text><text x="31.66420521696737" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Feb</tspan><title>Feb</title></text><text x="63.328410433934735" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Mar</tspan><title>Mar</title></text><text x="94.9926156509021" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Apr</tspan><title>Apr</title></text><text x="126.65682086786946" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>May</tspan><title>May</title></text><text x="158.3210260848368" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Jun</tspan><title>Jun</title></text><text x="189.98523130180416" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Jul</tspan><title>Jul</title></text><text x="221.64943651877152" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Aug</tspan><title>Aug</title></text><text x="253.31364173573888" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Sep</tspan><title>Sep</title></text><text x="284.9778469527063" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Oct</tspan><title>Oct</title></text><text x="316.64205216967366" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Nov</tspan><title>Nov</title></text><text x="348.30625738664105" y="267.11199999999997" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan>Dec</tspan><title>Dec</title></text></g></g><g class="apexcharts-yaxis-annotations apexcharts-hidden-element-shown"></g><g class="apexcharts-xaxis-annotations apexcharts-hidden-element-shown"></g><g class="apexcharts-point-annotations apexcharts-hidden-element-shown"></g></g><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></svg><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 121.589px; top: 43.1815px;"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Feb</div><div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0 apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(10, 207, 151);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Open Campaign: </span><span class="apexcharts-tooltip-text-y-value">98.58</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 94.4203px; top: 271.112px;"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 18.55px;">Feb</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center gap-2">
                                <h4 class="header-title me-auto">Recent New Users</h4>

                                <div class="d-flex gap-2 justify-content-end text-end">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Import <i class="ri-download-line ms-1"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Export <i class="ri-reset-right-line ms-1"></i></a>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="bg-light bg-opacity-50 py-1 text-center">
                                    <p class="m-0"><b>895k</b> Active users out of <span class="fw-medium">965k</span>
                                    </p>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-custom table-centered table-sm table-nowrap table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-primary-subtle rounded-circle">
                                                                <img src="assets/images/avatar-1.jpg" alt="" height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">John Doe</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Administrator</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i class="ri-circle-fill fs-12 text-success"></i> Active</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="index.html#" class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);" class="dropdown-item">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-info-subtle rounded-circle">
                                                                <img src="assets/images/avatar-2.jpg" alt="" height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Jane Smith</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Editor</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i class="ri-circle-fill fs-12 text-warning"></i> Pending</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="index.html#" class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);" class="dropdown-item">Activate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-secondary-subtle rounded-circle">
                                                                <img src="assets/images/avatar-3.jpg" alt="" height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Michael Brown</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Viewer</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i class="ri-circle-fill fs-12 text-danger"></i> Inactive</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="index.html#" class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">Activate</a>
                                                            <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-warning-subtle rounded-circle">
                                                                <img src="assets/images/avatar-4.jpg" alt="" height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Emily Davis</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Manager</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i class="ri-circle-fill fs-12 text-success"></i> Active</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="index.html#" class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);" class="dropdown-item">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-danger-subtle rounded-circle">
                                                                <img src="assets/images/avatar-5.jpg" alt="" height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Robert Taylor</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Support</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i class="ri-circle-fill fs-12 text-warning"></i> Pending</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="index.html#" class="dropdown-toggle text-muted drop-arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);" class="dropdown-item">Activate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->

                            </div> <!-- end card-body-->

                            <div class="card-footer">
                                <div class="align-items-center justify-content-between row text-center text-sm-start">
                                    <div class="col-sm">
                                        <div class="text-muted">
                                            Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">2596</span> Users
                                        </div>
                                    </div>
                                    <div class="col-sm-auto mt-3 mt-sm-0">
                                        <ul class="pagination pagination-boxed pagination-sm mb-0 justify-content-center">
                                            <li class="page-item disabled">
                                                <a href="index.html#" class="page-link"><i class="ri-arrow-left-s-line"></i></a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="index.html#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="index.html#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="index.html#" class="page-link"><i class="ri-arrow-right-s-line"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> <!-- -->
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="d-flex card-header justify-content-between align-items-center border-bottom border-dashed">
                                <h4 class="header-title">Transactions</h4>
                                <a href="javascript:void(0);" class="btn btn-sm btn-light">Add New <i class="ri-add-line ms-1"></i></a>
                            </div>
                            <div class="card-body simplebar-scrollable-y" data-simplebar="init" style="height: 400px;"><div class="simplebar-wrapper" style="margin: -24px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 24px;">
                                <div class="timeline-alt py-0">
                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="shopping-bag" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">You sold an item</a>
                                            <span class="mb-1">Paul Burgess just purchased “My - Admin
                                                Dashboard”!</span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">5 minutes ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-primary-subtle text-primary timeline-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="rocket" class="lucide lucide-rocket"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Product on the Theme
                                                Market</a>
                                            <span class="mb-1">Reviewer added
                                                <span class="fw-medium">Admin Dashboard</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">30 minutes ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="message-circle" class="lucide lucide-message-circle"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path></svg>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Robert Delaney</a>
                                            <span class="mb-1">Send you message
                                                <span class="fw-medium">"Are you there?"</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">2 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-primary-subtle text-primary timeline-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="image" class="lucide lucide-image"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Audrey Tobey</a>
                                            <span class="mb-1">Uploaded a photo
                                                <span class="fw-medium">"Error.jpg"</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">14 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="shopping-bag" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">You sold an item</a>
                                            <span class="mb-1">Paul Burgess just purchased “My - Admin
                                                Dashboard”!</span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">16 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-primary-subtle text-primary timeline-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="rocket" class="lucide lucide-rocket"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Product on the Bootstrap
                                                Market</a>
                                            <span class="mb-1">Reviewer added
                                                <span class="fw-medium">Admin Dashboard</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">22 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="message-circle" class="lucide lucide-message-circle"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path></svg>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);" class="link-reset fw-semibold mb-1 d-block">Robert Delaney</a>
                                            <span class="mb-1">Send you message
                                                <span class="fw-medium">"Are you there?"</span>
                                            </span>
                                            <p class="mb-0 pb-2">
                                                <small class="text-muted">2 days ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div></div></div></div><div class="simplebar-placeholder" style="width: 394px; height: 729px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 219px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center gap-2 border-bottom border-dashed">
                                <h4 class="header-title me-auto">Transactions Uses</h4>

                                <div class="d-flex gap-2 justify-content-end text-end">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Refresh <i class="ri-reset-right-line ms-1"></i></a>
                                </div>
                            </div>
                            <div data-simplebar="init" style="height: 400px;" class="simplebar-scrollable-y"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                <ul class="list-unstyled transaction-list mb-0">
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">Advertising</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">07/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-up" class="lucide lucide-arrow-big-up fs-20 text-danger"><path d="M9 18v-6H5l7-7 7 7h-4v6H9z"></path></svg>
                                        <span class="tran-text">Support licence</span>
                                        <span class="text-danger tran-price">-$965</span>
                                        <span class="text-muted ms-auto">07/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">Extended licence</span>
                                        <span class="text-success tran-price">+$830</span>
                                        <span class="text-muted ms-auto">07/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">Advertising</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">05/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-up" class="lucide lucide-arrow-big-up fs-20 text-danger"><path d="M9 18v-6H5l7-7 7 7h-4v6H9z"></path></svg>
                                        <span class="tran-text">New plugins added</span>
                                        <span class="text-danger tran-price">-$452</span>
                                        <span class="text-muted ms-auto">05/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">Google Inc.</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">04/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-up" class="lucide lucide-arrow-big-up fs-20 text-danger"><path d="M9 18v-6H5l7-7 7 7h-4v6H9z"></path></svg>
                                        <span class="tran-text">Facebook Ad</span>
                                        <span class="text-danger tran-price">-$364</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">New sale</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">Advertising</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">29/08/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-up" class="lucide lucide-arrow-big-up fs-20 text-danger"><path d="M9 18v-6H5l7-7 7 7h-4v6H9z"></path></svg>
                                        <span class="tran-text">Support licence</span>
                                        <span class="text-danger tran-price">-$854</span>
                                        <span class="text-muted ms-auto">27/08/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">Google Inc.</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">04/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-up" class="lucide lucide-arrow-big-up fs-20 text-danger"><path d="M9 18v-6H5l7-7 7 7h-4v6H9z"></path></svg>
                                        <span class="tran-text">Facebook Ad</span>
                                        <span class="text-danger tran-price">-$364</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-big-down" class="lucide lucide-arrow-big-down fs-20 text-success"><path d="M15 6v6h4l-7 7-7-7h4V6h6z"></path></svg>
                                        <span class="tran-text">New sale</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                </ul>
                            </div></div></div></div><div class="simplebar-placeholder" style="width: 394px; height: 595px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 268px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

            </div> <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            <script>document.write(new Date().getFullYear())</script> © Aeshort
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

   @include('admin.include.footer')
