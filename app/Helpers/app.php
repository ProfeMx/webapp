<?php

if(!function_exists('user')){
	function user()
	{
		if(auth()->check()){
			return auth()->user();
		}else{
			return null;
		}
	}
}