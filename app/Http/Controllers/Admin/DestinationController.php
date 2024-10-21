<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\DestinationRepositoryInterface;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    protected $destinationRepository;

    public function __construct(DestinationRepositoryInterface $destinationRepository)
    {
        $this->destinationRepository = $destinationRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->destinationRepository->getAll();
        return view('admin.destination.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.destination.add');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Call the store method in the repository
        $this->destinationRepository->store($request->all());

        // Redirect back with success message
        return redirect()->route('admin.destination')->with('success', 'Hotel Category created successfully.');
    }

    public function edit($id)
    {
        $data = $this->destinationRepository->getById($id);
        return view('admin.destination.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $this->destinationRepository->update($id, $request->all());
        return redirect()->route('admin.destination')->with('success', 'Designation updated successfully.');
    }

    public function destroy($id)
    {
        $this->destinationRepository->delete($id);
        return redirect()->route('admin.destination')->with('success', 'Designation deleted successfully.');
    }
}
