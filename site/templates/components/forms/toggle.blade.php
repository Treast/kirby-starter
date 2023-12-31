@props(['name', 'data' => [], 'errors' => []])

<div class="relative flex items-start">
  <div class="flex h-6 items-center">
    <input id="{{ $name }}" name="{{ $name }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
  </div>
  <div class="ml-3 text-sm leading-6">
    <label for="{{ $name }}" @class([
        'font-medium text-gray-900',
        'text-red-500' => isset($errors[$name]),
    ])>{{ $slot }}</label>
  </div>
</div>
