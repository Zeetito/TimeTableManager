<div class="card">

    <div class="modal-header">
        <span class="h6">
            You're Removing {{$classgroup_course->course->code}} for {{$classgroup_course->class_group->slug_name()}}
        </span>
    </div>
    

    <div class="card-body" >
        <form class="form" method="POST" action="{{route('delete_classgroup_course',['classgroup_course'=>$classgroup_course])}}">
            @csrf
            @method('delete')
           
    
            <label for="choice">Confirm Choice</label>
            
            <select required class="form-control" list="course_list" id="choice" type="text" name="choice" >
                <option value="">Select</option>
                <option value="yes">Yes</option>
            </select>
    
            <input type="submit" value="Delete" class="form-control mt-3 btn btn-danger">
    
        </form>
    </div>
    
</div>