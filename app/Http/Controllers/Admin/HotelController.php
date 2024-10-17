<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HotelRepositoryInterface;
use App\Models\HotelCategory;

class HotelController extends Controller
{
    protected $hotelRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function index()
    {
        $hotels = $this->hotelRepository->all();
        return view('admin.hotel.index', compact('hotels'));
    }

    public function create()
    {
        $hotelCategories  = HotelCategory::all();
        return view('admin.hotel.add', compact('hotelCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'hotel_category_id' => 'required|exists:hotel_categories,id',
        ]);

        $this->hotelRepository->create($request->all());

        return redirect()->route('admin.hotel')->with('success', 'Hotel created successfully.');
    }

    public function edit($id)
    {
        $hotel = $this->hotelRepository->getById($id);
        $categories = HotelCategory::all();
        return view('admin.hotel.edit', compact('hotel', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'hotel_category_id' => 'required|exists:hotel_categories,id',
        ]);

        $this->hotelRepository->update($id, $request->all());

        return redirect()->route('admin.hotel')->with('success', 'Hotel updated successfully.');
    }

    public function destroy($id)
    {
        $this->hotelRepository->delete($id);
        return redirect()->route('admin.hotel')->with('success', 'Hotel deleted successfully.');
    }
}
