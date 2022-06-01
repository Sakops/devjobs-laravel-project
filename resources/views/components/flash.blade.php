@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed top-0 left-1/2 bg-laravel alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif