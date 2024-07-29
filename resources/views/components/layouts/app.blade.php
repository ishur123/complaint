<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

{{-- NAVBAR mobile only --}}
<x-nav sticky class="lg:hidden">
    <x-slot:brand>
        <div class="ml-5 pt-5">App</div>
    </x-slot:brand>
    <x-slot:actions>
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer"/>
        </label>
    </x-slot:actions>
</x-nav>

{{-- MAIN --}}
<x-main full-width>
    {{-- SIDEBAR --}}
    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

        {{-- BRAND --}}
        <div class="ml-5 pt-5">App</div>

        {{-- MENU --}}
        <x-menu activate-by-route>

            {{-- User --}}
            @if($user = auth()->user())
            <x-menu-separator/>

            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                         class="-mx-2 !-my-2 rounded">
                <x-slot:actions>
                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate
                              link="/logout"/>
                </x-slot:actions>
            </x-list-item>

            <x-menu-separator/>
            @endif

            <x-menu-item title="Hello" icon="o-sparkles" link="/"/>
            <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                <x-menu-item title="Wifi" icon="o-wifi" link="####"/>
                <x-menu-item title="Archives" icon="o-archive-box" link="####"/>
            </x-menu-sub>

            <x-menu-separator/>
            <x-menu-item title="Master Form Data" icon="o-sparkles" link="{{route('master-data-list')}}"/>
            <x-menu-item title="Master Form" icon="o-sparkles" link="{{route('villageForm')}}"/>
            <x-menu-item title="Check Complaint" icon="o-sparkles" link="{{route('complaint-entry')}}"/>
            <x-menu-item title="Complaints" icon="o-sparkles" link="{{route('complaints')}}"/>
            <x-menu-item title="State" icon="o-sparkles" link="/"/>
            <x-menu-item title="Constituency" icon="o-sparkles" link="/"/>
            <x-menu-item title="Mandal Complaint" icon="o-sparkles" link="/"/>
            <x-menu-item title="District Complaint" icon="o-sparkles" link="/"/>
            <x-menu-item title="Village Complaint" icon="o-sparkles" link="/"/>
            <x-menu-item title="Department Complaint" icon="o-sparkles" link="/"/>
            <x-menu-item title="Nature  of Complaint Complaint" icon="o-sparkles" link="/"/>
            <x-menu-item title="Cast Complaint" icon="o-sparkles" link="/"/>
        </x-menu>
    </x-slot:sidebar>

    {{-- The `$slot` goes here --}}
    <x-slot:content>
        {{ $slot }}
    </x-slot:content>
</x-main>

<x-toast/>
@livewireScripts
</body>
</html>
