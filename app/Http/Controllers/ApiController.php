<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function respond(mixed $data, ?int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json($data, $status);
    }
}
