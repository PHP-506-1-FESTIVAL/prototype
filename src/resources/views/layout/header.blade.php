<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid mx-5">
        {{-- @auth 0620 이가원 del
            <a class="navbar-brand" href="{{route('main.use', ['id' => 1])}}">마실가실?</a>
        @endauth

        @guest --}}
            <a class="navbar-brand" href="{{route('main')}}">마실가실?</a>
        {{-- @endguest --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('main.fesList')}}">축제일정</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        커뮤니티
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('board.index')}}">축제톡톡</a></li>
                        <li><a class="dropdown-item" href="{{route('notice.index')}}">공지사항</a></li>
                    </ul>
                </li>
            </ul>
        <div class="dropdown">
            <form class="d-flex" method="POST" action="{{route('main.search')}}">
                @csrf
                <input class="form-control me-2 dropdown-toggle" type="search" placeholder="Search" aria-label="Search" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  autocomplete="off" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <ul class="list-unstyled">
                        <li><a class="dropdown-item" href="#">추후 추가</a></li>
                    </ul>
                </div>
            </form>
        </div>
        @auth
            <li class="dropdown list-group-item">
                <a class="dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/img/profile/{{session()->get('user_profile')}}" alt="" class="img-thumbnail img-fluid" style="width:50px">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <div>
                            <img src="/img/profile/{{session()->get('user_profile')}}" alt="" style="width:50px">
                        </div>
                        <div>
                            {{session()->get('user_email')}}
                            <br>
                            {{session()->get('user_nickname')}}
                        </div>
                    </li>
                    <li><a class="dropdown-item" href="{{route('user.main')}}">마이페이지</a></li>
                    <li><a class="dropdown-item" href="">찜목록</a></li>
                    <li><a class="dropdown-item" href="{{route('main.logout')}}">로그아웃</a></li>
                </ul>
            </li>
        @endauth
        @guest
            <a href="{{route('user.login')}}">로그인</a>
        @endguest
    </div>
</nav>
