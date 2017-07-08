@section('header')
    @include('Home.Public.header');
    @show
@section('top')
    @include('Home.Public.top')
    @show
@section('siderbar')
    @include('Home.Public.sidebar')
    @show

<div class="main-container">
    @yield('content')
</div>
@section('footer')
    @include('Home.Public.footer')
@show
</body>
</html>