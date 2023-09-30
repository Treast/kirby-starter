@snippet('layouts/header')

<div class="px-6 py-24 sm:py-32 lg:px-8">
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contactez-nous !</h2>
  </div>
  <form action="{{ $page->url() }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      @if (count($errors) > 0)
        <x-errors label="Le formulaire n'a pas pu être envoyé :" :errors="$errors" />
      @endif
      <div class="absolute left-0 top-0 -z-10 -translate-x-full -translate-y-full opacity-0">
        <x-forms.input name="website" label="Website" :errors="$errors" :data="$data" />
      </div>
      <div>
        <x-forms.input name="lastname" label="Nom" :errors="$errors" :data="$data" />
      </div>
      <div>
        <x-forms.input name="firstname" label="Prénom" :errors="$errors" :data="$data" />
      </div>
      <div class="sm:col-span-2">
        <x-forms.input name="email" label="Email" type="email" :errors="$errors" :data="$data" />
      </div>
      <div class="sm:col-span-2">
        <x-forms.textarea name="message" label="Message" :errors="$errors" :data="$data" />
      </div>
      <div class="sm:col-span-2">
        <x-forms.toggle name="terms" :errors="$errors">J'accepte que mes données soient stockés de manière à pouvoir me recontacter</x-forms.toggle>
      </div>
    </div>
    <div class="mt-6">
      <x-forms.submit value="Envoyer" />
    </div>
  </form>
</div>

@snippet('layouts/footer')
