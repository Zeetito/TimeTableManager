<x-layout>

    <div class="main-content">
        <section class="section">
      

          <div class="row">

            <div class="col-12 col-sm-!2 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    {{ Breadcrumbs::render('user_timetable') }}

                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12">
                        
                        {{-- <div class="tab-content" id="myTab2Content"> --}}
                          
                          {{-- Timetable --}}
                          <div class="" id="timetable" >

                            <div class="card-body border border-solid rounded row">
                                
                              {{-- Title  --}}
                              <span class="col-12 text-center h5 rounded border border-solid border-2 border-black">
                                  {{Auth::user()->fullname}} TIMETABLE : THIS SEMESTER
                                  {{-- {{$classgroup->name." - ".$classgroup->year}} TIMETABLE : SEMESTER - {{$semester->name}}  --}}
                              </span>

                              {{-- Body  --}}
                              <div class="col-12   border border-solid border-2 border-black ">

                                {{-- Times --}}
                                <div class="col-12 border border-solid row d-flex  mb-2 " >
                                    <span class="col-1 border small border-solid border-black">Day</span>
                                    <span class="col-1 border small border-solid border-black">08:00 - 08:55</span>
                                    <span class="col-1 border small border-solid border-black">09:00 - 09:55</span>
                                    <span class="col-1 border small border-solid border-black">10:30 - 11:25</span>
                                    <span class="col-1 border small border-solid border-black">11:30 - 12:25</span>
                                    <span class="col-1 border small border-solid border-black">13:00 - 13:55</span>
                                    <span class="col-1 border small border-solid border-black">14:00 - 14:55</span>
                                    <span class="col-1 border small border-solid border-black">15:00 - 15:55</span>
                                    <span class="col-1 border small border-solid border-black">16:00 - 16:55</span>
                                    <span class="col-1 border small border-solid border-black">17:00 - 17:55</span>
                                    <span class="col-1 border small border-solid border-black">18:00 - 18:55</span>
                                </div>
                                
                                {{--Timetable - Courses --}}

                                {{-- Foreach Day --}}
                                @php 
                                  $days = [1,2,3,4,5];
                                  $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                @endphp
                                

                                
                                @foreach($days as $day)
                                  <div class="col-12 border border-solid row  mb-2" >

                                        {{-- Day --}}
                                        <span class="col-1 border small border-solid border-black"><?= isset($daysOfWeek[$day]) ? substr($daysOfWeek[$day], 0, 3) : 'Invalid day' ?></span>
                                        {{-- <span class="col-1 border small border-solid border-black">{{date('l', strtotime("Sunday +{$day} days"))}}span> --}}
                                          
                                        
                                        {{-- foreach of the Starttimes --}}
                                        @foreach(App\Models\TimetableCourse::START_TIMES as $start_time)

                                        
                                            @php 
                                                $instance_query = $timetable_courses->where('day',$day)->where('start_time', $start_time); 
                                                $conflict = $instance_query->count() > 1 ? true :false;
                                                $instance = $instance_query->first();
                                            @endphp

                                            @if($instance)
                                            
                                                <div class="col-{{$instance->duration}} border small border-solid border-black  {{$conflict ? 'bg-warning' : ''}} ">

                                                  {{-- Edit a timetable course instance here --}}
                                                  {{-- <a href="{{route('edit_timetable_course',['classgroup'=>$classgroup, 'timetable_course'=>$instance->id ])}}">
                                                    <span class="fa fa-edit float-end"></span>
                                                  </a> --}}

                                                  <strong>{{$instance->course->code}}</strong> <br>
                                                   {{$instance->classroom->name}}

                                                </div>
                                              
                                              
                                              
                                            @else

                                              <div class="col-1 border small border-solid border-black"> -  </div>

                                            @endif

                                          
                                          

                                        @endforeach


                                       
                                    </div>
                                @endforeach


                              </div>

                            </div>

                          </div>


                        {{-- </div> --}}

                      </div>
                    </div>
                  </div>
                </div>
              </div>

          
          </div>

        </section>
      </div>

</x-layout>