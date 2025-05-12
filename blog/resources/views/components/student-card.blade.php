{{-- this component for single student and lecture 6 --}}
<div {{ $attributes->merge(['class' => 'border border-gray-300 p-2 text-center inline-block mb-4 w-full sm:w-1/3 lg:w-1/5']) }}>
    <img src="{{ $image }}" alt="{{ $name }}"
        class="h-48 w-48 rounded-full border-4 border-[#cedeef] mb-2 mx-auto object-cover">
    
    <h3 class="text-2xl leading-8 uppercase text-[#ff004f] font-semibold">{{ $name }}</h3>
    <p class="text-base leading-5 text-gray-700">{{ $title ?? 'Student' }}</p>
    <p class="text-sm leading-5 text-gray-600">Student ID: {{ $studentId }}</p>
    <p class="text-sm leading-5 text-gray-600">Home: {{ $division ?? 'N/A' }}</p>
    <p class="text-sm leading-5 text-gray-600">Blood Group: {{ $bloodGroup ?? 'N/A' }}</p>

    <a href="{{ $contactUrl ?? '#' }}"
        class="text-base bg-[#3E50B4] text-white mx-auto mt-2 px-4 py-1.5 rounded-md block w-max hover:text-black hover:bg-blue-700 transition">
        Contact
    </a>
</div>
