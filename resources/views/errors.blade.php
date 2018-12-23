@if($errors->any())
    <div class="alert alert-danger" style="padding: 10px;">
        <ul style="margin-bottom:0;">
            @foreach ($errors->all() as $error)
                <li class="text-center">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif