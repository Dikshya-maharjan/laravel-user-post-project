<?php
namespace App\Http\Controllers\Api;
use OpenApi\Attributes as OA;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;


class CourseController extends Controller
{
 #[OA\Get(
        path: "/api/courses",
        operationId: "getCourses",
        summary: "Get all courses",
        tags: ["Courses"]
    )]
    #[OA\Response(
        response: 200,
        description: "Courses fetched successfully"
    )]
    //
    public function index(){
        $course=Course::all();
        return response()->json($course);
    }
    
    public function show($id){
        $course=Course::find($id);
        return response()->json($course);
    }
        #[OA\Post(
        path: "/api/course",
        operationId: "createCourse",
        summary: "Create course",
        tags: ["Courses"]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["name"],
            properties: [
                new OA\Property(property: "name", type: "string")
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: "Course created"
    )]
    public function store(Request $request){
        $course=Course::create([
            'name'=>$request->name,
        ]);
        return response()->json([
            'message'=>"Course created successfully",
            'course'=>$course,
        ]);
    }
        #[OA\Put(
        path: "/api/updatecourse/{id}",
        operationId: "updateCourse",
        summary: "Update course",
        tags: ["Courses"]
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
        description: "Course updated"
    )]

    public function update(Request $request,$id){

        $course=Course::find($id);
        $course->update([
            'name'=>$request->name,
        ]);
        return response()->json([
            'message'=>"Course updated successfully",
            'course'=>$course
        ]);
    }
        #[OA\Delete(
        path: "/api/deletecourse/{id}",
        operationId: "deleteCourse",
        summary: "Delete course",
        tags: ["Courses"]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        schema: new OA\Schema(type: "integer")
    )]
    #[OA\Response(
        response: 200,
        description: "Course deleted"
    )]

    public function destroy($id){
        $course=Course::find($id);
        $course->students()->detach();
        $course->delete();
            return response()->json([
        'message' => 'Course deleted successfully'
    ], 200);

    }
    
}
