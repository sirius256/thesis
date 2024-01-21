@if (session('status')  )
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
       class="alert alert-success custom-alert-success-message"
    >{{ session('status') }}</p>
@endif

@if (session('error')  )
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
       class="alert alert-danger custom-alert-message"
    >{{ session('error') }}</p>
@endif
