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

                    <div class="card-body">
                      
                        {{-- Table of All ClassGroups --}}

                        <div>
                            <table class="datatable table table-striped">
                                <thead>
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Year</th>
                                    <th>Actions</th>
                                </thead>

                                <tbody>

                                    
                                    @foreach($classgroups as $classgroup)
                                        <tr>
                                            {{-- Name --}}
                                            <td>{{$classgroup->name." ".$classgroup->year}}</td>

                                            {{-- Program --}}
                                            <td>{{$classgroup->program->name}}</td>

                                            {{-- Year --}}
                                            <td>{{$classgroup->year}}</td>

                                            {{-- Actions --}}
                                            <td>
                                                <a title="View ClassGroup" style="color:black" href="{{route('show_classgroup',['classgroup'=>$classgroup])}}"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>

                            </table>

                            <div class="card-footer text-right">
                                {{-- <nav class="d-inline-block">
                                  <ul class="pagination mb-0"> --}}

                                    {{-- {{$classgroups->links()}} --}}

                                    {{-- <li class="page-item disabled">
                                      <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                      <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item">
                                      <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                                    </li> --}}
                                  {{-- </ul>
                                </nav> --}}
                              </div>


                        </div>
                     
                    </div>

                  </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Info</h4>
                    </div>
                    <div class="card-body">             
                      <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                          <img class="mr-3 rounded-circle" width="50" src="{{asset("img/avatar/avatar-1.jpeg")}}" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><small>10m</small></div>
                            <div class="media-title">Farhan A Mujib</div>
                            <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                          </div>
                        </li>
                        <li class="media">
                          <img class="mr-3 rounded-circle" width="50" src="{{asset("img/avatar/avatar-2.jpeg")}}" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><small>10m</small></div>
                            <div class="media-title">Ujang Maman</div>
                            <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                          </div>
                        </li>
                        <li class="media">
                          <img class="mr-3 rounded-circle" width="50" src="{{asset("img/avatar/avatar-3.jpeg")}}" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><small>10m</small></div>
                            <div class="media-title">Rizal Fakhri</div>
                            <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                          </div>
                        </li>
                        <li class="media">
                          <img class="mr-3 rounded-circle" width="50" src="{{asset("img/avatar/avatar-4.jpeg")}}" alt="avatar">
                          <div class="media-body">
                            <div class="float-right"><small>10m</small></div>
                            <div class="media-title">Alfa Zulkarnain</div>
                            <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                          </div>
                        </li>
                      </ul>
                      <div class="text-center">
                        <a href="#" class="btn btn-primary btn-round">
                          View All
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </section>
          </div>
    
    </x-layout>