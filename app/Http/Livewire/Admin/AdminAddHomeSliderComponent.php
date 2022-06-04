<?php

namespace App\Http\Livewire\Admin;

use app\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;

class AdminAddHomeSliderComponent extends Component
{
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {

        $this->status = 0;
    }

    public function addSlide()
    {

        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imagename = Carbon

        
        $slider->image = $this->image;
        $slider->status = $this->status;
        $slider->



    }



    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}