<x-layout>

        <div class="main-content">
            <section class="section">
              <h1 class="section-header">
                <div>Class Groups</div>
              </h1>
{{-- 
              <div class="row">

                <div class="col-lg-3 col-md-6 col-12">
                  <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                      <i class="ion ion-person"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Admin</h4>
                      </div>
                      <div class="card-body">
                        10
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                  <div class="card card-sm-3">
                    <div class="card-icon bg-danger">
                      <i class="ion ion-ios-paper-outline"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>News</h4>
                      </div>
                      <div class="card-body">
                        42
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                  <div class="card card-sm-3">
                    <div class="card-icon bg-warning">
                      <i class="ion ion-paper-airplane"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Reports</h4>
                      </div>
                      <div class="card-body">
                        1,201
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-12">
                  <div class="card card-sm-3">
                    <div class="card-icon bg-success">
                      <i class="ion ion-record"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Online Users</h4>
                      </div>
                      <div class="card-body">
                        47
                      </div>
                    </div>
                  </div>
                </div>   

              </div> --}}

              <div class="row">

                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                  <div class="card">

                    <div class="card-header">
                      <div class="float-right">
                        <div class="btn-group">
                          {{-- <a href="#" class="btn active">Week</a>
                          <a href="#" class="btn">Month</a>
                          <a href="#" class="btn">Year</a> --}}
                        </div>
                      </div>
                      <h4>All</h4>
                    </div>

                    <div class="card-body row">
                      
                        {{-- A div to show the updates and issues at hand  --}}
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="card">
                              <div class="card-header">
                                <div class="float-right">
                                  <div class="btn-group">
                                    <a href="#summary-chart" data-tab="summary-tab" class="btn">Chart</a>
                                    <a href="#summary-text" data-tab="summary-tab" class="btn active">Text</a>
                                  </div>
                                </div>
                                <h4>Summary</h4>
                              </div>
                              <div class="card-body">
                                <div class="summary">
                                  <div class="summary-info active" data-tab-group="summary-tab" id="summary-text">
                                    <h4>$1,858</h4>
                                    <div class="text-muted">Sold 4 items on 2 customers</div>
                                    <div class="d-block mt-2">                              
                                      <a href="#">View All</a>
                                    </div>
                                  </div>
                                  <div class="summary-chart" data-tab-group="summary-tab" id="summary-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="myChart" height="343" style="display: block; height: 275px; width: 550px;" width="687" class="chartjs-render-monitor"></canvas>
                                  </div>
                                  <div class="summary-item">
                                    <h6>Item List <span class="text-muted">(4 Items)</span></h6>
                                    <ul class="list-unstyled list-unstyled-border">
                                      <li class="media">
                                        <a href="#">
                                          <img alt="image" class="mr-3 rounded" width="50" src="../dist/img/p-50.png">
                                        </a>
                                        <div class="media-body">
                                          <div class="media-right">$805</div>
                                          <div class="media-title"><a href="#">Macbook Pro</a></div>
                                          <small class="text-muted">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday</small>
                                        </div>
                                      </li>
                                      <li class="media">
                                        <a href="#">
                                          <img alt="image" class="mr-3 rounded" width="50" src="../dist/img/p-50.png">
                                        </a>
                                        <div class="media-body">
                                          <div class="media-right">$405</div>
                                          <div class="media-title"><a href="#">PlayStation 4</a></div>
                                          <small class="text-muted">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday</small>
                                        </div>
                                      </li>
                                      <li class="media">
                                        <a href="#">
                                          <img alt="image" class="mr-3 rounded" width="50" src="../dist/img/p-50.png">
                                        </a>
                                        <div class="media-body">
                                          <div class="media-right">$499</div>
                                          <div class="media-title"><a href="#">Drone</a></div>
                                          <small class="text-muted">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday
                                          </small>
                                        </div>
                                      </li>
                                      <li class="media">
                                        <a href="#">
                                          <img alt="image" class="mr-3 rounded" width="50" src="../dist/img/p-50.png">
                                        </a>
                                        <div class="media-body">
                                          <div class="media-right">$149</div>
                                          <div class="media-title"><a href="#">Xiaomi Redmi 4A</a></div>
                                          <small class="text-muted">by <a href="#">Kusnaedi</a> <div class="bullet"></div> Tuesday
                                          </small>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        
                     
                    </div>

                  </div>
                </div>

           
              </div>

            </section>
          </div>
    
    </x-layout>