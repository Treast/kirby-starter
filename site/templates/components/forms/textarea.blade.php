@props(['name', 'label', 'value' => '', 'data' => [], 'errors' => []])

<label for="{{ $name }}" @class([
    'block text-sm font-semibold leading-6 text-gray-900',
    'text-red-500' => isset($errors[$name]),
])>{{ $label }}</label>
<div class="mt-2.5">
  <textarea name="{{ $name }}" id="{{ $name }}" rows="4" @class([
      'block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6',
      'ring-red-300 focus:ring-red-600' => isset($errors[$name]),
  ])>{{ $data[$name] ?? '' }}</textarea>
</div>
