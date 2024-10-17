<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository implements PackageRepositoryInterface
{
    public function getAll()
    {
        return Package::all();
    }

    public function getById($id)
    {
        return Package::findOrFail($id);
    }

    public function create(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']); 
        }
        return Package::create($data);
    }

     public function update($id, array $data)
    {
        $package = Package::findOrFail($id);

        if (isset($data['image'])) {
            // Delete the old image if necessary
            if ($package->image) {
                \Storage::disk('public')->delete($package->image);
            }
            $data['image'] = $this->uploadImage($data['image']); 
        }

        return $package->update($data);
    }

    public function delete($id)
    {
        return Package::destroy($id);
    
    
    }
    protected function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('package', $imageName, 'public');
        return $path;
    }
}
