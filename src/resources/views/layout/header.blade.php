<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{route('main')}}">
                            <img src="/assets/images/logo/logo.svg" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto" style="float:left;">
                                <li class="nav-item">
                                    <a href="{{route('main')}}" aria-label="Toggle navigation">메인</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('main.fesList')}}" aria-label="Toggle navigation">축제일정</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)"
                                        data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">커뮤니티</a>
                                    <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a href="{{route('board.index')}}">축제톡톡</a></li>
                                        <li class="nav-item"><a href="{{route('notice.index')}}">공지사항</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item m-auto">
                                    <form class="d-flex" method="POST" action="{{route('main.search')}}">
                                        @csrf
                                        <input class="form-control me-2 dropdown-toggle headersearch" type="search" placeholder="검색어를 입력하세요." aria-label="Search" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off" name="search" maxlength='100' style="height:35px;">
                                        <div class="button">
                                            <button class="btn" type="submit" style="width:60px; height:35px; padding:5px;">검색</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @auth
                        <li class="dropdown list-group-item" style="border:none;">
                            <a class="dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/img/profile/{{session()->get('user_profile')}}" alt="" class="img-thumbnail img-fluid" style="width:50px;height:50px;border-radius:50%;border:none;object-fit:cover;">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding: 0;">
                                <li>
                                    <div>
                                        <img src="/img/profile/{{session()->get('user_profile')}}" alt="" class="img-fluid borderRadius" style="width:50px;height:50px;border-radius:50%;margin-top:5px;margin-top:12px;margin-left:12px;object-fit:cover;">
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{route('user.main')}}">{{session()->get('user_nickname')}}</a>
                                        <a class="dropdown-item" href="{{route('user.main')}}">{{session()->get('user_email')}}</a>
                                    </div>
                                </li>
                                <span class="Pline"></span>
                                <li><a class="dropdown-item" href="{{route('user.main')}}">마이페이지</a></li>
                                <li><a class="dropdown-item" href="{{route('user.favorites')}}">찜목록</a></li>
                                <li><a class="dropdown-item" href="{{route('main.logout')}}">로그아웃</a></li>
                            </ul>
                        </li>
                        @endauth
                        @guest
                        <div class="login-button col" style="display: block;" >
                            <ul>
                                <li style="margin: 0;">
                                    <a href="{{route('user.login')}}"><i class="lni lni-enter"></i> 로그인</a>
                                </li>
                                <li>
                                    <a href="{{route('user.terms')}}"><i class="lni lni-user"></i> 회원가입</a>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
