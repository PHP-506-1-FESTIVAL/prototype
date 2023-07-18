{{-- CREATE TABLE `festival_requests` (
    요청번호 `req_id`	INT	NOT NULL	COMMENT 'PK, AUTO_INCREMENT',
    요청자 ID `user_id`	INT	NOT NULL	COMMENT 'FK',
    요청 날짜 `created_at`	TIMESTAMP	NULL,
    축제 이름 `req_title`	VARCHAR(255)	NOT NULL,
    행사 시작일 `req_start_date`	DATE	NOT NULL,
    행사 종료일 `req_end_date`	DATE	NOT NULL,
    지역코드 `area_code`	VARCHAR(64)	NOT NULL,
    시군구 코드 `sigungu_code`	VARCHAR(64)	NOT NULL,
    GPS X좌표 `map_x`	VARCHAR(64)	NOT NULL,
    GPS Y좌표 `map_y`	VARCHAR(64)	NOT NULL,
    관광타입 `content_type_id`	VARCHAR(64)	NOT NULL,
    전화 번호 `tel`	VARCHAR(64)	NOT NULL,
    포스터 이미지 `poster_img`	VARCHAR(512)	NULL	COMMENT 'path',
    썸네일 이미지 `list_img`	VARCHAR(512)	NULL	COMMENT 'path',
    홈페이지 `homepage`	VARCHAR(512)	NULL,
    사업자 번호 `business_id`	VARCHAR(64)	NOT NULL,
    요청 상태 `req_state`	CHAR(1)	NOT NULL	DEFAULT '0'	COMMENT '0미승인, 1승인,2 반려',
    처리 날짜 `updated_at`	TIMESTAMP	NULL,
    처리관리자 번호 `admin_id`	INT	NOT NULL	COMMENT 'FK'
); --}}

@extends('layout.layout')

