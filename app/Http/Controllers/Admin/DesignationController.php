<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cr;
use Illuminate\Http\Request;
use App\Repositories\DesignationRepositoryInterface;


class DesignationController extends Controller
{
    protected $designationRepository;

    public function __construct(DesignationRepositoryInterface $designationRepository)
    {
        $this->designationRepository = $designationRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->designationRepository->getAll();
        return view('admin.designation.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.designation.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // 'status' => 'required|boolean',
        ]);

        $this->designationRepository->create($request->all());
        return redirect()->route('admin.designation')->with('success', 'Designation created successfully.');
    }

    public function edit($id)
    {
        $data = $this->designationRepository->getById($id);
        return view('admin.designation.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $this->designationRepository->update($id, $request->all());
        return redirect()->route('admin.designation')->with('success', 'Designation updated successfully.');
    }

    public function destroy($id)
    {
        $this->designationRepository->delete($id);
        return redirect()->route('admin.designation')->with('success', 'Designation deleted successfully.');
    }
}
