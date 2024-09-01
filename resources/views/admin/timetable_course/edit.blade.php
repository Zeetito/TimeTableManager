<x-layout>

    <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Editing {{$timetable_course->course->code}} Schedule</div>
          </h1>
          <a class="float-end btn btn-secondary m-2" href="{{route('classgroups')}}">
            Back
          </a>

          {{-- {{ Breadcrumbs::render('classgroup_edit_timetable',['classgroup'=>$classgroup, 'timetable_course'=>$timetable_course]) }} --}}

          <div class="card">

            <form action="{{route('update_timetable_course',['timetable_course'=>$timetable_course])}}" method="POST">
              @csrf
              @method('PUT')

                @php 
                    $days = [1,2,3,4,5];
                    $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                @endphp

                {{-- Available Days --}}
                <label for="available_days">Available Days</label>
                <select class="form-control change_list mb-2" data-target="available_times" data-url = "{{route('get_available_times_for_timetable_course',['timetable_course'=>$timetable_course])}}"  name="available_days" id="available_days" required>
                    <option value="">Select Day</option>

                    @foreach($timetable_course->course->available_days($timetable_course->semester_id) as $day)
                        <option value="{{$day}}">{{substr($daysOfWeek[$day], 0)}}</option>
                    @endforeach

                </select>

                {{-- Available Times for the day --}}
                {{-- <div class="fetch_list" id="available_times_classrooms"> --}}
                <select required class="form-control change_list mb-2 " data-url="{{route('get_available_classrooms_for_timetable_course', ['timetable_course' => $timetable_course, 'day' => ' '])}}" data-target="available_classrooms" name="available_times" id="available_times">
                    
                </select>

                {{-- Script to update the value of the day --}}
                <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      // Get the day select element and available times select element
                      const daySelect = document.getElementById('available_days');
                      const availableTimesSelect = document.getElementById('available_times');
                  
                      // Update the data-url attribute when the day select value changes
                      daySelect.addEventListener('change', function() {
                          const selectedDay = this.value;
                          const urlTemplate = "{{ route('get_available_classrooms_for_timetable_course', ['timetable_course' => $timetable_course, 'day' => ':day']) }}";
                          const newUrl = urlTemplate.replace(':day', selectedDay);
                  
                          availableTimesSelect.setAttribute('data-url', newUrl);
                      });
                  });
                </script>
                
                {{-- </div> --}}
                
                {{-- Available Classroom for the day --}}
                <select required class="form-control change_list mb-2 "   name="available_classrooms" id="available_classrooms">
                    
                </select>

                <input type="submit" value="Submit" class="form-control">

            </form>
            
          </div>



        </section>
      </div>

</x-layout>