@section('title','축제 요청')

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"><a href="{{route('main.request')}}">축제 요청</a></h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li><a href="{{route('main.request')}}">축제 요청</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Dashboard Section -->
    <section class="dashboard section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="main-content">
                        <!-- Start Post Ad Block Area -->
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">축제 요청</h3>
                            <div class="inner-block">
                                <!-- Start Post Ad Tab -->
                                <div class="post-ad-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-item-info-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-item-info" type="button" role="tab"
                                                aria-controls="nav-item-info" aria-selected="true">
                                                <span class="serial">01</span>
                                                Step
                                                <span class="sub-title">축제 이름</span>
                                            </button>
                                            <button class="nav-link" id="nav-item-details-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-item-details" type="button" role="tab"
                                                aria-controls="nav-item-details" aria-selected="false">
                                                <span class="serial">02</span>
                                                Step
                                                <span class="sub-title">축제 정보</span>
                                            </button>
                                            <button class="nav-link" id="nav-user-info-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-user-info" type="button" role="tab"
                                                aria-controls="nav-user-info" aria-selected="false">
                                                <span class="serial">03</span>
                                                Step
                                                <span class="sub-title">축제 상세 정보</span>
                                            </button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-item-info" role="tabpanel"
                                            aria-labelledby="nav-item-info-tab">
                                            <!-- Start Post Ad Step One Content -->
                                            <div class="step-one-content">
                                                <form class="default-form-style" method="post" action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>축제명</label>
                                                                <input name="title" type="text"
                                                                    placeholder="Enter Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Category*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select a Category</option>
                                                                        <option value="none">Mobile Phones</option>
                                                                        <option value="none">Electronics</option>
                                                                        <option value="none">Computers</option>
                                                                        <option value="none">Headphones</option>
                                                                        <option value="none">Furnitures</option>
                                                                        <option value="none">Books</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group button mb-0">
                                                                <button type="submit" class="btn ">Next Step</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Start Post Ad Step One Content -->
                                        </div>
                                        <div class="tab-pane fade" id="nav-item-details" role="tabpanel"
                                            aria-labelledby="nav-item-details-tab">
                                            <!-- Start Post Ad Step Two Content -->
                                            <div class="step-two-content">
                                                <form class="default-form-style" method="post" action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Add Price*</label>
                                                                <input name="price" type="text"
                                                                    placeholder="Enter Price">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Price Type*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Fixed</option>
                                                                        <option value="none">Price On Call</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Select Currency*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Dollar</option>
                                                                        <option value="none">Euro</option>
                                                                        <option value="none">Rupee</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="upload-input">
                                                                <input type="file" id="upload" name="upload">
                                                                <label for="upload" class="text-center content">
                                                                    <span class="text">
                                                                        <span class="d-block mb-15">Drop files anywhere
                                                                            to Upload</span>
                                                                        <span class=" mb-15 plus-icon"><i
                                                                                class="lni lni-plus"></i></span>
                                                                        <span class="main-btn d-block btn-hover">Select
                                                                            File</span>
                                                                        <span class="d-block">Maximum upload file size
                                                                            10Mb</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label class="video-label">Video Link* <span>Input only
                                                                        YouTube & Vimeo</span></label>
                                                                <input name="video" type="text"
                                                                    placeholder="Input link">
                                                                <a href="javascript:void(0)" class="add-video"><i
                                                                        class="lni lni-plus"></i> Add Video</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mt-30">
                                                                <label>Ad Description*</label>
                                                                <textarea name="message"
                                                                    placeholder="Input ad description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Type of Ad*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Option 1</option>
                                                                        <option value="none">Option 2</option>
                                                                        <option value="none">Option 3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Item Condition*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Used</option>
                                                                        <option value="none">Brand New</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="tag-label">Tags* <span>Comma(,)
                                                                        separated</span></label>
                                                                <input name="tag" type="text"
                                                                    placeholder="Type Product tag">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group button mb-0">
                                                                <button type="submit"
                                                                    class="btn alt-btn">Previous</button>
                                                                <button type="submit" class="btn ">Next Step</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Start Post Ad Step Two Content -->
                                        </div>
                                        <div class="tab-pane fade" id="nav-user-info" role="tabpanel"
                                            aria-labelledby="nav-user-info-tab">
                                            <!-- Start Post Ad Step Three Content -->
                                            <div class="step-three-content">
                                                <form class="default-form-style" method="post" action="#">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Name*</label>
                                                                <input name="name" type="text"
                                                                    placeholder="Enter your name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Mobile Numbe*</label>
                                                                <input name="number" type="text"
                                                                    placeholder="Enter mobile number">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Country*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select a Country</option>
                                                                        <option value="none">Afghanistan</option>
                                                                        <option value="none">America</option>
                                                                        <option value="none">Albania</option>
                                                                        <option value="none">Bangladesh</option>
                                                                        <option value="none">Brazil</option>
                                                                        <option value="none">India</option>
                                                                        <option value="none">South Africa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Select City*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select City</option>
                                                                        <option value="none">New York</option>
                                                                        <option value="none">Los Angeles</option>
                                                                        <option value="none">Chicago</option>
                                                                        <option value="none">San Diego</option>
                                                                        <option value="none">San Jose</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Select State*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select State</option>
                                                                        <option value="none">New York</option>
                                                                        <option value="none">Texas</option>
                                                                        <option value="none">Arizona</option>
                                                                        <option value="none">Florida</option>
                                                                        <option value="none">Washington</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Address*</label>
                                                                <input name="address" type="text"
                                                                    placeholder="Enter a location">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="google-map">
                                                                <div class="mapouter">
                                                                    <div class="gmap_canvas"><iframe width="100%"
                                                                            height="300" id="gmap_canvas"
                                                                            src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                                            frameborder="0" scrolling="no"
                                                                            marginheight="0" marginwidth="0"></iframe><a
                                                                            href="https://123movies-to.org"></a><br>
                                                                        <style>
                                                                            .mapouter {
                                                                                position: relative;
                                                                                text-align: right;
                                                                                height: 300px;
                                                                                width: 100%;
                                                                            }
                                                                        </style><a
                                                                            href="https://www.embedgooglemap.net">embed
                                                                            google maps wordpress</a>
                                                                        <style>
                                                                            .gmap_canvas {
                                                                                overflow: hidden;
                                                                                background: none !important;
                                                                                height: 300px;
                                                                                width: 100%;
                                                                            }
                                                                        </style>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    I agree to all Terms of Use & Posting Rules
                                                                </label>
                                                            </div>
                                                            <div class="form-group button mb-0">
                                                                <button type="submit"
                                                                    class="btn alt-btn">Previous</button>
                                                                <button type="submit" class="btn ">Submit Ad</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Start Post Ad Step Three Content -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Post Ad Tab -->
                            </div>
                        </div>
                        <!-- End Post Ad Block Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->

    <!-- Start Newsletter Area -->
    <div class="newsletter section">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="title">
                            <i class="lni lni-alarm"></i>
                            <h2>Newsletter</h2>
                            <p>We don't send spam so don't worry.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form">
                            <form action="#" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe<span class="dir-part"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Newsletter Area -->

@endsection
