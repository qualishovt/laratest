<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        // return Customer::orderBy('name')
        //     ->where('active', 1)
        //     ->with('user')
        //     ->get()
        //     ->map(function ($customer) {
        //         return $customer->format();
        //     });

        return Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map->format();
    }

    public function findById($id)
    {
        return Customer::where('id', $id)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();
    }

    public function findByName()
    {
    }

    public function update($id)
    {
        $customer = Customer::where('id', $id)->firstOrFail();

        $customer->update(request()->only('name'));
    }

    public function delete($id)
    {
        Customer::where('id', $id)->delete();
    }

    // protected function format($customer)
    // {
    //     return [
    //         'customer_id' => $customer->id,
    //         'name' => $customer->name,
    //         'created_by' => $customer->user->email,
    //         'last_updated' => $customer->updated_at->diffForHumans(),
    //     ];
    // }
}
