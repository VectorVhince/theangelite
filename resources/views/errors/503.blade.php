@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default bd-rad0 box-shadow">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <div class="row mgv20">
                        <div class="col-md-12">
                            <span class="dp-bl">The page you are looking for is not available.</span><br>
                        </div>
                        <div class="col-md-2">            
                            <input action="action" type="button" class="btn btn-info btn-block" value="Back" onclick="history.go(-1);" />
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection