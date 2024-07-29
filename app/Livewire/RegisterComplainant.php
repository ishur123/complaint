<?php

namespace App\Livewire;

use App\Models\Caste;
use App\Models\Complainant;
use App\Models\Distt;
use App\Models\Mandal;
use App\Models\Village;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class RegisterComplainant extends Component
{
    use Toast;
    use WithFileUploads;

    public $name;

    #[Validate('required|numeric|digits:10')]
    public $mobile;

    public $villages;
    public $selectedVillage;
    public $casts;
    public $selectedCast;
    public $address;
    public $designation;
    public $organisation;
    public $myModal3;
    public $distts;
    public $selDistt;
    public $selectVillage;
    public $village;
    public $photo;
    public $addDist;
    public $selMandal;
    public $disttName;
    public $mandals;

    public function mount(){
        $myModal3 = false;
        $addDist = false;
        $this->villages = Village::all();
        $this->distts = Distt::all();
        $this->casts = Caste::all();
        $this->mandals = Mandal::all();
    }



    public function district() {
        // dd('hello');
        $district = new Distt();
        $district->mandalId=$this->selMandal;
        $district->disttName  = $this->disttName;
        $district->save();

        $this->toast(
            type: 'success',
            title: $district->disttName.' Created Successfully',
            description: null,                  // optional (text)
            position: 'toast-top toast-end',    // optional (daisyUI classes)
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,                      // optional (ms)
            redirectTo: null                    // optional (uri)
        );
        $addDist = false;

    }

    public function addVillage(){
        $village = new Village();
        $village->disttId = $this->selDistt;
        $village->villageName = $this->village;
        $village->save();

        $this->toast(
            type: 'success',
            title: $village->villageName.' Created Successfully',
            description: null,                  // optional (text)
            position: 'toast-top toast-end',    // optional (daisyUI classes)
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,                      // optional (ms)
            redirectTo: null                    // optional (uri)
        );
    }

    public function saveComplainant()
    {

        $this->validate();

        // $imgPath = '';
        // if ($this->photo){
        //     $imgPath = $this->photo->store('uploads/profile_pics','public');
        // }
        $complainant = new Complainant();
        $complainant->name = $this->name;
        $complainant->villageId = $this->selectVillage;
        $complainant->mobile = $this->mobile;
        $complainant->casteId = $this->selectedCast;
        $complainant->address = $this->address;
        $complainant->designation = $this->designation;
        $complainant->organisation = $this->organisation;
        // $complainant->photo = $imgPath;
        $complainant->save();

        $this->toast(
            type: 'success',
            title: 'Complainant Registered Successfully',
            description: null,
            position: 'toast-top toast-end',
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
        );

        $this->redirectRoute('complainant-home',[$this->mobile]);
    }

    public function render()
    {
        return view('livewire.register-complainant');
    }
}
