<nav class="navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand order-1" href="index.html">
        <img class="img-fluid" width="100px" src="{{ asset('assets/client/images/logo.png') }}"
            alt="Reader | Hugo Personal Blog Template">
    </a>
    <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    danh muc <i class="ti-angle-down ml-1"></i>
                </a>

                <div class="dropdown-menu">
                    @foreach ($catelogue as $item)
                        {{-- @dd($catelogue) --}}
                        <tr>
                            <td>
                                <a class="dropdown-item"
                                    href="{{ route('client.create', $item->id) }}">{{ $item->name }} </a>
                            </td>
                        </tr>
                    @endforeach

                </div>



            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Shop</a>
            </li>
            <li class="nav-item">
                <a href="{{route('client.listCart')}}">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <i class="fas fa-shopping-bag"> Giỏ hàng</i>
                    </div>
                </a>
            </li>

            <li>


                {{-- <a class="btn btn-primary" href="{{ route('login') }}">login</a> --}}

            </li>
            <li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-warning " href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

            </li>



        </ul>
    </div>


</nav>
