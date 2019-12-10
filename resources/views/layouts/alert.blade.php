@if(session()->has('success'))
    <div class="alert alert-custom alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ session()->get('success') }}</strong>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-custom alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ session()->get('error') }}</strong>
    </div>
@endif

@if(session()->has('info'))
    <div class="alert alert-custom alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ session()->get('info') }}</strong>
    </div>
@endif

@if(session()->has('danger'))
    <div class="alert alert-custom alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ session()->get('danger') }}</strong>
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-custom alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ session()->get('warning') }}</strong>
    </div>
@endif