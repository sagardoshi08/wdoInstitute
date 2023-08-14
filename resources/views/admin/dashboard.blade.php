@include('admin.include.header')
<style type="text/css">
  .text-danger{
    color : #EF4444 !important;
  }
  .text-success{
    color: #24B183 !important;
  }
</style>
        <div class="dashboard-wrap">
          <div class="container">
              <h1 class="mt-4">Dashboard</h1>
              <ul class="nav nav-tabs mt-4" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">This Week</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">This Month</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">This Year</a>
                  </li>
              </ul><!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane active" id="tabs-1" role="tabpanel">
                      <div class="tab-holder">
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Visitors</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['visitor_count_week'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                  <i class="bi bi-credit-card"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['visitor_week'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['visitor_week'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(number_format(dashboard_count_percent()['visitor_week'],2))}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last week</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['user_count_week'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                  <i class="bi bi-people"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['user_week'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['user_week'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i> {{abs(number_format(dashboard_count_percent()['user_week'],2))}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last week</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Pages</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['page_count_week'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                  <i class="fa fa-clock-history"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['page_week'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['page_week'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(number_format(dashboard_count_percent()['page_week'],2))}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last week</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="tabs-2" role="tabpanel">
                      <div class="tab-holder">
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Visitors</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['visitor_count_month'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                  <i class="fa fa-credit-card"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['visitor_month'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['visitor_month'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(number_format(dashboard_count_percent()['visitor_month'],2))}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last month</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['user_count_month'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                  <i class="fa fa-people"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['user_month'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['user_month'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(number_format(dashboard_count_percent()['user_month'],2))}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last month</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Pages</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['page_count_month'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                  <i class="fa fa-clock-history"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['page_month'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['page_month'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(number_format(dashboard_count_percent()['page_month'],2))}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last month</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="tabs-3" role="tabpanel">
                      <div class="tab-holder">
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Visitors</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['visitor_count_year'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                  <i class="fa fa-credit-card"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['visitor_year'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['visitor_year'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(number_format(dashboard_count_percent()['visitor_year'],2))}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last year</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['user_count_year'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                  <i class="fa fa-people"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['user_year'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['user_year'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(dashboard_count_percent()['user_year'])}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last year</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="each-tab-section">
                              <div class="card shadow border-0">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col">
                                              <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Pages</span>
                                              <span class="h3 font-bold mb-0">{{ dashboard_count()['page_count_year'] }}</span>
                                          </div>
                                          <div class="col-auto">
                                              <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                  <i class="fa fa-clock-history"></i>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-0 text-sm">
                                          <span class="badge badge-pill {{dashboard_count_percent()['page_year'] >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger'}} me-2">
                                              <i class="fa fa-{{dashboard_count_percent()['page_year'] >= 0 ? 'arrow-up' : 'arrow-down'}} me-1"></i>{{abs(dashboard_count_percent()['page_year'])}}%
                                          </span>
                                          <span class="text-nowrap text-xs text-muted">Since last year</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@include('admin.include.footer')
