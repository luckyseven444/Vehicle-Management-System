<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vehicle Management:@yield('title')</title>
    </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- styles imported from Flatkit -->
    <link rel="stylesheet" href="{{asset('assets/animate.css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/glyphicons/glyphicons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/material-design-icons/material-design-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />
    <!-- build:css ../assets/styles/app.min.css -->
    <link rel="stylesheet" href="{{asset('assets/styles/app.css')}}" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="{{asset('assets/styles/font.css')}}" type="text/css" />
</head>
<body>
<div class="app" id="app">
    <!-- ############ LAYOUT START-->
    <!-- aside -->
    <div id="aside" class="app-aside modal fade folded md nav-expand">
        <div class="left navside indigo-900 dk" layout="column">
            <div class="navbar navbar-md no-radius">
                <div>
                    <a class="navbar-brand" href="{{URL::to('role')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
                            <path d="M 4 4 L 44 4 L 44 44 Z" fill="#009688">
                            </path>
                            <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)">
                            </path>
                            <path d="M 4 4 L 24 4 L 4  44 Z" fill="#6cc788">
                            </path>
                        </svg>
                        <img src="../assets/images/logo.png" alt="." class="hide">
                        <span class="hidden-folded inline">Flatkit
                </span>
                    </a>
                </div>
            </div>
            
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('department')}}">
                      <span class="nav-icon">
                        <i class="material-icons md-18">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Department
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('employee')}}">
                      <span class="nav-icon">
                        <i class="fa fa-level-up">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Employee
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('vehicle')}}">
                      <span class="nav-icon">
                        <i class="fa fa-pencil">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Vehicle Category
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('add-vehicle')}}">
                      <span class="nav-icon">
                        <i class="fa fa-lg fa-google">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Vehicle List
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('driver')}}">
                      <span class="nav-icon">
                        <i class="on b-white bottom">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Driver
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('location')}}">
                      <span class="nav-icon">
                        <i class="fa fa-ellipsis-v">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Location
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('route')}}">
                      <span class="nav-icon">
                        <i class="fa fa-check">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Route
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('fitness')}}">
                      <span class="nav-icon">
                        <i class="material-icons">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Fitness
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('assign_driver')}}">
                      <span class="nav-icon">
                        <i class="fa fa-level-up">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Assign Driver
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('vehicle_and_route')}}">
                      <span class="nav-icon">
                        <i class="fa fa-level-down">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Vehicle & Route
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('seat_assign')}}">
                      <span class="nav-icon">
                        <i class="on b-white bottom">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Seat Assign
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('private_vehicle')}}">
                      <span class="nav-icon">
                        <i class="fa fa-ellipsis-v">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Private Vehicle
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('seat-allocation-report')}}">
                      <span class="nav-icon">
                        <i class="fa fa-check">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Report:Seat Assign
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- / aside -->
@yield('content')
<!-- ############ PAGE END-->
    <!-- / -->
    <!-- theme switcher -->

    <!-- / -->
    <!-- ############ LAYOUT END-->
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}">
</script>
<script>
    $(function () {
            $("body").on("click", '.add', function () {
                    var html = $('.ss').html();
                    $('.appendHere').after('<div class="form-group row remv">' + html + '</div>');
                }
            );
            $("body").on("click", '.remove', function () {
                    $(this).parentsUntil().closest('.remv').remove();
                }
            );
            $('.stoppage').click(function() {
                    var id = $(this).attr('id');
                    $.ajax({
                            type: "GET",
                            url:'{{url('get-stoppage-data?route_id=')}}'+id,
                            success: function(response){
                                $('.append-stoppage').html(response);
                            }
                        }
                    );
                }
            );
        }
    );
    $(document).ready(function () {
            $('#route').on('change', function () {
                    var route_id = $(this).val();
                    if (route_id) {
                        $.ajax({
                                type: 'post',
                                url: '{{url('get-vehicle-by-route')}}',
                                data: {
                                    _token: '<?php echo csrf_token() ?>', route: route_id}
                                ,
                                success: function (html) {
                                    $('#vehicle').html(html);
                                }
                            }
                        );
                    }
                }
            );
        }
    );
    $(document).ready(function () {
            $('#vehicle').on('change', function () {
                    var vehicle_id = $(this).val();
                    if (vehicle_id) {
                        $.ajax({
                                type: 'post',
                                url: '{{url('get-seat-by-vehicle')}}',
                                data: {
                                    _token: '<?php echo csrf_token() ?>', vehicle: vehicle_id}
                                ,
                                success: function (html) {
                                    $('#seat').html(html);
                                }
                            }
                        );
                    }
                }
            );
        }
    );
</script>
<!-- jQuery -->
<script src="{{asset('libs/jquery/jquery/dist/jquery.js')}}">
</script>
<!-- Bootstrap -->
<script src="{{asset('libs/jquery/tether/dist/js/tether.min.js')}}">
</script>
<script src="{{asset('libs/jquery/bootstrap/dist/js/bootstrap.js')}}">
</script>
<!-- core -->
<script src="{{asset('libs/jquery/underscore/underscore-min.js')}}">
</script>
<script src="{{asset('libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js')}}">
</script>
<script src="{{asset('libs/jquery/PACE/pace.min.js')}}">
</script>
<script src="{{asset('html/scripts/config.lazyload.js')}}">
</script>
<script src="{{asset('html/scripts/palette.js')}}">
</script>
<script src="{{asset('html/scripts/ui-load.js')}}">
</script>
<script src="{{asset('html/scripts/ui-jp.js')}}">
</script>
<script src="{{asset('html/scripts/ui-include.js')}}">
</script>
<script src="{{asset('html/scripts/ui-device.js')}}">
</script>
<script src="{{asset('html/scripts/ui-form.js')}}">
</script>
<script src="{{asset('html/scripts/ui-nav.js')}}">
</script>
<script src="{{asset('html/scripts/ui-screenfull.js')}}">
</script>
<script src="{{asset('html/scripts/ui-scroll-to.js')}}">
</script>
<script src="{{asset('html/scripts/ui-toggle-class.js')}}">
</script>
<script src="{{asset('html/scripts/app.js')}}">
</script>
<!-- ajax -->
<script src="{{asset('libs/jquery/jquery-pjax/jquery.pjax.js')}}">
</script>
<script src="{{asset('html/scripts/ajax.js')}}">
</script>
<!-- endbuild -->
</body>
</html>
