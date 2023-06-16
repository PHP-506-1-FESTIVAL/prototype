@extends('layout.layout')

@section('title','축제 목록')

@section('content')
<body>
{{-- 검색부분 --}}
<div class="inner">
        <p class="blind">전국축제</p>
        <ul class="tab_area">
            <li>
                <a href="/kfes/list/clturTursmFstvlList.do">문화관광축제</a>
                    <!-- 노티 -->
                    <div class="ico_lottie_title">
                    <lottie-player src="/kfes/resources/js/confetti.json" speed="1" autoplay="" loop="" background="transparent"></lottie-player>
                </div>
            </li>
            <li class="active"><a href="javascript:;">전국축제</a></li><!-- 활성시 class="active" -->
        </ul>
        <div class="blind">검색영역</div>
        <form name="festivalSearch" id="festivalSearch" class="festival_search" onsubmit="return false;">
            <fieldset>
                <legend class="blind">축제 검색</legend>
                <div class="search_box_wrap">
                    <div class="select_box select_date">
                        <label for="searchDate">시기 선택</label>
                        <select name="searchDate" id="searchDate" title="시기 선택">
                            <option value="">시기</option>
                            <option value="A">개최중</option>
                            <option value="B">개최예정</option>
                            <option value="01">01월</option>
                            <option value="02">02월</option>
                            <option value="03">03월</option>
                            <option value="04">04월</option>
                            <option value="05">05월</option>
                            <option value="06">06월</option>
                            <option value="07">07월</option>
                            <option value="08">08월</option>
                            <option value="09">09월</option>
                            <option value="10">10월</option>
                            <option value="11">11월</option>
                            <option value="12">12월</option>
                        </select>
                    </div>
                    <div class="select_box select_area">
                        <label for="searchArea">지역 선택</label>
                        <select name="searchArea" id="searchArea" title="지역 선택">
                            <option value="">지역</option>
                                <option value="1">서울</option>
                                <option value="2">인천</option>
                                <option value="3">대전</option>
                                <option value="4">대구</option>
                                <option value="5">광주</option>
                                <option value="6">부산</option>
                                <option value="7">울산</option>
                                <option value="8">세종</option>
                                <option value="31">경기</option>
                                <option value="32">강원</option>
                                <option value="33">충북</option>
                                <option value="34">충남</option>
                                <option value="35">경북</option>
                                <option value="36">경남</option>
                                <option value="37">전북</option>
                                <option value="38">전남</option>
                                <option value="39">제주</option>
                        </select>
                    </div>
                    <div class="btn_box">
                        <button class="btn_reset" onclick="javascript:location.href='/kfes/list/wntyFstvlList.do';"><span>초기화</span></button>
                        <button class="btn_search" id="btnSearch" onclick="javascript:void(0);"><span>검색</span></button>
                    </div>
                </div>
            </fieldset>
        </form>
</div>

