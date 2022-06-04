<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteslide($slide-id)
    {
        $slider = HomeSlider::find($slide_id);
        $slider->delete();
        session()->flash('message','Slider has been delete successfully!')

    }

    public function render()
    {   
        $sliders = HomeSlider::all();

        return view('livewire.admin.admin-home-slider-component',['slider'=>$sliders])->layout('layouts.base');
    }
}
