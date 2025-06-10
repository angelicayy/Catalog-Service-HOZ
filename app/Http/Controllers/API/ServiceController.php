<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Menampilkan semua data layanan dengan paginasi.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved all services.',
            'data' => Service::paginate(10)
        ]);
    }

    /**
     * Menyimpan data layanan baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:services',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_minutes' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $service = Service::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully.',
            'data' => $service
        ], 201);
    }

    /**
     * Menampilkan satu data layanan spesifik.
     */
    public function show(Service $service)
    {
        return response()->json([
            'success' => true,
            'message' => 'Service retrieved successfully.',
            'data' => $service
        ]);
    }

    /**
     * Memperbarui data layanan yang sudah ada.
     */
    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('services')->ignore($service->id)],
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'duration_minutes' => 'sometimes|required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $service->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully.',
            'data' => $service
        ]);
    }

    /**
     * Menghapus data layanan.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.'
        ]);
    }
}