{{-- 비주얼배너 --}}
<div class="inner">
    <div class="blind">페스티벌 미리보기</div>
    <div class="pc_wrap">
        <ul>
            
                <li class="visual visual1" style="width: 16%;"><!-- class="active" 추가시 활성 -->
                    <a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=ffee2588-2551-4b83-a5ea-2a1d3a5b5aeb" style="background-image: url('https://korean.visitkorea.or.kr/kfes/upload/nationwide/2023/06/12/da1eaf74-7514-4207-a365-12b59746a5e5.jpg');" title="이월드 트로피컬 아쿠아 빌리지">
                        <div class="txt_area">
                            <div class="tit_box">
                                
                                    <span class="flag">개최중</span>
                                
                                <strong>이월드 트로피컬 아쿠아 빌리지</strong>
                            </div>
                            <div class="tit_desc">
                                <span>2023.06.10 ~ 2023.08.27</span>
                                <span class="area_name">대구 달서구</span>
                                <span class="btn_more"></span>
                            </div>
                        </div>
                    </a>
                </li>
            
                <li class="visual visual2" style="width: 16%;"><!-- class="active" 추가시 활성 -->
                    <a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=a8fcf987-666e-404e-9446-0a7f787e83fb" style="background-image: url('https://korean.visitkorea.or.kr/kfes/upload/nationwide/2023/06/12/1177bc95-13a8-4533-86e2-e9a077065210.jpg');" title="서울랜드 불빛축제 루나파크">
                        <div class="txt_area">
                            <div class="tit_box">
                                
                                    <span class="flag">개최중</span>
                                
                                <strong>서울랜드 불빛축제 루나파크</strong>
                            </div>
                            <div class="tit_desc">
                                <span>2023.01.01 ~ 2023.12.31</span>
                                <span class="area_name">경기도 과천시</span>
                                <span class="btn_more"></span>
                            </div>
                        </div>
                    </a>
                </li>
            
                <li class="visual visual3 active" style="width: 64%;"><!-- class="active" 추가시 활성 -->
                    <a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=c30076fe-18c2-40a8-8a0c-66f05e349cb1" style="background-image: url('https://korean.visitkorea.or.kr/kfes/upload/nationwide/2023/06/12/c420cd6f-f9ed-4cdc-b235-47443aece351.jpg');" title="강릉단오제  ">
                        <div class="txt_area">
                            <div class="tit_box">
                                
                                <strong>강릉단오제  </strong>
                            </div>
                            <div class="tit_desc">
                                <span>2023.06.18 ~ 2023.06.25</span>
                                <span class="area_name">강원도 강릉시</span>
                                <span class="btn_more"></span>
                            </div>
                        </div>
                    </a>
                </li>
            
        </ul>
    </div>
