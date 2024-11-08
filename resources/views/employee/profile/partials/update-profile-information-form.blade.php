
    <header>
        <h2 class="h5 text-dark">
            {{ __('Profile Information') }} {{__('#'.$user->employee_id)}}
        </h2>

        <p class="mt-1 text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    

