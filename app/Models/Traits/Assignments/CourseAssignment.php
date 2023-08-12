<?php

namespace App\Models\Traits\Assignments;

/* Replace the word "Model" and "model" */

trait CourseAssignment
{

	public function assignPath($request)
	{

        $operationResult = $this->paths()->syncWithoutDetaching([
            $request->path_id => [
            	'order' => 0
            ]
        ]);

        return response()->json([
        	'path_id' => $request->path_id,
        	'course_id' => $request->course_id,
        	'operation' => $operationResult
        ]);

	}

	public function deallocatePath($request)
	{

		$operationResult = $this->paths()->detach($request->path_id);

		return response()->json([
        	'path_id' => $request->path_id,
        	'course_id' => $request->course_id,
        	'operation' => $operationResult
        ]);

	}

}