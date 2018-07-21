@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('content')
  @include('multiAuth.admin.inc.sidebar')
  <div class="main-panel">
      @include('multiAuth.admin.inc.navbar')
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-4">
                      <div class="card ">
                          <div class="card-header ">
                              <h4 class="card-title">Email Statistics</h4>
                              <p class="card-category">Last Campaign Performance</p>
                          </div>
                          <div class="card-body ">
                              <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                          </div>
                          <div class="card-footer ">
                              <div class="legend">
                                  <i class="fa fa-circle text-info"></i> Open
                                  <i class="fa fa-circle text-danger"></i> Bounce
                                  <i class="fa fa-circle text-warning"></i> Unsubscribe
                              </div>
                              <hr>
                              <div class="stats">
                                  <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="card ">
                          <div class="card-header ">
                              <h4 class="card-title">Users Behavior</h4>
                              <p class="card-category">24 Hours performance</p>
                          </div>
                          <div class="card-body ">
                              <div id="chartHours" class="ct-chart"></div>
                          </div>
                          <div class="card-footer ">
                              <div class="legend">
                                  <i class="fa fa-circle text-info"></i> Open
                                  <i class="fa fa-circle text-danger"></i> Click
                                  <i class="fa fa-circle text-warning"></i> Click Second Time
                              </div>
                              <hr>
                              <div class="stats">
                                  <i class="fa fa-history"></i> Updated 3 minutes ago
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="card ">
                          <div class="card-header ">
                              <h4 class="card-title">2017 Sales</h4>
                              <p class="card-category">All products including Taxes</p>
                          </div>
                          <div class="card-body ">
                              <div id="chartActivity" class="ct-chart"></div>
                          </div>
                          <div class="card-footer ">
                              <div class="legend">
                                  <i class="fa fa-circle text-info"></i> Tesla Model S
                                  <i class="fa fa-circle text-danger"></i> BMW 5 Series
                              </div>
                              <hr>
                              <div class="stats">
                                  <i class="fa fa-check"></i> Data information certified
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card  card-tasks">
                          <div class="card-header ">
                              <h4 class="card-title">Tasks</h4>
                              <p class="card-category">Backend development</p>
                          </div>
                          <div class="card-body ">
                              <div class="table-full-width">
                                  <table class="table">
                                      <tbody>
                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <label class="form-check-label">
                                                          <input class="form-check-input" type="checkbox" value="">
                                                          <span class="form-check-sign"></span>
                                                      </label>
                                                  </div>
                                              </td>
                                              <td>Sign contract for "What are conference organizers afraid of?"</td>
                                              <td class="td-actions text-right">
                                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <label class="form-check-label">
                                                          <input class="form-check-input" type="checkbox" value="" checked>
                                                          <span class="form-check-sign"></span>
                                                      </label>
                                                  </div>
                                              </td>
                                              <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                              <td class="td-actions text-right">
                                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <label class="form-check-label">
                                                          <input class="form-check-input" type="checkbox" value="" checked>
                                                          <span class="form-check-sign"></span>
                                                      </label>
                                                  </div>
                                              </td>
                                              <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                              </td>
                                              <td class="td-actions text-right">
                                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <label class="form-check-label">
                                                          <input class="form-check-input" type="checkbox" checked>
                                                          <span class="form-check-sign"></span>
                                                      </label>
                                                  </div>
                                              </td>
                                              <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                              <td class="td-actions text-right">
                                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <label class="form-check-label">
                                                          <input class="form-check-input" type="checkbox" value="">
                                                          <span class="form-check-sign"></span>
                                                      </label>
                                                  </div>
                                              </td>
                                              <td>Read "Following makes Medium better"</td>
                                              <td class="td-actions text-right">
                                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <label class="form-check-label">
                                                          <input class="form-check-input" type="checkbox" value="" disabled>
                                                          <span class="form-check-sign"></span>
                                                      </label>
                                                  </div>
                                              </td>
                                              <td>Unfollow 5 enemies from twitter</td>
                                              <td class="td-actions text-right">
                                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                      <i class="fa fa-edit"></i>
                                                  </button>
                                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                          <div class="card-footer ">
                              <hr>
                              <div class="stats">
                                  <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @include('multiAuth.admin.inc.footer')
  </div>
@endsection

@section('style')
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
@stop

@section('script')
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Chartist Plugin  -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
  <script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
@stop
