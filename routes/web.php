<?php

use App\Livewire\CasteCreate;
use App\Livewire\ComplainantHome;
use App\Livewire\ComplainsList;
use App\Livewire\ComplaintEdit;
use App\Livewire\ConstituencyCreate;
use App\Livewire\DepttCreate;
use App\Livewire\DisttCreate;
use App\Livewire\DropdownComponent;
use App\Livewire\MandalCreate;
use App\Livewire\MasterDataList;
use App\Livewire\NatureOfComplaintCreate;
use App\Livewire\RegisterComplainant;
use App\Livewire\StateCreate;
use App\Livewire\VillageCreate;
use App\Livewire\ComplaintEntry;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name("home")->middleware('auth');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//Route::get('/master-data',DropdownComponent::class)->name("villageForm");
//Route::get('/form',DropdownComponent::class)->name("villageForm");
Route::get('/master-form',DropdownComponent::class)->name("villageForm")->middleware('auth');
Route::get('/master-data', MasterDataList::class)->name("master-data-list")->middleware('auth');
Route::get('/state-create', StateCreate::class)->name("state-create")->middleware('auth');
Route::get('/constituency-create', ConstituencyCreate::class)->name("constituency-create");
Route::get('/mandal-create', MandalCreate::class)->name("mandal-create");
Route::get('/distt-create', DisttCreate::class)->name("distt-create");
Route::get('/village-create', VillageCreate::class)->name("village-create");
Route::get('/deptt-create', DepttCreate::class)->name("deptt-create");
Route::get('/nature-of-complaint-create', NatureOfComplaintCreate::class)->name("nature-of-complaint-create");
Route::get('/caste-create', CasteCreate::class)->name("caste-create");
Route::get('/complaint-entry', ComplaintEntry::class)->name("complaint-entry")->middleware('auth');
Route::get('/complainant-home/{mobile}', ComplainantHome::class)->name("complainant-home");
Route::get('/complaint/{id}', ComplaintEdit::class)->name("complaint-edit");
Route::get('/register-complaint/{mobile}', RegisterComplainant::class)->name("register-complainant");
Route::get('/complaints', ComplainsList::class)->name("complaints");


require __DIR__.'/auth.php';
