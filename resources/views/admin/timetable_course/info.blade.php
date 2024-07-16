<x-layout>

  <script>
    $(document).ready(function() {
        // Check if a Generate timetable Job is running
        function check_if_timetable_generation_active(){    
          $.ajax({
              type: "GET",
              url: "/timetable_generation_active",
              cache: false,
              success: function (data) {
                // console.log(data);
                if(data == 1){
                  trigger_dynamic_update();
                }else{
                  
                }
              },
              error: function(err) {
                  console.log("Error from Ajax Call on info page -"+err);
              }
          });
        }

      setInterval(check_if_timetable_generation_active, 1000);
    });
  </script>

    <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Timetable Info</div>
          </h1>


          <div class="row">

            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
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
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="float-right">
                              <div class="btn-group">
                                {{-- <a href="#summary-chart" data-tab="summary-tab" class="btn">Chart</a> --}}
                                {{-- if allocations are not  complete --}}
                                @if(App\Models\Course::fully_assigned_forSem($semester) == true )
                                    <a href="{{route('generate_timetable',['semester'=>$semester->id])}}" data-tab="summary-tab" class="float-end btn btn-primary">Generate Timetable</a>
                                @else
                                    <a href="#summary-text" data-tab="summary-tab" class="btn active">Summary</a>
                                @endif
                              </div>
                            </div>
                            <h4>Summary</h4>
                          </div>
                          
                          <div class="card-body">
                            <div class="summary">
                              <div class="summary-info active" data-tab-group="summary-tab" id="summary-text">
                                <h4 class="dynamic_loading_text" data-url="{{route('get_percentage_allocation_complete',['semester'=>$semester->id])}}" >{{App\Models\Course::percent_complete_allocation($semester)}} % Complete</h4>
                                {{-- <div class="text-muted">Sold 4 items on 2 customers</div> --}}
                                <div class="d-block mt-2">                              
                                  {{-- <a href="#">View All</a> --}}
                                </div>
                              </div>
                              {{-- <div class="summary-chart" data-tab-group="summary-tab" id="summary-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas id="myChart" height="343" style="display: block; height: 275px; width: 550px;" width="687" class="chartjs-render-monitor"></canvas>
                              </div> --}}
                              <div class="summary-item">
                                {{-- <h6>Item List <span class="text-muted">(4 Items)</span></h6> --}}
                                <ul class="list-unstyled list-unstyled-border">

                                    {{-- Fully Allocated Courses --}}
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-right ">
                                              <p>
                                                (<span class="dynamic_loading_text" data-url="{{route('get_fully_allocated_courses_number',['semester'=>$semester->id])}}" >
                                                  {{App\Models\Course::fully_assigned($semester->id)->count()}}
                                                </span>)
                                                    out of  
                                                (<span class="dynamic_loading_text"  data-url="{{route('get_courses_being_offered_number',['semester'=>$semester->id])}}">
                                                  {{App\Models\Course::being_offered($semester->id)->count()}}
                                                </span>)

                                              </p>
                                            </div>
                                            <div class="media-title"><a href="#">Fully Allocated Courses</a></div>
                                            <small class="text-muted">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday</small>
                                        </div>
                                    </li>

                                    {{-- Partially Allocated Courses --}}
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-right">
                                              <p >
                                                (<span class="dynamic_loading_text" data-url="{{route('get_partially_allocated_courses_number',['semester'=>$semester->id])}}">
                                                  {{App\Models\Course::partially_assigned($semester->id)->count()}}
                                                </span>)
                                              </p>
                                            </div>
                                            <div class="media-title"><a href="#">Partially Allocated Courses</a></div>
                                            <small class="text-muted">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday</small>
                                        </div>
                                    </li>

                                    {{-- Unallocated Courses --}}
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-right">
                                              <p >
                                                (<span class="dynamic_loading_text" data-url="{{route('get_unallocated_courses_number',['semester'=>$semester->id])}}">
                                                  {{App\Models\Course::non_assigned($semester->id)->count()}}
                                                </span>)
                                              </p>
                                              </div>
                                            <div class="media-title"><a href="#">Unallocated Courses</a></div>
                                            <small class="text-muted">by <a href="#">Hasan Basri</a> <div class="bullet"></div> Sunday
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