<div class="card">

    <div class="modal-header">
        Assign Lecturer for the Course: {{$classgroup_course->course->code}}
    </div>
    

    <div class="card-body" >
        <form class="form" method="POST" action="{{route('assign_lecturer_classgroup_course',['classgroup_course'=>$classgroup_course])}}">
            @csrf

            <label for="lecturer_id">Select Lecturer</label>
            <select required class="form-control" name="lecturer_id" id="lecturer_id">
                <option value="">Select</option>                
                @foreach($classgroup_course->course->lecturers() as $lecturer)
                    <option value="{{$lecturer->id}}">{{$lecturer->fullname()}}</option>
                @endforeach
            </select>

            <input type="submit" value="Submit" class="form-control mt-3 btn btn-success">
    
        </form>
    </div>
    
</div>