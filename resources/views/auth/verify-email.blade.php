<x-layout>
    @include('partials._navbar')
    <x-card class="p-10 max-w-lg mx-auto mt-24">

        <div class="w-14 mb-2 mx-auto"><img src="{{asset('/images/mail2.png')}}"></div>
        <div class="font-bold text-center mb-5">{{__('We sent a mail to your registered email address')}}</div>
        <div class="mb-4 text-gray-600 text-center">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-center">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="mb-4">
                    <x-primary-button>
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </x-card>
</x-layout>
