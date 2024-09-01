<x-layout>

    <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>College</div>
          </h1>
          {{ Breadcrumbs::render('colleges') }}
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
                                {{-- <th>Program</th>
                                <th>Year</th>
                                <th>Status</th> --}}
                                <th>Actions</th>
                            </thead>

                            <tbody>

                                
                                @foreach($colleges as $college)
                                    <tr>
                                        {{-- Name --}}
                                        <td>{{$college->name." ".$college->year}}</td>

                                        {{-- Actions --}}
                                        <td>
                                            <a title="View College" style="color:black" href="{{route('show_college',['college'=>$college])}}"><i class="fa fa-eye"></i></a>
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