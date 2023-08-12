<?php

namespace App\Models\Traits\Assignments;

/* Replace the word "Model" and "model" */

trait PathAssignment
{

	public function assignCareer($request)
	{

        $operationResult = $this->careers()->syncWithoutDetaching([
            $request->career_id => [
            	'order' => 0
            ]
        ]);

        return response()->json([
        	'career_id' => $request->career_id,
        	'path_id' => $request->path_id,
        	'operation' => $operationResult
        ]);

	}

	public function deallocateCareer($request)
	{

		$operationResult = $this->careers()->detach($request->career_id);

		return response()->json([
        	'career_id' => $request->career_id,
        	'path_id' => $request->path_id,
        	'operation' => $operationResult
        ]);

	}

	public function assignCourse($request)
	{

        $operationResult = $this->courses()->syncWithoutDetaching([
            $request->course_id => [
            	'order' => 0
            ]
        ]);

        return response()->json([
        	'course_id' => $request->course_id,
        	'path_id' => $request->path_id,
        	'operation' => $operationResult
        ]);

	}

	public function deallocateCourse($request)
	{

		$operationResult = $this->courses()->detach($request->course_id);

		return response()->json([
        	'course_id' => $request->course_id,
        	'path_id' => $request->path_id,
        	'operation' => $operationResult
        ]);

	}

}