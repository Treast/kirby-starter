<header class="container bg-white">
  <nav class="flex items-center justify-between py-6 lg:justify-start" aria-label="Global">
    <div class="flex">
      @if ($image = $site->image())
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">{{ $site->title() }}</span>
          <img class="h-12 w-auto" src="{{ $image->url() }}" alt="">
        </a>
      @endif
    </div>
    <div class="button-open-menu flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    @if ($site->primaryMenu()->isNotEmpty())
      <div class="hidden lg:flex lg:flex-1 lg:justify-center lg:gap-x-12">
        @foreach ($site->primaryMenu()->toStructure() as $nav)
          @if ($nav->children()->isNotEmpty())
            <div class="has-children relative">
              <button type="button" class="peer flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">
                {{ $nav->text() }}
                <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
                </svg>
              </button>
              <div class="sub-menu absolute -left-8 top-full z-10 mt-3 hidden w-screen max-w-md overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-900/5">
                <div class="p-4">
                  @foreach ($nav->children()->toStructure() as $child)
                    <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                      <div class="flex-auto">
                        <a href="{{ $child->url() }}" class="block font-semibold text-gray-900">
                          {{ $child->text() }}
                          <span class="absolute inset-0"></span>
                        </a>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          @else
            <a href="{{ $nav->url() }}" class="text-sm font-semibold leading-6 text-gray-900">{{ $nav->text() }}</a>
          @endif
        @endforeach
      </div>
    @endif

    {{-- <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
    </div> --}}
  </nav>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div class="lg:hidden" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    {{-- <div class="fixed inset-0 z-10"></div> --}}
    <div class="mobile-menu fixed inset-y-0 right-0 z-10 w-full translate-x-full overflow-y-auto bg-white px-6 py-6 transition-transform sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        @if ($image = $site->image())
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">{{ $site->title() }}</span>
            <img class="h-12 w-auto" src="{{ $image->url() }}" alt="">
          </a>
        @endif
        <button type="button" class="button-close-menu -m-2.5 rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Close menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <nav class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          @if ($site->primaryMenu()->isNotEmpty())
            <div class="space-y-2 py-6">
              @foreach ($site->primaryMenu()->toStructure() as $nav)
                @if ($nav->children()->isNotEmpty())
                  <div class="has-children -mx-3">
                    <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 hover:bg-gray-50" aria-controls="disclosure-1"
                      aria-expanded="false">
                      {{ $nav->text() }}
                      <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                          clip-rule="evenodd" />
                      </svg>
                    </button>
                    <!-- 'Product' sub-menu, show/hide based on menu state. -->
                    <div class="sub-menu--mobile mt-2 space-y-2" id="disclosure-1">
                      @foreach ($nav->children()->toStructure() as $child)
                        <a href="{{ $child->url() }}" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ $child->text() }}</a>
                      @endforeach
                    </div>
                  </div>
                @else
                  <a href="{{ $nav->url() }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ $nav->text() }}</a>
                @endif
              @endforeach
            </div>
          @endif
          {{-- <div class="py-6">
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
          </div> --}}
        </div>
      </nav>
    </div>
  </div>
</header>
