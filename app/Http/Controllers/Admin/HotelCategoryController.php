<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\HotelCategoryRepositoryInterface;
use Illuminate\Http\Request;

class HotelCategoryController extends Controller
{
    protected $hotelCategoryRepository;

    public function __construct(HotelCategoryRepositoryInterface $hotelCategoryRepository)
    {
        $this->hotelCategoryRepository = $hotelCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->hotelCategoryRepository->getAll();
        return view('admin.hotel_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotel_category.add');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Call the store method in the repository
        $this->hotelCategoryRepository->store($request->all());

        // Redirect back with success message
        return redirect()->route('admin.hotelCategory')->with('success', 'Hotel Category created successfully.');
    }

    public function edit($id)
    {
        $data = $this->hotelCategoryRepository->getById($id);
        return view('admin.hotel_category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $this->hotelCategoryRepository->update($id, $request->all());
        return redirect()->route('admin.hotelCategory')->with('success', 'Designation updated successfully.');
    }

    public function destroy($id)
    {
        $this->hotelCategoryRepository->delete($id);
        return redirect()->route('admin.hotelCategory')->with('success', 'Designation deleted successfully.');
    }
}
