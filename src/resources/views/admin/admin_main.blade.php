@extends('layout.adminlayout')

@section('title','관리자 메인 페이지')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>관리자 페이지 Main Dashboard</h1>
    {{-- <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html"> </a></li>
        <li class="breadcrumb-item active"> </li>
      </ol>
    </nav> --}}
    <br>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- 회원수 관리 Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                  <li><a class="dropdown-item" href="#">ALL</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title"><a href="{{ route('admin.user') }}">회원 </a><span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    {{-- <h6>{{ $useralldatacount }}</h6>  전체 회원수 --}}
                    <h6>{{ $userdatacount }}</h6>  {{-- 전체-블랙수 --}}
                    <span class="text-muted small pt-2 ps-1">블랙수</span>
                    <span class="text-success small pt-1 fw-bold">{{ ROUND(((($useralldatacount-$userdatacount)*100)/( $useralldatacount)),1) }}%({{$useralldatacount-$userdatacount}})</span>{{-- <span class="text-muted small pt-2 ps-1">추가 회원수</span> --}}
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- 축제 수 Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                  <li><a class="dropdown-item" href="#">ALL</a></li>

                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">
                  {{-- <a href="#adminfest"> --}}
                    축제 
                  {{-- </a> --}}
                  <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-star"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $festivaldatacount }}</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                    <br>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- 게시글 Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                  <li><a class="dropdown-item" href="#">ALL</a></li>

                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">게시글 <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-card-text"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $boarddatacount }}</h6>
                    <span class="text-muted small pt-2 ps-1">새글</span>
                    {{-- <span class="text-success small pt-1 fw-bold">{{ ROUND(((($useralldatacount-$userdatacount)*100)/( $useralldatacount)),1) }}%({{$useralldatacount-$userdatacount}})</span><span class="text-muted small pt-2 ps-1">추가 회원수</span> --}}
                  
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Reports <span>/Today</span></h5>

                <!-- Line Chart -->
                <div id="reportsChart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Sales',
                        data: [31, 40, 28, 51, 42, 82, 56],
                      }, {
                        name: 'Revenue',
                        data: [11, 32, 45, 32, 34, 52, 41]
                      }, {
                        name: 'Customers',
                        data: [15, 11, 32, 18, 9, 24, 11]
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a', '#ff771d'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

          <!-- 게시글 -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">게시글 <span>| Today</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Title</th>
                      <th scope="col">ID</th>
                      <th scope="col">닉네임</th>
                      <th scope="col">작성일</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($boarddata as $data)
                    <tr>
                      <th scope="row"><a href="#"><img src="" alt="">{{ $data->board_id }}</a></th>
                      <td><a href="#" class="text-primary fw-bold">{{ $data->board_title }}</a></td>
                      <td>{{ $data->user_id }}</td>
                      <td class="fw-bold">{{ $data->user_nickname }}</td>
                      <td>{{ $data->created_at }}</td>
                    </tr>
                    @empty
                    <tr>
                      <th scope="row">게시글 없음</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- 신고관리 admin/report -->
        {{-- https://jisu069.tistory.com/m/91 --}}
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body" style="width: 90%">
            <h5 class="card-title text-dark"><a href="{{ route("admin.report") }}">신고 관리 </a><span>| Today</span>
              <span class="" style="float: right ">처리안된 신고 : {{ $reporthandle_flg0 }} 개</span>
            </h5>

            <div class="activity">
              @forelse($reportdata as $val)
                <div class="activity-item d-flex">
                  <div class="activite-label">{{ $val->created_at }}  </div>

                  {{-- 처리에 따른 동그라미 색깔 --}}
                  {{-- success_초록 danger_빨강 primary_파랑 info_민트 warning_노랑 muted_검정 --}}
                  @if($val->handle_flg == '0') {{-- 0.삭제완료.red --}}
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  @elseif($val->handle_flg == '1') {{-- 1.기각처리.gray --}}
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  @else  {{-- NULL.처리안된신고. --}}
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  @endif

                  <div class="activity-content">
                    @switch( $val->report_no )
                      @case('0')
                        영리/홍보 (
                          @if($val->report_detail == '')
                            상세 내용이 없습니다.
                          @else
                            {{$val->report_detail;}}
                          @endif
                          )
                        @break
                      @case('1')
                        음란물 (
                          @if($val->report_detail == '')
                            상세 내용이 없습니다.
                          @else
                            {{$val->report_detail;}}
                          @endif
                          )
                        @break
                      @case('2')
                        욕설/비하 (
                          @if($val->report_detail == '')
                            상세 내용이 없습니다.
                          @else
                            {{$val->report_detail;}}
                          @endif
                          )
                        @break
                      @case('3')
                        신상노출 (
                          @if($val->report_detail == '')
                            상세 내용이 없습니다.
                          @else
                            {{$val->report_detail;}}
                          @endif
                          )
                        @break
                      @case('4')
                        도배 (
                          @if($val->report_detail == '')
                            상세 내용이 없습니다.
                          @else
                            {{$val->report_detail;}}
                          @endif
                          )
                        @break
                      $@default
                        기타 (
                          @if($val->report_detail == '')
                            상세 내용이 없습니다.
                          @else
                            {{$val->report_detail;}}
                          @endif
                          )
                    @endswitch
                  </div>
                </div><!-- End activity item-->
              @empty
                
              @endforelse
            </div>

          </div>
        </div><!-- End Recent Activity -->

        <!-- 각 지역 축제수/검색량 Budget Report -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">각 지역 축제수/조회수 <span>| This Month</span></h5>

            <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                  legend: {
                    data: ['축제수', '조회수']
                  },
                  radar: {
                    // shape: 'circle',
                    indicator: [{
                        name: 'Sales',
                        max: 6500
                      },
                      {
                        name: 'Administration',
                        max: 16000
                      },
                      {
                        name: 'Information Technology',
                        max: 30000
                      },
                      {
                        name: 'Customer Support',
                        max: 38000
                      },
                      {
                        name: 'Development',
                        max: 52000
                      },
                      {
                        name: 'Marketing',
                        max: 25000
                      }
                    ]
                  },
                  series: [{
                    name: 'Budget vs spending',
                    type: 'radar',
                    data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: '축제수'
                      },
                      {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: '조회수'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Budget Report -->


        
        <!-- 축제 인기순 TOP 5 Website Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">축제 인기순 TOP 5 <span>| Today</span></h5>
            
            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [
                      {
                        value: {{$festivaltop10[0]->festival_hit}},
                        name: '{{$festivaltop10[0]->festival_title}}'
                      },
                      {
                        value: {{$festivaltop10[1]->festival_hit}},
                        name: '{{$festivaltop10[1]->festival_title}}'
                      },
                      {
                        value: {{$festivaltop10[2]->festival_hit}},
                        name: '{{$festivaltop10[2]->festival_title}}'
                      },
                      {
                        value: {{$festivaltop10[3]->festival_hit}},
                        name: '{{$festivaltop10[3]->festival_title}}'
                      },
                      {
                        value: {{$festivaltop10[4]->festival_hit}},
                        name: '{{$festivaltop10[4]->festival_title}}'
                      }

                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->

      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->
@endsection