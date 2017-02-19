<div class="panel panel-default bd-rad0 box-shadow">
    <div style="height: 20px;" class="bgc-red mg0"></div>
    <div class="panel-body pd15">
        <div class="mgb20">
            <div class="row">
                <div class="col-sm-10">
                    <span class="fs25">Calendar and Holidays</span>
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
                    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=en.philippines%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;src=ncnhpc9emk3vc8q9l7tg7ojj44%40group.calendar.google.com&amp;color=%232952A3&amp;ctz=Asia%2FManila" style="border-width:0" width="300" height="350" frameborder="0" scrolling="no"></iframe>
                    </div>
        </div>
        {!! $category->content !!}
    </div>
</div>