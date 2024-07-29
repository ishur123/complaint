<?php

namespace App\Livewire;

use App\Models\Caste;
use App\Models\Constituency;
use App\Models\Deptt;
use App\Models\Distt;
use App\Models\Mandal;
use App\Models\MasterData;
use App\Models\NatureOfComplaint;
use App\Models\State;
use Mary\Traits\Toast;
use App\Models\Village;
use Livewire\Component;

class DropdownComponent extends Component
{
    use Toast;

    public $villages;
    public $village;
    public $selVillage;
    public $states;
    public $state;
    public $selState;
    public $constituencies;
    public $selConstituency;
    public $mandals;
    public $mandal;
    public $selMandal;
    public $distts;
    public $distt;
    public $selDistt;
    public $deptts;
    public $deptt;
    public $selDeptt;
    public $natureOfComplaints;
    public $selNatureOfComplaint;
    public $castes;
    public $selCaste;

    public function mount()
    {
        // $this->villages = Village::all();
        $this->states = State::all();
//        $this->constituencies = Constituency::all();
//        $this->mandals = Mandal::all();
//        $this->distts = Distt::all();
        $this->deptts = Deptt::all();
        $this->natureOfComplaints = NatureOfComplaint::all();
        $this->castes = Caste::all();
    }

    public function saveMasterData()
    {
        $masterDate = new MasterData();
        $masterDate->stateId = $this->selState;
        $masterDate->constituencyId = $this->selConstituency;
        $masterDate->mandalId = $this->selMandal;
        $masterDate->disttId = $this->selDistt;
        $masterDate->villageId = $this->selVillage;
        $masterDate->depttId = $this->selDeptt;
        $masterDate->compId = $this->selNatureOfComplaint;
        $masterDate->casteId = $this->selCaste;
        $masterDate->save();

        $this->toast(
            type: 'success',
            title: 'Form Submitted Successfully',
            description: null,                  // optional (text)
            position: 'toast-top toast-end',    // optional (daisyUI classes)
            icon: 'o-information-circle',       // Optional (any icon)
            css: 'alert-info',                  // Optional (daisyUI classes)
            timeout: 3000,                      // optional (ms)
            redirectTo: null                    // optional (uri)
        );

        $this->redirectRoute('master-data-list');
    }

    public function render()
    {
        $this->constituencies = Constituency::where('stateId', $this->selState)->get();
        $this->mandals = Mandal::where('stateId',$this->selState)->get();
        $this->distts = Distt::where('mandalId',$this->selMandal)->get();
        $this->villages = Village::where('disttId',$this->selDistt)->get();

        return view('livewire.master-form');
    }
}
