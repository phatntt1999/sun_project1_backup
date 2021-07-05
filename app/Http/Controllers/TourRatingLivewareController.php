<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TourRatingLivewareController extends Controller
{
    public $rating;
    public $comment;
    public $currentId;
    public $product;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $rating = new Rating();
        $comment =  DB::table('ratings')
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->select('*')
            ->get();
        //$comments = Rating::where('product_id', $this->product->id)->where('status', 1);

        $average = $rating->abc($this->product->id);

        $comments = [];
        for ($i = 0; $i < count($comment); $i++) {
            $commenta = (array)$comment[$i];
            array_push($comments, $commenta);
        }
        // dd(session()->all());
        // dd($comments);
        return view('livewire.product-ratings', compact('comments', 'average'));
    }


    public function mount()
    {
        if (auth()->user()) {
            $rating = Rating::where('user_id', auth()->user()->id)->where('product_id', $this->product->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.product-ratings');
    }


    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {
        $ratings = new Rating();
        $rating = Rating::where('user_id', auth()->user()->id)->where('product_id', $this->product->id)->first();
        $product = Tour::where('id', $this->product->id)->first();


        if (!empty($product)) {

            $product->avgRate = $ratings->abc($this->product->id);
            try {
                $product->save();
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->product_id = $this->product->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }

            session()->flash('message', 'Success!');
            $this->hideForm = true;
        } else {
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->product_id = $this->product->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
}
