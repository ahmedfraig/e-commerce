 <style>
.cart-icon:hover i {
    color: black !important;
}
</style>
 
 <header class="header_section">
     <div class="container">
         <nav class="navbar navbar-expand-lg custom_nav-container ">
             <a class="navbar-brand" href="index.html"><img width="250"
                     src="{{ asset('userweb/assets') }}/images/logo.png" alt="#" /></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class=""> </span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav">
                     <li class="nav-item active">
                         <a class="nav-link" href="{{ url('/theme/front') }}">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                             aria-haspopup="true" aria-expanded="true">
                             <span class="nav-label">Pages <span class="caret"></span></span>
                         </a>
                         <ul class="dropdown-menu">
                             <li><a href="{{ url('/about') }}">About</a></li>
                             <li><a href="{{ url('/testimonial') }}">Testimonial</a></li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#products">Products</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                     </li>

                     <!-- 🔒 Authenticated User -->
                     @auth
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                 {{ Auth::user()->name }}
                             </a>
                             <ul class="dropdown-menu">
                                 <li class="dropdown-item text-dark">{{ Auth::user()->email }}</li>
                                 <li>
                                     <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                         <button class="dropdown-item text-danger" type="submit">Logout</button>
                                     </form>
                                 </li>
                             </ul>
                         </li>
                     @endauth

                     <!-- 👤 Guest User -->
                     @guest
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('login') }}">Login</a>
                         </li>
                     @endguest

                     <li class="nav-item">
                         <a class="nav-link" href="#">
                             <!-- Shopping cart SVG -->
                             <!-- ... -->
                         </a>
                     </li>

                     <form class="form-inline">
                         <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                             <i class="fa fa-search" aria-hidden="true"></i>
                         </button>
                     </form>
                 </ul>

             </div>
         </nav>
         <a href="{{ route('cart.index') }}" class="cart-icon" style="position:absolute; display:inline-block;top:1.6%;right:7%;">
                                <i class="fa fa-shopping-cart" style="font-size:50px;color:red"></i></a>
     </div>
 </header>
