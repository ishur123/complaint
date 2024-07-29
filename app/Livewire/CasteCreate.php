<?php

namespace App\Livewire;

use App\Models\Caste;
use Livewire\Component;
use Mary\Traits\Toast;

class CasteCreate extends Component
{
    use Toast;
    public $caste;

    public function saveCaste(){
        if ($this->caste) {
            $cast = new Caste();
            $cast->castName = $this->caste;
            $cast->save();

            $this->toast(
                type: 'success',
                title: $this->caste . ' Added Successfully',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );

            $this->redirectRoute('villageForm');

        } else {
            $this->toast(
                type: 'success',
                title: 'Pleae Enter Distt Name',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );
        }
    }


    public function render()
    {
        return view('livewire.caste-create');
    }
}
