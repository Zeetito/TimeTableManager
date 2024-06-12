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
                      <div class="col-12 col-sm-12 col-md-4">
                        <ul class="nav nav-pills flex-column" id="myTab2" role="tablist">
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
                        </ul>
                      </div>
                      <div class="col-12 col-sm-12 col-md-8">
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