</div>
<section class="other_list type2" role="region">
<div class="inner">
    <div class="other_festival" role="application">
        <div class="blind">페스티벌 검색 리스트</div>

            <!-- 검색 결과 없음 -->
            <div class="no_list" style="display: none;" id="divNoData">
            <div class="no_img"></div>
            <strong>검색결과가 없습니다</strong>
            <p>찾으시는 축제를 다시 검색해 주세요</p>
        </div>
        <!-- //검색 결과 없음 -->

        <div class="festival_ul_top" id="festival_ul_top" style="">
            <ul class="tab_area">
                <li id="tabFstvlList" class="active"><button>축제일순</button></li><!-- class="active" 추가시 활성 -->
                <li id="tabFstvlLikeOrderList"><button>인기순</button></li>
            </ul>
        </div>
        <div class="tab_cont_area">
            <!-- 축제일순 -->
            <div class="tab_cont active" aria-expanded="true" role="application"><!-- class="active" 추가시 활성 -->
                <p class="blind">축제일순 리스트</p>
                <ul class="other_festival_ul" id="fstvlList">    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=c983ca5d-b114-4749-bdd1-9ca6989bb4a9">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_c983ca5d-b114-4749-bdd1-9ca6989bb4a9_1.jpg" alt="거제 옥포대첩 축제 2019(2)" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>거제 옥포대첩 축제</strong>				<div class="date">2023.06.16~2023.06.18</div>				<div class="loc">경상남도 거제시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=eedd3a2f-ae94-41ad-8b8d-cc941db88e67">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_eedd3a2f-ae94-41ad-8b8d-cc941db88e67_1.jpg" alt="경주술술페스티벌_10" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>경주술술페스티벌</strong>				<div class="date">2023.06.16~2023.06.18</div>				<div class="loc">경상북도 경주시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=9f5b4b9f-ae7e-4943-843b-85bc0ab7480d">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_9f5b4b9f-ae7e-4943-843b-85bc0ab7480d_1.png" alt="고창 복분자와 수박축제_포스터" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>고창복분자와 수박축제</strong>				<div class="date">2023.06.16~2023.06.18</div>				<div class="loc">전라북도 고창군</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=a8478f7f-2acc-48ef-a879-cfdd7f7b5852">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_a8478f7f-2acc-48ef-a879-cfdd7f7b5852_1.JPG" alt="광주문화재야행 '동구 달빛걸음' 2019(1)" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>광주문화재야행</strong>				<div class="date">2023.06.16~2023.06.17</div>				<div class="loc">광주 동구</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=d4cc7444-ffa9-41e9-ac22-3ab1f2bcae81">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_d4cc7444-ffa9-41e9-ac22-3ab1f2bcae81_1.png" alt="군산 수제맥주&amp;블루스 페스티벌_포스터" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>군산 수제맥주&amp;블루스 페스티벌</strong>				<div class="date">2023.06.16~2023.06.18</div>				<div class="loc">전라북도 군산시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=38e0bdc9-2b59-4f07-bdcf-8e86ef253ef4">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_38e0bdc9-2b59-4f07-bdcf-8e86ef253ef4_1.jpg" alt="서초뮤직앤아트페스티벌_포스터" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>서초뮤직앤아트페스티벌</strong>				<div class="date">2023.06.16~2023.06.17</div>				<div class="loc">서울 서초구</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=355a548e-438e-4745-b388-774b506f3030">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_355a548e-438e-4745-b388-774b506f3030_1.JPG" alt="퇴촌 토마토축제 2018 (3)" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>퇴촌 토마토축제</strong>				<div class="date">2023.06.16~2023.06.18</div>				<div class="loc">경기도 광주시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=de4298a3-cec3-49c4-b19a-78915289c894">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_de4298a3-cec3-49c4-b19a-78915289c894_1.jpg" alt="충주 다이브 페스티벌 (4)" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>충주 다이브 페스티벌</strong>				<div class="date">2023.06.15~2023.06.18</div>				<div class="loc">충청북도 충주시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=6532fe6f-d050-4e22-afb8-c08becc61465">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_6532fe6f-d050-4e22-afb8-c08becc61465_1.jpg" alt="춘천 막국수닭갈비축제_포스터" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>춘천막국수닭갈비축제 </strong>				<div class="date">2023.06.13~2023.06.18</div>				<div class="loc">강원도 춘천시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=896e4892-138b-4fb4-bc77-7a04de3a5d3f">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_896e4892-138b-4fb4-bc77-7a04de3a5d3f_1.jpg" alt="Re:023 대전 엑스포93_포스터" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>Re:023 대전 엑스포93</strong>				<div class="date">2023.06.12~2023.08.27</div>				<div class="loc">대전 유성구</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=63b59f3c-3b9e-4a0a-aa50-0eccb74f96bb">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_63b59f3c-3b9e-4a0a-aa50-0eccb74f96bb_1.png" alt="남이섬 어쿠스틱 청춘 페스티벌_1" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>남이섬 어쿠스틱 청춘 페스티벌</strong>				<div class="date">2023.06.10~2023.06.18</div>				<div class="loc">강원도 춘천시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=99c16eae-7521-4a96-b243-1797a2c05139">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_99c16eae-7521-4a96-b243-1797a2c05139_1.jpg" alt="아침고요수목원 수국전시회_4" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>아침고요 수국전시회</strong>				<div class="date">2023.06.10~2023.07.02</div>				<div class="loc">경기도 가평군</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=ffee2588-2551-4b83-a5ea-2a1d3a5b5aeb">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_ffee2588-2551-4b83-a5ea-2a1d3a5b5aeb_1.png" alt="이월드 트로피컬 아쿠아 빌리지_1" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>이월드 트로피컬 아쿠아 빌리지</strong>				<div class="date">2023.06.10~2023.08.27</div>				<div class="loc">대구 달서구</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=a93c2057-4e06-4abb-865c-2604f64b22d6">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_a93c2057-4e06-4abb-865c-2604f64b22d6_1.JPG" alt="양평 수미마을 메기수염축제_메인" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>양평메기수염축제</strong>				<div class="date">2023.06.06~2023.09.03</div>				<div class="loc">경기도 양평군</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=262b1b32-a27e-40d7-bf58-90f1e0d2a9a5">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_262b1b32-a27e-40d7-bf58-90f1e0d2a9a5_1.jpg" alt="베니스랜드 유럽수국축제_포스터" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>베니스랜드 유럽수국축제(야간개장)</strong>				<div class="date">2023.06.01~2023.07.31</div>				<div class="loc">제주도 서귀포시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=526a0fcf-111b-4db9-b609-0e9b520b4b4a">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_526a0fcf-111b-4db9-b609-0e9b520b4b4a_1.png" alt="이월드 사루비아 가든_배경" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>이월드 사루비아 가든</strong>				<div class="date">2023.06.01~2023.06.30</div>				<div class="loc">대구 달서구</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=978d8975-c368-4ab3-b6c9-a1803a99c147">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_978d8975-c368-4ab3-b6c9-a1803a99c147_1.jpg" alt="한림공원 수국축제_2" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>제주 한림공원 수국 축제</strong>				<div class="date">2023.06.01~2023.06.30</div>				<div class="loc">제주도 제주시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=62490e07-d830-4720-b528-88fbfd50c730">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_62490e07-d830-4720-b528-88fbfd50c730_1.png" alt="제주민속촌 수국축제_4" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>제주민속촌 수국축제</strong>				<div class="date">2023.06.01~2023.06.30</div>				<div class="loc">제주도 서귀포시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=5371392a-7201-4a95-bdd3-84487dcf38cd">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_5371392a-7201-4a95-bdd3-84487dcf38cd_1.PNG" alt="화담숲 여름 수국 축제_1" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>화담숲 여름 수국 축제</strong>				<div class="date">2023.06.01~2023.08.01</div>				<div class="loc">경기도 광주시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=08038b9e-b0de-4f2a-b4f4-f03675a63985">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_08038b9e-b0de-4f2a-b4f4-f03675a63985_1.JPG" alt="제주 비체올린 능소화축제_1" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>비체올린 능소화축제</strong>				<div class="date">2023.05.31~2023.07.31</div>				<div class="loc">제주도 제주시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=fb936bb1-1b77-40ed-9bb5-995f5c5abdae">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_fb936bb1-1b77-40ed-9bb5-995f5c5abdae_1.jpg" alt="율봄식물원 토마토 시즌_4" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>율봄식물원 토마토 시즌</strong>				<div class="date">2023.05.27~2023.07.30</div>				<div class="loc">경기도 광주시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=4dc65cd3-bdcd-40e2-bfbe-684501b7f268">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_4dc65cd3-bdcd-40e2-bfbe-684501b7f268_1.jpg" alt="고창 청농원 라벤더 축제 (3)" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>고창 청농원 라벤더 축제</strong>				<div class="date">2023.05.26~2023.06.25</div>				<div class="loc">전라북도 고창군</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=3f07c164-f919-4287-949a-34f65981eb2b">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_3f07c164-f919-4287-949a-34f65981eb2b_1.png" alt="휴애리 여름 수국축제_7" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>휴애리 여름 수국축제</strong>				<div class="date">2023.05.25~2023.07.20</div>				<div class="loc">제주도 서귀포시</div>	    	</div>		</a>    </li>    <li>		<a href="/kfes/detail/fstvlDetail.do?fstvlCntntsId=b8f9f3e0-3144-4482-855b-012cca641893">	    	<div class="other_festival_img  open">				<img src="https://korean.visitkorea.or.kr/kfes/upload/contents/db/300_b8f9f3e0-3144-4482-855b-012cca641893_1.png" alt="DMZ OPEN 페스티벌_1" onerror="this.src='/kfes/resources/img/default_list.png';">				<div class="sing_area">		    		<div class="blind">문화 관광 축제</div>				</div>	    	</div>	    	<div class="other_festival_content">				<strong>DMZ OPEN 페스티벌</strong>				<div class="date">2023.05.20~2023.11.11</div>				<div class="loc">경기도 파주시</div>	    	</div>		</a>    </li></ul>
            </div>
            <!--// 축제일순 -->
            <!-- 인기순 -->
            <div class="tab_cont" aria-expanded="false" role="application">
                <p class="blind">인기순 리스트</p>
                <ul class="other_festival_ul" id="fstvlLikeOrderList"></ul>
            </div>
            <!--// 인기순 -->

            <!-- 더보기 button -->
            <button class="list_more_btn" style="" id="btnMore" onclick="javascript:;">더보기 (24/1019)</button>
            <!-- //더보기 button -->
        </div>

    </div>
</div>
</section>
@endsection