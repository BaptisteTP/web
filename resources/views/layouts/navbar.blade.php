
<div class="navbar w-full bg-white h-20 flex justify-between items-center z-50">
    <a href="/"><img src="/image1/logo.png" class="w-48 object-contain mx-4" alt="Logo"></a>
    <nav class="block ml-auto mr-5 flex items-center">
        <div class="nav-links">
            <ul class="flex list-none m-0 p-0 flex items-center space-x-4">
                <li><a class="no-underline text-zinc-950 py-4 px-8 rounded font-bold" href="{{ route('internship_offers.index') }}">Stage</a></li>
                <li><a class="no-underline text-zinc-950 py-4 px-8 rounded" href="/#Entreprise">Entreprise</a></li>
                <li><a class="no-underline text-zinc-950 py-4 px-8 rounded" href="/#Nous-Contacter">Nous
                        contacter</a></li>
                <li><a href=
                    <?php if (Auth::check()){
                            Echo('/dashbord');
                        } else{
                            Echo('/auth/login');
                            };
                            ?>
                ><button
                

                         
                        class="connexion text-white border-transparent cursor-pointer rounded-3xl py-3 px-6 flex items-center">
                        <svg
                            class="mr-2.5 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                     

                        <span class="text-base">   
                            <?php if (Auth::check()){
                                $name =$user = Auth::user()->first_name;
                            Echo($name);
                        } else{
                            Echo('Connexion');
                            }
                        ?></span>

                    </button>
                </a>
                </li>
            </ul>
        </div>
        <div class="menu-hamburger hidden absolute right-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </div>
    </nav>
    <script>
        
const menuHamburger = document.querySelector(".menu-hamburger")
const navLinks = document.querySelector(".nav-links")

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')})


//no scroll quand menu burger ouvert
const hamburger = document.querySelector('.menu-hamburger');
const body = document.body;


function toggleScroll() {
    body.classList.toggle('no-scroll');
}

hamburger.addEventListener('click', function() {
    toggleScroll();
});

</script>
</div>