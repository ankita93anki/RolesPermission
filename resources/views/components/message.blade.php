@if(Session::get('success'))
    <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::get('error'))
    <div class="bg-red-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
        {{Session::get('error')}}
    </div>
@endif