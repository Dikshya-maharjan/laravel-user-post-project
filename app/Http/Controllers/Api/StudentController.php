<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use OpenApi\Attributes as OA;

class StudentController extends Controller
{

       #[OA\Get(
        path: "/api/index",
        operationId: "getStudents",
        summary: "Get all students",
        tags: ["Students"]
    )]
    #[OA\Response(
        response: 200,
        description: "Students fetched successfully"
    )]


    //list of all stds
    public function index(){
        $students=Student::with('courses')->get();
        return response()->json($students);
    }
    #[OA\Get(
        path: "/api/show/{id}",
        operationId: "getStudent",
        summary: "Get single student",
        tags: ["Students"]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        schema: new OA\Schema(type: "integer")
    )]
    #[OA\Response(
        response: 200,
        description: "Student found"
    )]
    //list of single std
     public function show($id){

        $student=Student::with('courses')->find($id);
        //if std is not found shows error message
        if(!$student){
            return response()->json([
                'message'=>'Student not found',
            ],404);
        }
        return  response()->json($student);
    }
    #[OA\Post(
        path: "/api/store",
        operationId: "createStudent",
        summary: "Create student",
        tags: ["Students"]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["name"],
            properties: [
                new OA\Property(property: "name", type: "string"),
                new OA\Property(
                    property: "course_ids",
                    type: "array",
                    items: new OA\Items(type: "integer")
                )
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: "Student created"
    )]

    public function store(Request $request){
        $request->validate([
    'name' => 'required|string|max:255',
  
]);
        //creates student
        $student=Student::create([
            'name'=>$request->name,
        ]);
        //assign the courses
        $student->courses()->attach($request->course_ids);
        return response()->json([
            'message'=>'Student created successfully',
            'students'=>$student->load('courses')
        ]);
    }
    #[OA\Delete(
        path: "/api/delete/{id}",
        operationId: "deleteStudent",
        summary: "Delete student",
        tags: ["Students"]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        schema: new OA\Schema(type: "integer")
    )]
    #[OA\Response(
        response: 200,
        description: "Student deleted"
    )]

    public function destroy($id){
        //find the students
        $student=Student::find($id);
        //if not found shows error msg
        if(!$student){
            return response()->json([
                'message'=>"Student not found",
            ]);
        }
        //first remove all the data from the courses table
        $student->courses()->detach();
        //delete the student
        $student->delete();
        return response()->json([
            'message'=>"Student Deleted Successfully"
        ]);
    }
        #[OA\Put(
        path: "/api/update/{id}",
        operationId: "updateStudent",
        summary: "Update student",
        tags: ["Students"]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        schema: new OA\Schema(type: "integer")
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "name", type: "string")
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: "Student updated"
    )]

    public function update(Request $request,$id){
        $request->validate([
    'name' => 'required|string|max:255',

]);

        $student=Student::find($id);
        $student->update([
            'name'=>$request->name,
        ]);

        $student->courses()->sync($request->course_ids);
        return response()->json([
            'message'=>'Student updated successfully',
            'student'=>$student->load('course'),
        ]);
    }
}
