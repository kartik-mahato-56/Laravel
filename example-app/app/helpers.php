<?php
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\QualificationController;
    use App\Models\Qualification;
    use App\Models\Student;
    use App\Models\User;

    function getQualification($id){
        $student = Student::where('id',$id)->first();
        $qual = Qualification::whereIn('id', explode(',',$student->qualification_id))->get();
        return $qual;
    }


?>
