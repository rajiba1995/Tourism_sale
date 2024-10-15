<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeRepositoryInterface;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        $data = $this->employeeRepository->getAll();
        return view('admin.employee.index', compact('data'));
    }

    public function create()
    {
        $designations = Designation::all();
        return view('admin.employee.add', compact('designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:employees',
            'designation_id' => 'required|exists:designations,id',
            'password' => 'required|string|min:6',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->employeeRepository->create($request->all());
        return redirect()->route('admin.employee')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = $this->employeeRepository->getById($id);
        $designations = Designation::all();
        return view('admin.employee.edit', compact('employee', 'designations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $id,
            'designation_id' => 'required|exists:designations,id',
            'password' => 'nullable|string|min:6',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->employeeRepository->update($id, $request->all());
        return redirect()->route('admin.employee')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $this->employeeRepository->delete($id);
        return redirect()->route('admin.employee')->with('success', 'Employee deleted successfully.');
    }
}

