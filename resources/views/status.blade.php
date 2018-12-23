@if(session('status') !== null)
<div class="alert alert-success text-center" style="padding:10px;">
    <ul style="margin-bottom:0;">
        <li class="text-center">{{ session('status') }}</li>
    </ul>
</div>
@endif
