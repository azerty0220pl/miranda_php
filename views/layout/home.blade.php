<html>
    @section('home')
    <section class="home">
        <p class="title-up text--color-white">THE ULTIMATE LUXURY EXPERIENCE</p>
        <p class="title-1">@yield('welcome')</p>
        <div class="path">
            <a class="paragraph-2 link" href="/index.php">Home</a>
            <p class="paragraph-2 link"> | </p>
            <p class="paragraph-2 text--color-grey-5">@yield('title')</p>
        </div>
    </section>

    @show
</html>