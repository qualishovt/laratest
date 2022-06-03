<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->all();

        return $customers;
    }

    public function show($id)
    {
        $customer = $this->customerRepository->findById($id);

        return $customer;
    }

    public function update($id)
    {
        $this->customerRepository->update($id);

        return redirect('/customer/' . $id);
    }

    public function destroy($id)
    {
        $this->customerRepository->delete($id);

        return redirect('/customers');
    }
}
