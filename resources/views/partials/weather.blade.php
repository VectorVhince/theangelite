<div class="panel panel-default bd-rad0 box-shadow">
    <div style="height: 20px;" class="bgc-red mg0"></div>
    <div class="panel-body pd15">
        <div class="mgb20">
            <div class="row">
                <div class="col-sm-10">
                    <span class="fs25">Weather Information</span>
                </div>
                <div class="col-sm-2">
                    @if(Auth::user())
                        @if(Auth::user()->role == 'superadmin')
                        <div class="pointer" data-toggle="modal" data-target='#editor'><img src="{{ asset('img/edit.png') }}" class="img-circle ht30 pull-right" data-toggle="tooltip" data-placement="bottom" title="Edit"></div>
                        @endif
                    @endif
                </div>
            </div>
            <div style="height: 2px;" class="bgc-red mg0"></div>
                <div class="col-sm-12"><br>
                    <a href="http://www.accuweather.com/en/ph/san-fernando/265318/air-travel-current-weather/265318" class="aw-widget-legal"></a>
                    <div id="awtd1485439398507" class="aw-widget-36hour"  data-locationkey="" data-unit="f" data-language="en-us" data-useip="true" data-uid="awtd1485439398507" data-editlocation="true" data-lifestyle="air-travel"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script> 
                </div>
        </div>
        {!! $category->content !!}
    </div>
</div>