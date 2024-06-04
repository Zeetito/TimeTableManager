<div class="card">

    <div class="modal-header">
        <strong>Remove </strong> Lecturer for the Course: {{$classgroup_course->course->code}}
    </div>
    

    <div class="card-body" >
        <form class="form" method="POST" action="{{route('unassign_lecturer_classgroup_course',['classgroup_course'=>$classgroup_course])}}">
            @csrf

            <label for="choice">Confirm Choice</label>
            <select required class="form-control" name="choice" id="choice">
                <option value="">Select</option>                
                <option value="yes">Yes</option>
            </select>

            <input type="submit" value="Submit" class="form-control mt-3 btn btn-success">
            <button type="button" class="btn btn-secondary m-2" data-dismiss="modal">Close</button>

    
        </form>
    </div>
    
</div>