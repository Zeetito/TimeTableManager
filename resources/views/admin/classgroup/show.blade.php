<x-layout>

    <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>{{$classgroup->slug_name()." @ ".$semester->academic_name()}}</div>
          </h1>


          <div class="row">

            <div class="col-12 col-sm-!2 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>--</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 ">
                        <ul class="nav nav-pills flex-row" id="myTab2" role="tablist">
                          {{-- Students --}}
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Students ({{$classgroup->users->count()}})</a>
                          </li>
                          {{-- Courses --}}
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Courses ({{$classgroup->courses_for($semester->id)->count()}})</a>
                          </li>
                          {{-- Lectures --}}
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Lectures</a>
                          </li>
                          {{-- Timetable --}}
                          <li class="nav-item">
                            <a class="nav-link" id="timetable-tab" data-toggle="tab" href="#timetable" role="tab" aria-controls="contact" aria-selected="false">Timetable</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12">
                        <div class="tab-content" id="myTab2Content">

                          {{-- Students --}}
                          <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">


                            <table class="table table-striped datatable">
                                <thead>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($classgroup->users as $user)
                                        <tr>
                                            <td>
                                                <div class="sidebar-user">
                                                    <div class="dp_container sidebar-user-picture">
                                                      <img class="dp" alt="image" src="{{$user->get_avatar()}}">
                                                    </div>
                                                    <div class="sidebar-user-details">
                                                      <div class="user-name">{{$user->fullname()}}</div>
                                                      {{-- <div class="user-role">
                                                        Student
                                                      </div> --}}
                                                    </div>
                                                  </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                          </div>

                          {{-- Courses --}}
                          <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                              
                            @if($classgroup->can_add_course($semester->id))
                                <span class="btn btn-info" data-toggle="modal" data-url="{{route('create_classgroup_course',['classgroup'=>$classgroup])}}" data-target="#myModal" >Add New Course</span>
                            @endif
                            <table class="table table-striped datatable">
                               Total Credit Hour: {{$classgroup->total_credit_hour_for($semester->id)}}
                                <caption>Courses For the Semester</caption>
                                <thead>
                                    <th></th>
                                </thead>

                                <tbody>
                                    @foreach($classgroup->courses_for($semester->id) as $course)
                                        <tr>
                                            <td>
                                                <div class="sidebar-user">
                                                   
                                                    <div class="sidebar-user-details">
                                                      {{-- Course Code  --}}
                                                      <div class="h6 user-name">{{$course->code}}
                                                        <span class="float float-end">
                                                          {{$course->credit_hour}} Credit Hour(s)
                                                        </span>
                                                      </div>

                                                      {{-- Course Name --}}
                                                      <div class="user-role">
                                                        {{$course->name}}

                                                      </div>
                                                      
                                                      {{-- Lecturer --}}
                                                      @if($classgroup->current_classgroup_course_instance_with($course)->has_lecturer() == true )
                                                        <div class="user-name">
                                                          Lecturer: <strong>{{$classgroup->current_classgroup_course_instance_with($course)->lecturer->fullname()}}</strong>

                                                        </div>
                                                      @endif
                                                     
                                         

                                                      <span title="Remove Course" data-toggle="modal" data-target="#myModal" data-url="{{route('confirm_delete_classgroup_course',['classgroup_course'=>$classgroup->current_classgroup_course_instance_with($course)])}}"  class="m-2 float float-end "> <i class="fa fa-trash"></i> </span>
                                                      
                                                      
                                                      @if($classgroup->current_classgroup_course_instance_with($course)->has_lecturer() == false )
                                                        <span title="Assign Lecturer" data-toggle="modal" data-target="#myModal" data-url="{{route('assign_lecturer_form_classgroup_course',['classgroup_course'=>$classgroup->current_classgroup_course_instance_with($course)])}}"  class="m-2 float float-end "> <i class="fa fa-user-plus"></i> </span>
                                                      @else
                                                        <span title="Remove Lecturer" data-toggle="modal" data-target="#myModal" data-url="{{route('unassign_lecturer_form_classgroup_course',['classgroup_course'=>$classgroup->current_classgroup_course_instance_with($course)])}}"  class="m-2 float float-end text-danger "> <i class="fa fa-user-times"></i> </span>
                                                      @endif



                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                          </div>

                          {{-- Lectures --}}
                          <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                            <table class="table table-striped datatable">
                              Total Credit Hour: {{$classgroup->total_credit_hour_for($semester->id)}}
                               <caption>Courses For the Semester</caption>
                               <thead>
                                   <th></th>
                               </thead>

                               <tbody id="accordion" >
                                  @php
                                    $count = 1;   
                                  @endphp
                                   @foreach($classgroup->grouped_lectures_for($semester->id) as $week => $lectures)
                                       <tr>
                                           <td>
                                               <div class="sidebar-user">
                                                  
                                                   <div class="sidebar-user-details">
                                                     {{-- Week Number  --}}

                                                     <div class="accordion  h6 user-name">

                                                        <div class="accordion-header" data-toggle="collapse" data-target="#panel-body-{{$count}}" aria-expanded="true">
                                                          <span class="float-end text-black"><i class="fa fa-arrow-circle-down"></i></span>
                                                          <h4>Week {{$count}} ({{$week}}) ({{$lectures->count()}})</h4> 

                                                        </div>

                                                        <div class="accordion-body collapse " id="panel-body-{{$count}}" data-parent="#accordion" style="">
                                                          
                                                          @php
                                                            // Sunday = 1
                                                            $days=[1,2,3,4,5,6,7];
                                                          @endphp

                                                          @foreach($days as $day)
                                                          
                                                          <div class="card card-border border-success">
                                                            <div class="card-header">
                                                              {{-- The -2 Ensures that 1 = Sunday --}}
                                                              {{date('l', mktime(0, 0, 0, -2, $day, now()->format('Y')))}}
                                                            </div>

                                                            <div class="card-body">
                                                              <div class="d-flex flex-row overflow-scroll">
                                                                  @foreach($lectures as $lecture)
                                                                    {{-- The function below returns the numeric value of the date useing Sunday = 0 i.e plus one to match the above --}}
                                                                    @if( date('w',strtotime(($carbon)::create($lecture->date)->format('Y-m-d'))) + 1  == $day  )
                                                                    <div class="border border-primary m-1 col-4">
                                                                      <span>Course: {{ $lecture->course->code }}</span> <br>
                                                                      <span>Time: {{ date('h:i A', strtotime($lecture->start_time)) }} - {{ date('h:i A', strtotime($lecture->end_time)) }}</span><br>
                                                                      <span>Venue: {{ $lecture->classroom->name }}</span><br>
                                                                      {{-- <span>Venue: {{ $lecture->date }}</span><br> --}}
                                                                        
                                                                    </div>
                                                                    @endif
                                                                      
                                                                  @endforeach
                                                              </div>
                                                            </div>
                                                         </div>

                                                          @endforeach

                                                        </div>


                                                     </div>

                                                     @php
                                                      $count++;
                                                     @endphp

                                                    
                                                   </div>

                                               </div>
                                           </td>
                                       </tr>
                                   @endforeach
                               </tbody>

                           </table>
                          </div>

                          
                          {{-- Timetable --}}
                          <div class="tab-pane fade" id="timetable" role="tabpanel" aria-labelledby="timetable-tab">

                            <div class="card-body border border-solid rounded row">
                                
                              {{-- Title  --}}
                              <span class="col-12 text-center h5 rounded border border-solid border-2 border-black">
                                  {{$classgroup->name." - ".$classgroup->year}} TIMETABLE : SEMESTER - {{$semester->name}} 
                              </span>

                              {{-- Body  --}}
                              <div class="col-12   border border-solid border-2 border-black">

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
                                        @foreach($start_times as $start_time)

                                        
                                            @php 
                                                $instance_query = $classgroup->timetable_scheduled_for($day,$semester->id)->where('start_time', $start_time); 
                                                $conflict = $instance_query->count() > 1 ? true :false;
                                                $instance = $instance_query->first();
                                            @endphp

                                            @if($instance)
                                            
                                                <div class="col-{{$instance->duration}} border small border-solid border-black  {{$conflict ? 'bg-warning' : ''}} ">

                                                  {{-- Edit a timetable course instance here --}}
                                                  <a href="{{route('edit_timetable_course',['timetable_course'=>$instance->id])}}">
                                                    <span class="fa fa-edit float-end"></span>
                                                  </a>

                                                  <strong>{{$instance->course->code}}</strong> <br>
                                                   {{$instance->classroom->name}}

                                                </div>
                                              
                                              
                                              
                                            @else

                                              <div class="col-1 border small border-solid border-black"> - </div>

                                            @endif

                                          
                                          

                                        @endforeach


                                       
                                    </div>
                                @endforeach


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

        </section>
      </div>

</x-layout>