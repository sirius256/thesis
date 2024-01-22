<?php

namespace App\Http\Middleware;

use App\Models\Device;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDeviceHash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $errorResponse = [
            'isError' => 1,
            'errorMessage' => 'device auth error',
        ];

        if (empty($request->device_hash)) {
            return response()->json($errorResponse);
        }

        if (!is_string($request->device_hash)) {
            return response()->json($errorResponse);
        }

        $devices = Device::where('hash', $request->device_hash)
            ->where('is_active', 1)
            ->get();

        if (empty( $devices->toArray())) {
            return response()->json($errorResponse);
        }

        return $next($request);
    }
}
