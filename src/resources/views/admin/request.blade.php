@extends('layout.adminlayout')

@section('title','축제 요청 관리')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
    <h1>축제 요청 관리</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">메인</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">유저</a></li> --}}
            <li class="breadcrumb-item active">축제 요청 관리</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
    </section>

</main><!-- End #main -->

<script>
        function popup1(e){
            var url = "{!! route('report.article') !!}";
            url = url + '?id=' + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }

        function popup2(e){
            var url = "{!! route('report.comment') !!}";
            url = url + '?id=' + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }

        function popup3(e){
            var url = "{!! route('report.user') !!}";
            url = url + '?id=' + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }
</script>

@endsection