@foreach(['success', 'error', 'info', 'waring'] as $type)
    @php
        $typeToClass = ['success' => 'green','error' => 'red','info' => 'gray','waring' => 'yellow'];
    @endphp
    @if(session($type))
        <div
            class="bg-{{ $typeToClass[$type] }}-100 border border-{{ $typeToClass[$type] }}-400 text-{{ $typeToClass[$type] }}-700 px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline">{{ session($type) }}</span>
            <button
                type="button"
                class="absolute top-0 bottom-0 right-0 px-4 py-3 text-{{ $typeToClass[$type] }}-700"
                onclick="this.parentElement.style.display='none'">
                ×
            </button>
        </div>
    @endif
@endforeach
