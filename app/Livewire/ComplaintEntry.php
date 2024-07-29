<?php

namespace App\Livewire;

use App\Models\Complainant;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class ComplaintEntry extends Component
{
    use Toast;

    #[Validate('required|numeric|digits:10')]
    public $mobile;
    public $name;

    public function checkMobile(){

        $this->validate();

        $complainantDetails = Complainant::with('complaints')
            ->where('mobile',$this->mobile)
            ->orWhere('name', $this->name)
            ->get();

        if ($complainantDetails->isNotEmpty()){
            $this->complainDetailsData = $complainantDetails;
            $this->redirectRoute('complainant-home',[$this->mobile]);
        }
        else{
            $this->toast(
                type: 'success',
                title: 'No Records Available',
                position: 'toast-top toast-end',
            );
            $this->redirectRoute('register-complainant',[$this->mobile]);
        }
    }

    public function render()
    {
        return view('livewire.complaint-entry');
    }
}
