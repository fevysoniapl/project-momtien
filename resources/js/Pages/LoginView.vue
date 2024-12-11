<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
  <Head title="Login" />
  <main data-layername="login" class="flex flex-col items-center justify-center min-h-screen bg-stone-50">
    <section data-layername="logoMomTien" class="flex flex-col items-center w-full px-5 pt-16 pb-8 max-w-5xl">
      <h1 data-layername="cuisine" class="font-heading italic text-4xl font-semibold tracking-tight leading-none text-zinc-700 mb-8 max-md:text-3xl">
        Welcome to Mom Tien
      </h1>
      <div class="flex gap-10 mt-10 w-full max-md:flex-col items-start">
        <div data-layername="column" class="flex flex-col w-[50%] max-md:w-full">
          <figure data-layername="image" class="flex justify-center w-full bg-blue-100 rounded-lg h-64 max-md:w-full">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1eaf93f0ea7c3752cb206a372fe1f383c42992b5cb49db8310ae724b59d4d00?placeholderIfAbsent=true&apiKey=99e98c75e74449b086557677558acabb" alt="Mom Tien cuisine illustration" class="object-cover rounded-lg w-full h-full" />
          </figure>
        </div>
        <div data-layername="column" class="flex flex-col w-[50%] max-md:w-full">
          <form @submit.prevent="submit" class="flex flex-col w-full text-lg leading-none text-black max-md:mt-8 max-md:max-w-full">
            
            <label for="email" data-layername="email" class="self-start">Email</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input
                type="email"
                id="email"
                v-model="form.email"
                class="flex-grow bg-transparent border-none focus:outline-none"
                required
                autocomplete="username"
              />
            </div>
            <InputError v-for="error in form.errors.email" class="mt-2" :message="error" />

            <label for="password" data-layername="password" class="self-start mt-3">Password</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input
                type="password"
                id="password"
                v-model="form.password"
                class="flex-grow bg-transparent border-none focus:outline-none"
                required
                autocomplete="current-password"
              />
            </div>
            <InputError v-for="error in form.errors.password" class="mt-2" :message="error" />

            <p class="self-start mt-4 text-base">
              Don't have an account? Please <Link href="/register" class="font-bold text-blue-600">Register</Link> first.
            </p>

            <button
              type="submit"
              class="w-full py-3 mt-10 text-lg font-bold text-center text-black bg-stone-300 rounded-lg shadow-md max-md:mt-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Login
            </button>
          </form>
        </div>
      </div>
    </section>
  </main>
</template>
