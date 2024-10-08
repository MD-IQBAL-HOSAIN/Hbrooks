@extends('frontend.app', ['title' => 'Log in'])

@section('main')
<section class=" bi-login-container">
    <div class="login-container-left">
        <div class="form-container">
            <h1>Log In</h1>
            <p>Please input your information in the fields below to enter your
                Journey platform. </p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="bi-login-input-wrapper">
                        <input type="email" value="{{ old('email') }}" placeholder="Your Email" name="email" id="email"/>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.1" d="M12 0C15.315 0 18 2.685 18 6C18 9.315 15.315 12 12 12C8.685 12 6 9.315 6 6C6 2.685 8.685 0 12 0ZM12 24C12 24 24 24 24 21C24 17.4 18.15 13.5 12 13.5C5.85 13.5 0 17.4 0 21C0 24 12 24 12 24Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="bi-login-input-wrapper">
                        <input type="password" placeholder="Password" id="password" name="password"/>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.1" d="M24 8.25005C24 12.8064 20.3063 16.5 15.75 16.5C15.2241 16.5 14.7098 16.4502 14.2112 16.3561L13.0857 17.6224C12.9801 17.7412 12.8506 17.8362 12.7057 17.9013C12.5608 17.9664 12.4037 18 12.2448 18H10.5V19.875C10.5 20.4963 9.99633 21 9.375 21H7.5V22.875C7.5 23.4963 6.99633 24 6.375 24H1.125C0.503672 24 0 23.4963 0 22.875V19.216C0 18.9176 0.118547 18.6315 0.329484 18.4205L7.91395 10.836C7.64569 10.0225 7.5 9.15333 7.5 8.25C7.5 3.69366 11.1936 4.68755e-05 15.75 4.47777e-10C20.3197 -4.68746e-05 24 3.6802 24 8.25005ZM15.75 6C15.75 7.24266 16.7573 8.25 18 8.25C19.2427 8.25 20.25 7.24266 20.25 6C20.25 4.75734 19.2427 3.75 18 3.75C16.7573 3.75 15.75 4.75734 15.75 6Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="bi-login-input-wrapper save">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                        <label for="remember">
                            <span>Remember Me</span>
                            <a href="{{ route('password.request') }}" target="_blank"> Forget Your Password?</a>
                        </label>
                    </div>
                    <div class="bi-login-input-wrapper ">
                        <button type="submit" name="submit" id="submit">Log In</button>
                    </div>
                </form>

        </div>
        <div class="redirect-container">
            <p>Don't have an account yet?</p>
            <a href="{{ route('registers')}}">Register Here</a>
        </div>
    </div>
    <div class="login-container-right">
        <img class="" src="frontend/assets/images/cuate.png" alt="" srcset="">
    </div>
</section>
@endsection
