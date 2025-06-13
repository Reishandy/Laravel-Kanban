@props([])

{{-- TODO: Task --}}
{{-- TODO: Border is based on priorty --}}
<div class="card bg-base-100 border-1 border-info/50 shadow-xl rounded-xl p-6 hover:bg-neutral/40 hover:border-base-content transition-colors duration-300">
    <div class="flex items-center justify-between mb-2">
        {{-- Low: Info, Medium: Secondary, High: Error --}}
        <div class="badge badge-info">Low</div>
        {{-- Default: Normal  H-7 <= Info, H-1 <= Secondary, H >= Error --}}
        <div class="badge badge-outline badge-error">01/01/1970</div>
        <x-gmdi-edit class="w-5 mb-1 cursor-pointer hover:text-base-content/50 transition-colors duration-300" onClick="alert('TODO')"/>
    </div>

    {{--            <div class="rounded-lg badge badge-accent w-full">New</div>--}}

    <div class="flex flex-row items-center justify-between mt-2">
        <div class="flex items-center cursor-pointer hover:text-base-content/50 transition-colors duration-300" onClick="alert('TODO')">
            <x-gmdi-keyboard-double-arrow-left class="w-10 mb-0.5 mr-1" />
            Planned
        </div>
        <div class="flex items-center cursor-pointer hover:text-base-content/50 transition-colors duration-300" onClick="alert('TODO')">
            Completed
            <x-gmdi-keyboard-double-arrow-right class="w-10 mb-0.5 ml-1" />
        </div>
    </div>

    <div class="pt-24">
        <h2 class="font-bold text-3xl mb-2">Title task</h2>
        <p class="text-base-content/50 text-sm text-justify mb-2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
    </div>

    <div class="flex flex-wrap justify-between gap-2 mt-4">
        <x-user-badge name="Assigned User" email="email@example.com"/>
        <x-user-badge name="Assigned User" email="email@example.com"/>
        <x-user-badge name="Assigned User" email="email@example.com"/>
        <x-user-badge name="Assigned User" email="email@example.com"/>
    </div>
</div>
