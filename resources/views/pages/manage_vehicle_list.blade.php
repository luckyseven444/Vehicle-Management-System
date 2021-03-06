@extends('layouts.app')
@section('title', 'Add Vehicle')
@section('content')
    <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
        <div class="app-header white box-shadow navbar-md">
            <div class="navbar">
                <!-- Open side - Naviation on mobile -->
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
                    <i class="material-icons"></i>
                </a>
                <!-- / -->

                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>

                <!-- navbar right -->
                <ul class="nav navbar-nav pull-right">
                    <li class="nav-item dropdown pos-stc-xs">
                        <!-- dropdown -->
                        <div class="dropdown-menu pull-right w-xl animated fadeInUp no-bg no-border no-shadow">
                            <div class="scrollable" style="max-height: 220px">
                                <ul class="list-group list-group-gap m-a-0">
                                    <li class="list-group-item black lt box-shadow-z0 b">
          <span class="pull-left m-r">
            <img src="../assets/images/a0.jpg" alt="..." class="w-40 img-circle">
          </span>
                                        <span class="clear block">
            Use awesome <a href="" class="text-primary">animate.css</a><br>
            <small class="text-muted">10 minutes ago</small>
          </span>
                                    </li>
                                    <li class="list-group-item black lt box-shadow-z0 b">
          <span class="pull-left m-r">
            <img src="../assets/images/a1.jpg" alt="..." class="w-40 img-circle">
          </span>
                                        <span class="clear block">
            <a href="" class="text-primary">Joe</a> Added you as friend<br>
            <small class="text-muted">2 hours ago</small>
          </span>
                                    </li>
                                    <li class="list-group-item dark-white text-color box-shadow-z0 b">
          <span class="pull-left m-r">
            <img src="../assets/images/a2.jpg" alt="..." class="w-40 img-circle">
          </span>
                                        <span class="clear block">
            <a href="" class="text-primary">Danie</a> sent you a message<br>
            <small class="text-muted">1 day ago</small>
          </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- / dropdown -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link clear" href="" data-toggle="dropdown" aria-expanded="false">
          <span class="avatar w-32">
            <img src="../assets/images/a0.jpg" alt="...">
            <i class="on b-white bottom"></i>
          </span>
                        </a>
                        <div class="dropdown-menu pull-right dropdown-menu-scale">
                            <a class="dropdown-item" ui-sref="app.inbox.list">
                                <span>Inbox</span>
                                <span class="label warn m-l-xs">3</span>
                            </a>
                            <a class="dropdown-item" ui-sref="app.page.profile">
                                <span>Profile</span>
                            </a>
                            <a class="dropdown-item" ui-sref="app.page.setting">
                                <span>Settings</span>
                                <span class="label primary m-l-xs">3/9</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" ui-sref="app.docs">
                                Need help?
                            </a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"> logout </a>
                        </div>
                    </li>
                    <li class="nav-item hidden-md-up">
                        <a class="nav-link" data-toggle="collapse" data-target="#collapse" aria-expanded="true">
                            <i class="material-icons"></i>
                        </a>
                    </li>
                </ul>
                <!-- / navbar right -->

            </div>
        </div>
        <div class="padding"></div>
        <div class="padding">
            <div class="row">
                <div class="col-sm-12">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                </p>
                            @endif
                        @endforeach
                    </div>
                    <div class="padding">
                        <a class="btn btn-primary" href="register-vehile" role="button">Add Vehicle</a>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <h2>Driver List
                            </h2>
                        </div>
                        <div class="box-divider m-a-0">
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#
                                </th>
                                <th>Model
                                </th>
                                <th>Registration No.
                                </th>
                                <th>Chasis No.
                                </th>
                                <th>Engine No.
                                </th>
                                <th>Type
                                </th>
                                <th>Seats
                                </th>
                                <th>Owner
                                </th>
                                <th>Actions
                                </th>
                            </tr>
                            </thead>
                            @php
                            ($i=1)
                            @endphp
                            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$vehicle->model_no}}</td>
                        <td>{{$vehicle->registration_no}}</td>
                        <td>{{$vehicle->chassis_no}}</td>
                        <td>{{$vehicle->engine_no}}</td>
                        <td>{{$vehicle->vehicle->vehicle_type}}</td>
                        <td>{{$vehicle->number_of_seat}}</td>
                        <td>{{$vehicle->owner}}</td>

                        <td>

                            <a href="{{url('vehicle/update-vehicle?vehicle_id='.$vehicle->id)}}" class="btn btn-success">
                                <span>Edit</span>
                            </a>

                            <a href="{{url('vehicle/delete-vehicle?vehicle_id='.$vehicle->id)}}" class="btn btn-success"
                               onclick=" return confirm('are you sure to delele this')">
                                <span>Delete</span>
                            </a>
                        </td>

                    </tr>
                 @endforeach
                            </tbody>

            </table>
            {{$vehicles->links()}}

        </div>

    </div>
            </div>
        </div>
            </div>

@endsection
