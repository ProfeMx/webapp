<?php

namespace App\Models\Traits\Assignments;

/* Replace the word "Model" and "model" */

trait SubmissionAssignment
{

	public function assignModel($request)
	{

        $operationResult = $this->model()->syncWithoutDetaching([
            $request->model_id => [
            	// Pivot values
            ]
        ]);

        return response()->json([
        	'model_id' => $request->model_id,
        	'submission_id' => $request->submission_id,
        	'operation' => $operationResult
        ]);

	}

	public function deallocateModel($request)
	{

		$operationResult = $this->model()->detach($request->model_id);

		return response()->json([
        	'model_id' => $request->model_id,
        	'submission_id' => $request->submission_id,
        	'operation' => $operationResult
        ]);

	}

}