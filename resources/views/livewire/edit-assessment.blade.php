<div>
    
    <form action="/access/edit-assessment" method="post">
        @csrf
        <div class="modal-body">
            <input type="text" hidden name="assessment_id" value="{{ $assessment->assessment_id }}">
            <div class="row">
                <div class="col form-group">
                    <label for="">Description</label>
                    <input class="form-control" type="text" name="description"
                        id="" value="{{ $assessment->description }}">
                </div>
                <div class="col form-group">
                    <label for="">Type</label>
                    <select class="form-control" name="type" id="">
                        <option value="">--Select Assessment Type---</option>
                        <option value="Assignment">Assignment</option>
                        <option value="MS">Mid Semester</option>
                        <option value="EOS">End of Semester</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col form-group">
                    <label for="">Maximum Score</label>
                    <input class="form-control" type="text" name="maximum_score"
                        id="" value="{{ $assessment->maximum_score }}">
                </div>
                <div class="col form-group">
                    <label for="">Weight</label>
                    <input class="form-control" type="text" name="weight"
                        id="" value="{{ $assessment->weight }}">
                </div>
            </div>
           
            <div class="col form-group">
                <label for="">Course Code</label>
                <input type="text" class="form-control"
                    name="course_code" value="{{ $assessment->course_code }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
