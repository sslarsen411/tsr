<x-app-layout>
    <h2 class="text-2xl !my-0">You&apos; Done!</h2>
    <h2>{{session('cust.first_name')}}, here&apos;s your completed review</h2>
    <p id="review" class="w-3/4 mx-auto bg-gray-200 p-8">
       {{$review}}
    </p>
    <h2 >Next</h2>
    <p>
        This review been copied to your clipboard. Click or tap on the button below to <strong>post</strong> it on our Google Business Profile.
        And thanks again from <strong>{{session('location.company')}}</strong>, we apprciiate your feedback.</p>
        <h3 class="mt-5">
            Here&apos;s the <strong>direct link</strong> to the review page:</h3>
    <a type=button class="mt-8 w-52 mx-auto text-center btn btn-outline animate-bounce" href="{{session('location')->gbp_url}}">
        <img src="{{ Vite::asset('resources/images/google-logo.svg')}}" class="inline-block h-8 hover:animate-spin" alt="Google aproved logo">
        Post Your Review
    </a>
    <h2>
        How to post your review on Google
    </h2>     
    <div class="main__content flex-col border-2 ">    
        <div id="directions" class="direction grid grid-cols-2 items-center gap-4 px-0">            
            <div>
                <ol class="list-decimal">
                    <li>
                        Click/tap the button above
                    </li>
                    <li>
                        Enter your star rating
                    </li>
                    <li>
                        Paste your review
                    </li>
                    <li>
                        Click or tap Post &mdash; Done!
                    </li>
                </ol>
            </div>      
            <div>
                <img src="{{ Vite::asset('resources/images/how-to-post.webp')}}" alt="Picture of a phone showing how to paste the review on Google">
            </div>
        </div>    
        <p class="my-4 self-start">Thanks for using <span class="font-bold text-twoshk_navy">Two Shakes Review</span>.</p>
    </div>
    <script src="{{ Vite::asset('resources/js/finish.js') }}"></script>
</x-app-layout>