<x-layout>

    <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>{{$department->name}}</div>
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
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Students ({{$department->students()->count()}})</a>
                          </li>
                          {{-- Courses --}}
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Courses ({{$department->courses()->count()}})</a>
                          </li>

                          {{-- Classgroups --}}
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile" aria-selected="false">Classgroups ({{$department->classgroups()->count()}})</a>
                          </li>

                          {{-- Programs --}}
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">Programs ({{$department->programs->count()}})</a>
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
                                    @foreach($department->students() as $student)
                                        <tr>
                                            <td>
                                                <div class="sidebar-user">
                                                    <div class="dp_container sidebar-user-picture">
                                                      <img class="dp" alt="image" src="{{$student->get_avatar()}}">
                                                    </div>
                                                    <div class="sidebar-user-details">
                                                      <div class="user-name">{{$student->fullname()}}</div>
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
                              
                            <table class="table table-striped datatable">
                                <caption>Courses</caption>
                                <thead>
                                    <th></th>
                                </thead>

                                <tbody>
                                    @foreach($department->courses as $course)
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                          </div>

                          {{-- Classgroups --}}
                          <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                              
                            <table class="table table-striped datatable">
                                <caption>Classgroups</caption>
                                <thead>
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Actions</th>
                                </thead>

                                <tbody>
                                    @foreach($department->classgroups() as $classgroup)
                                        <tr>
                                            <td>
                                                {{$classgroup->name." - ".$classgroup->year}}
                                            </td>

                                            <td>
                                                {{$classgroup->program->name}}
                                            </td>

                                            <td>
                                                <span>
                                                    <a href="{{route('show_classgroup',['classgroup'=>$classgroup])}}"><i class="fa fa-eye"></i></a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                          </div>

                          {{-- Programs --}}
                          <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                              
                            <table class="table table-striped datatable">
                                <caption>Programs</caption>
                                <thead>
                                    <th>Name</th>
                                    {{-- <th>Students</th> --}}
                                    <th>Actions</th>
                                </thead>

                                <tbody>
                                    @foreach($department->programs as $program)
                                        <tr>
                                            <td>
                                                {{$program->name}}
                                            </td>

                                            <td>
                                                <span>
                                                    {{-- <a href="{{route('show_program',['program'=>$program])}}"><i class="fa fa-eye"></i></a> --}}
                                                </span>
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