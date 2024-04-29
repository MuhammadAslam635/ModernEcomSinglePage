<?php

namespace App\Livewire\Web;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.base')]

    public $category;
    public $perPage = 6;
    public $search;
    public $qty = [];
    public function mount()
    {
        $products = Product::where('status', 'active')->where('qty', '>', 0)->get();
        foreach ($products as $product) {
            $this->qty[$product->id] = 1;
        }
    }
    public function getNames($catName)
    {
        $this->category = $catName;
    }
    public function addItem($productId, $productName, $price)
    {
        $quantity = $this->qty[$productId] ?? 1;
        Cart::instance('cart')->add($productId, $productName, $quantity, $price)->associate('App\Models\Product');
        $this->dispatch('product-added');
        $this->alert('success', 'Product Added to your cart');
    }
    public function save()
    {
        $order = new Order();
        $order->subtotal = $this->subtotal;
        $order->tax = $this->tax;
        $order->total = $this->total;
        $order->save();

        foreach ($this->items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->price;
            $orderItem->save();
        }
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->status = $this->status;
        $transaction->payment = $this->payment;
        $transaction->save();
        $this->alert('success', 'Your Order Successfully Completed');
    }

    #[On('product-added')]
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->whereHas('category', fn ($query) => $query->where('name', 'like', '%' . $this->category . '%'))->paginate($this->perPage);
        $categories = Category::get();
        return view('livewire.web.home-component', get_defined_vars());
    }
}
