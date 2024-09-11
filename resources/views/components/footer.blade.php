<footer class="relative top-full w-full mx-auto text-twoshk_tan">
    <div id="copyright" class="text-center mt-4">
        <div class="text-[.75rem]">
            <form id="frmLogout" class="inline-block" action="{{ url('logout') }}" method="POST">
                @csrf
                <a href="#"  onclick="document.getElementById('frmLogout').submit(); ">Logout</a> 
            </form>
            | <a href="/policies/privacy">Privacy</a> | <a href="/policies/terms">Terms</a>
        </div>
        <p class="mt-4 text-[.65rem] p-0">
            Another <a href="https://www.mojoimpact.com" class="" target="_blank" rel="noopener">
            <span class="font-semibold">Mojo Impact<span class="trade"></span></span></a> custom website.<br>
            Design and development by <a href="https://www.mojoimpact.site" class="link link-hover glow"
                target="_blank" rel="noopener">
                <span class="font-semibold ">Mojo Impact Web Development</span></a>
            <br>
            Copyright &copy; 2012 &mdash; {{date('Y')}}
            <span class="font-semibold">Mojo Impact</span>, LLC. All rights
            reserved.
        </p>
    </div>
</footer>    