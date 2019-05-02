@extends('layouts.app')
@section('title', 'Add Vehicle')
@section('content')
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
            <div>
                <div class="navbar">
                    <!-- Open side - Naviation on mobile -->
                    <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
                        <i class="material-icons">&#xe5d2;
                        </i>
                    </a>
                    <!-- / -->
                    <!-- Page title - Bind to $state's title -->
                    <div class="navbar-item pull-left h5" id="pageTitle">
                    </div>
                    <!-- navbar right -->
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item dropdown pos-stc-xs">
                            <a class="nav-link" href data-toggle="dropdown">
                                <i class="material-icons">&#xe7f5;
                                </i>
                                <span class="label label-sm up warn">3
              </span>
                            </a>
                            <div>
                                <!-- dropdown -->
                                <div class="dropdown-menu pull-right w-xl animated fadeInUp no-bg no-border no-shadow">
                                    <div class="scrollable" style="max-height: 220px">
                                        <ul class="list-group list-group-gap m-a-0">
                                            <li class="list-group-item black lt box-shadow-z0 b">
                      <span class="pull-left m-r">
                        <img src="../assets/images/a0.jpg" alt="..." class="w-40 img-circle">
                      </span>
                                                <span class="clear block">
                        Use awesome
                        <a href class="text-primary">animate.css
                        </a>
                        <br>
                        <small class="text-muted">10 minutes ago
                        </small>
                      </span>
                                            </li>
                                            <li class="list-group-item black lt box-shadow-z0 b">
                      <span class="pull-left m-r">
                        <img src="../assets/images/a1.jpg" alt="..." class="w-40 img-circle">
                      </span>
                                                <span class="clear block">
                        <a href class="text-primary">Joe
                        </a> Added you as friend
                        <br>
                        <small class="text-muted">2 hours ago
                        </small>
                      </span>
                                            </li>
                                            <li class="list-group-item dark-white text-color box-shadow-z0 b">
                      <span class="pull-left m-r">
                        <img src="../assets/images/a2.jpg" alt="..." class="w-40 img-circle">
                      </span>
                                                <span class="clear block">
                        <a href class="text-primary">Danie
                        </a> sent you a message
                        <br>
                        <small class="text-muted">1 day ago
                        </small>
                      </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- / dropdown -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link clear" href data-toggle="dropdown">
              <span class="avatar w-32">
                <img src="../assets/images/a0.jpg" alt="...">
                <i class="on b-white bottom">
                </i>
              </span>
                            </a>
                            <div>
                                <div class="dropdown-menu pull-right dropdown-menu-scale">
                                    <a class="dropdown-item" ui-sref="app.inbox.list">
                  <span>Inbox
                  </span>
                                        <span class="label warn m-l-xs">3
                  </span>
                                    </a>
                                    <a class="dropdown-item" ui-sref="app.page.profile">
                  <span>Profile
                  </span>
                                    </a>
                                    <a class="dropdown-item" ui-sref="app.page.setting">
                  <span>Settings
                  </span>
                                        <span class="label primary m-l-xs">3/9
                  </span>
                                    </a>
                                    <div class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" ui-sref="app.docs">
                                        Need help?
                                    </a>
                                    <a class="dropdown-item" ui-sref="access.signin">Sign out
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item hidden-md-up">
                            <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                                <i class="material-icons">&#xe5d4;
                                </i>
                            </a>
                        </li>
                    </ul>
                    <!-- / navbar right -->
                    <!-- navbar collapse -->
                    <div class="collapse navbar-toggleable-sm" id="collapse">
                        <div>
                            <!-- search form -->
                            <form class="navbar-form form-inline pull-right pull-none-sm navbar-item v-m" role="search">
                                <div class="form-group l-h m-a-0">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control p-x b-a rounded" placeholder="Search projects...">
                                        <span class="input-group-btn">
                    <button type="submit" class="btn white b-a rounded no-shadow">
                      <i class="fa fa-search">
                      </i>
                    </button>
                  </span>
                                    </div>
                                </div>
                            </form>
                            <!-- / search form -->
                        </div>
                        <!-- link and dropdown -->
                        <ul class="nav navbar-nav">
                            <li class="nav-item dropdown">

                                <div>
                                    <div class="dropdown-menu dropdown-menu-scale">
                                        <a class="dropdown-item" >
                    <span>Inbox
                    </span>
                                        </a>
                                        <a class="dropdown-item" >
                    <span>Todo
                    </span>
                                        </a>
                                        <a class="dropdown-item" >
                    <span>Note
                    </span>
                                            <span class="label primary m-l-xs">3
                    </span>
                                        </a>
                                        <div class="dropdown-divider">
                                        </div>
                                        <a class="dropdown-item" >Contact
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- / -->
                    </div>
                    <!-- / navbar collapse -->
                </div>
            </div>
        </div>
        <div class="padding"></div>
        <div class="padding">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add Driver Info.</div>
                            <div class="panel-body">
                        {!! Form::model($vehicle,['url' => $vehicle ? 'vehicle/'.$vehicle->id.'/update' : 'vehicle/vehicle-store',
                        'method'=>'post','file'=>true]) !!}


                        <div class="form-group row ">
                            {!! Form::label('model_no', 'Model No:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('model_no', null, ['class' => 'form-control', 'placeholder' => 'Model No']) !!}
                                <div class="error">{{ $errors->first('model_no') }}</div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            {!! Form::label('registration_no', 'Register Number:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('registration_no', null, ['class' => 'form-control', 'placeholder' => 'Register Number']) !!}
                                <div class="error">{{ $errors->first('registration_no') }}</div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            {!! Form::label('chassis_no', 'Chassis No:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('chassis_no', null, ['class' => 'form-control', 'placeholder' => 'Chassis No']) !!}
                                <div class="error">{{ $errors->first('chassis_no') }}</div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            {!! Form::label('engine_no', 'Engine No:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('engine_no', null, ['class' => 'form-control', 'placeholder' => 'Engine No']) !!}
                                <div class="error">{{ $errors->first('engine_no') }}</div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            {!! Form::label('vehicle_type', 'Vehicle Type:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::select('vehicle_type',$vehicles, null, ['class' => 'form-control', 'placeholder' => 'Select Here....']) !!}
                                <div class="error">{{ $errors->first('vehicle_type') }}</div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            {!! Form::label('number_of_seat', 'Number Of Seat:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('number_of_seat', null, ['class' => 'form-control', 'placeholder' => 'Number Of Seat']) !!}
                                <div class="error">{{ $errors->first('number_of_seat') }}</div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            {!! Form::label('owner', 'Owner:', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('owner', null, ['class' => 'form-control', 'placeholder' => 'Owner']) !!}
                                <div class="error">{{ $errors->first('owner') }}</div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-lg-10 col-lg-offset-2">
                                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
        </div>
    </div>
@endsection

