<div class="panel panel-default bd-rad0 box-shadow">
    <div style="height: 20px;" class="bgc-red mg0"></div>
    <div class="panel-body pd15">
        <div class="mgb20">
            <div class="row">
                <div class="col-sm-10">
                    <span class="fs25">Play Me</span>
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
                 <div class="col-sm-12" style="padding-top:12px">
                   <center> <script type="text/javascript" src="http://100widgets.com/js_data.php?id=162"></script> <center>
                </div>
        </div>
        {!! $category->content !!}
    </div>
</div>