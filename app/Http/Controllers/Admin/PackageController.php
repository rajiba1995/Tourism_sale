<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PackageRepositoryInterface;

class PackageController extends Controller
{
    protected $packageRepository;

    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function index()
    {
        $packages = $this->packageRepository->getAll();
        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'no_of_days' => 'required|integer',
            'no_of_nights' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->packageRepository->create($request->all());
        return redirect()->route('admin.package.index')->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $package = $this->packageRepository->getById($id);
        return view('admin.package.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'no_of_days' => 'required|integer',
            'no_of_nights' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->packageRepository->update($id, $request->all());
        return redirect()->route('admin.package.index')->with('success', 'Package updated successfully.');
    }


    public function destroy($id)
    {
        $this->packageRepository->delete($id);
        return redirect()->route('admin.package.index')->with('success', 'Package deleted successfully.');
    }
}

