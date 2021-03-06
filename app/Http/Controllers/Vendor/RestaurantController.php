<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['restaurants'] = Restaurant::where('user_id', Auth::user()->id)->get();
        return view('vendor.restaurant.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.restaurant.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'res_name' => 'required|min:3|max:255',
            'trade_license' => 'required|min:3|max:50',
            'country' => 'required|max:100',
            'city' => 'required|max:100',
            'address' => 'required|max:255',
            'res_discount' => '',
            'description' => 'required',
            'res_image' => 'required|mimes:jpg,jpeg,png,gif,svg,webp|max:2000',
        ]);

        $slug = Str::slug($request->title) . '-' . Str::random(5);
        $restaurant = Restaurant::create($request->all() + [
            'user_id' => Auth::user()->id,
            'slug' => $slug,
            'status' => 2,
        ]);
        if ($request->hasFile('res_image')) {
            $photo = $request->file('res_image');
            $photo_name = time() . "." . $photo->getClientOriginalExtension($photo);
            $location = 'assets/img/restaurant/' . $photo_name;
            Image::make($photo)->save($location);
            Restaurant::find($restaurant->id)->update([
                'res_image' => $photo_name,
            ]);
        }
        Notify::success('Created New Restaurant, Pending Approval !', 'Success');
        return redirect()->route('vendorrestaurant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['single_restaurant'] = Restaurant::where('id', $id)->firstOrFail();
        return view('vendor.restaurant.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['single_restaurant'] = Restaurant::where('id', $id)->firstOrFail();
        return view('vendor.restaurant.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'res_name' => 'required|min:3|max:255',
            'trade_license' => 'required|min:3|max:50',
            'country' => 'required|max:100',
            'city' => 'required|max:100',
            'address' => 'required|max:255',
            'res_discount' => '',
            'description' => 'required',
            'res_image' => '',
        ]);

        $slug = Str::slug($request->res_name) . '-' . Str::random(5);
        $restaurant->update($request->except('_token', 'res_image') + [
            'user_id' => Auth::user()->id,
            'slug' => $slug,
        ]);

        if ($request->hasFile('res_image')) {
            if ($restaurant->res_image) {
                unlink('assets/img/restaurant/' . $restaurant->res_image);
            }
            $photo = $request->file('res_image');
            $photo_name = time() . "." . $photo->getClientOriginalExtension($photo);
            $location = 'assets/img/restaurant/' . $photo_name;

            Image::make($photo)->save($location);
            $restaurant->update([
                'res_image' => $photo_name,
            ]);
        }
        Notify::success('Restaurant infomation Updated', 'Success');
        return redirect()->route('vendorrestaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurant::where('id', $id)->first()->delete();
        Notify::info('This Restaurant successfully Deleted', 'Deleted');
        return back();
    }
}
