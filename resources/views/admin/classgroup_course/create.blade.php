<div class="card">

    <div class="modal-header">
        Add New Course for {{$classgroup->slug_name()}}
    </div>
    

    <div class="card-body" >
        <form class="form" method="POST" action="{{route('store_classgroup_course',['classgroup'=>$classgroup])}}">
            @csrf
            <datalist id="course_list">
                
                @foreach($courses as $course)
                    <option value="{{$course->code}}">{{$course->code." : ".$course->name}}</option>
                @endforeach
            </datalist>
    
            <label for="course_name">Search Course</label>
            
            <input required class="form-control" list="course_list" id="course_name" type="text" name="course_name">

            {{-- <label for="lecturer_id">Search Lecturer</label>

            <select name="lecturer_id" id="lecturer_id">
                <option value="">Select</option>
                @foreach($classgroup_course->course->lectures() as $lecturer)
                    <option value="{{$lecturer->id}}">{{$lecturer->fullname()}}</option>
                @endforeach
            </select> --}}
    
            
            {{-- <input required class="form-control" list="lecturers_list" id="lecturer_name" type="text" name="lecturer_name"> --}}
    
            <input type="submit" value="Submit" class="form-control mt-3 btn btn-success">
    
        </form>
    </div>
    
</div>