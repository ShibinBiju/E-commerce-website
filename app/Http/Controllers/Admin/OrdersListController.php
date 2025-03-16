<?php

namespace App\Http\Controllers\Admin;

use App\Services\admin\OrdersListService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersListController extends Controller
{
    protected $service;

    public function __construct(OrdersListService $service)
    {

        $this->service = $service;
    }

    public function index()
    {
        $orders = $this->service->indexData();
        return view('admin.orders-list.index', compact('orders'));
    }


    public function edit($id)
    {

        $order = $this->service->editData($id);
        return view('admin.orders-list.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {

        try {
            $result = $this->service->updateData($request->input(), $id);

            // dd($result);

            return redirect()->route('ordersList.index')->with('success', 'Order list updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}
