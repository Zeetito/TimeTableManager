<x-layout>

        <div class="main-content">
            <section class="section">
              <h1 class="section-header">
                <div>Class Groups</div>
              </h1>

              {{ Breadcrumbs::render('classgroups') }}

              <div class="row">

                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                  <div class="card">

                    <div class="card-header">
                      
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
                                    <th>Status</th>
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

                                            {{-- Status --}}
                                            <td><i class="fa fa-{{$classgroup->has_clashing_timetable_courses($semester->id) ? 'times text-danger':'check text-success'}}"></i></td>

                                            {{-- Actions --}}
                                            <td>
                                                <a title="View ClassGroup" style="color:black" href="{{route('show_classgroup',['classgroup'=>$classgroup])}}"><i class="fa fa-eye"></i></a>
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

            </section>
          </div>
    
    </x-layout>