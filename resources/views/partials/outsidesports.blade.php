<div class="panel panel-default bd-rad0 box-shadow">
    <div style="height: 20px;" class="bgc-red mg0"></div>
    <div class="panel-body pd15">
        <div class="mgb20">
            <div class="row">
                <div class="col-sm-10">
                    <span class="fs25">International Sports</span>
                </div>
                <div class="col-sm-2">
                    @if(Auth::user())
                        @if(Auth::user()->role == 'superadmin')
                        <div class="pointer" data-toggle="modal" data-target='#editor'><img src="{{ asset('img/edit.png') }}" class="img-circle ht30 pull-right" data-toggle="tooltip" data-placement="bottom" title="Edit"></div>
                        @endif
                    @endif
                </div>
            </div>
            <div style="height: 2px;" class="bgc-red mg0"></div><br>
                <div class="col-sm-12">
                <object width="300" height="387" type="application/x-shockwave-flash" data="http://a.espncdn.com/community/widgets/swfs/espn3.swf"><param name="flashVars" value="pid=espn3_1485442882362852370&amp;share=embed"><param name="movie" value="http://a.espncdn.com/community/widgets/swfs/espn3.swf" ><param name="wmode" value="transparent"><param name="allowScriptAccess" value="always"><param name="allowNetworking" value="all"></object>
                </div>


        </div>
        {!! $category->content !!}
    </div>
</div>