<footer class="note-layout-body-footer">
    <div class="footer-container">
        <div class="contents">

            <div class="contents-item">
                <div>
                    <h3>About</h3>
                    <p>
                        LaraNote is my personal project based on laravel
                        you can email to me from <a href="mailto:" . {{ config('laranote.info.github') }}>Here</a>
                    </p>
                </div>
            </div>

            <div class="contents-item">
                <div>
                    <h3>Social</h3>
                    <ul>
                        <li>
                            <a href="{{ config('laranote.info.github') }}">my GitHub profile</a>
                        </li>
                        <li>
                            <a href="{{ config('laranote.info.instagram') }}">my Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="contents-item">
                <div>
                    <h3><a href="{{ route('web.terms-of-service') }}">Terms of Service</a></h3>
                    <h3><a href="{{ route('web.privacy-policy')}}">Privacy Policy</a></h3>
                </div>
            </div>
        </div>
    </div>
</footer>