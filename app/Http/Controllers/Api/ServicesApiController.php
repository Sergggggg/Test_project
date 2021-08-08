<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Resources\ServicesResource;

class ServicesApiController extends Controller
{
    public function index()
	{
	 $categories = Service::all();
	 
	 return ServicesResource::collection($categories);
	}
}
