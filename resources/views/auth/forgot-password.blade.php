<style>
 .frm{
    background-color: #51C8BC;
    height: 488px;
    /* width: 529px; */
    border-radius: 26px;
    padding: 10px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 40px;
 }
form{
    background-color: white;
    width: 530px;
    height: 465px;
    padding: 50px;
    padding-left: 50px;
    border-radius: 30px;
    margin-left: 10px;
    margin-top: 20px;
}
img{
    padding-left: 20px;
    height: 200px;
    width: 200px;
}
.login{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 30px;
}

</style>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="frm" >
    <img src="ECO.png" alt="no image" srcset="">
    <form method="POST" action="{{ route('password.email') }}">
        <div class="login">RESET PASSWORD</div>
        <!-- <div class="text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div> -->
        @csrf

        <!-- Email Address -->
        <div class="mt-4" style="margin-top: 40px;">
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4" style="margin-top: 40px;">
            <x-primary-button style="background-color:rgb(43, 151, 185); width: 90%;color: white; padding-left: 120px;">
                {{ __('Receive Link to Reset ') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-end mt-4" style="margin-top: 60px;">
        You remember an account password?
            <a class="underline text-sm text-blue-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>

        </div>  
    </form></div>
</x-guest-layout>
