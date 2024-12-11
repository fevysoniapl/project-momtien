<script setup>
import { useForm, Head } from '@inertiajs/vue3';

const siteKey = import.meta.env.VITE_RECAPTCHA_SITE_KEY;

// Initialize form using useForm hook
const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  g_recaptcha_response: '', // Field untuk menyimpan response reCAPTCHA
});

// Function to load reCAPTCHA script
const loadRecaptchaScript = () => {
  if (!document.querySelector('[src="https://www.google.com/recaptcha/api.js"]')) {
    const script = document.createElement('script');
    script.src = 'https://www.google.com/recaptcha/api.js';
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
  }
};

// Submit function to handle registration
const submit = () => {
  form.g_recaptcha_response = grecaptcha.getResponse();
  if (!form.g_recaptcha_response) {
    alert('Please complete the reCAPTCHA');
    return;
  }

  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};

loadRecaptchaScript();
</script>

<template>
  <Head title="Register"/>
  <main data-layername="registrasi" class="flex flex-col items-center justify-center min-h-screen bg-stone-50">
    <section data-layername="logoMomTien" class="flex flex-col items-center w-full px-5 pt-16 pb-8 max-w-5xl">
      <h1 data-layername="cuisine" class="text-4xl italic font-heading font-semibold tracking-tight leading-none text-zinc-700 mb-8 max-md:text-3xl">
        Welcome to Mom Tien
      </h1>
      <div class="flex gap-10 w-full max-md:flex-col items-center">
        <div data-layername="column" class="flex flex-col w-[50%] max-md:w-full">
          <figure data-layername="image" class="flex justify-center w-full bg-blue-100 rounded-lg h-64 max-md:w-full flex items-center">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b9a1889d7236e0cd409353212506c82e2267d1157bbb868abfda0928e748b116?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf" alt="Mom Tien cuisine illustration" class="object-cover rounded-lg w-full h-full -mt-8" />
          </figure>
        </div>
        <div data-layername="column" class="flex flex-col w-[50%] max-md:w-full">
          <form @submit.prevent="submit" class="flex flex-col w-full text-lg leading-none text-black max-md:mt-8 max-md:max-w-full">
            <label for="name" data-layername="name" class="self-start">Name</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input
                v-model="form.name"
                type="text"
                id="name"
                class="flex-grow bg-transparent border-none focus:outline-none"
                required
              />
            </div>
            <span v-if="form.errors.name" class="text-red-500 text-sm mt-2">{{ form.errors.name }}</span>

            <label for="email" data-layername="email" class="self-start mt-3">Email</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input
                v-model="form.email"
                type="email"
                id="email"
                class="flex-grow bg-transparent border-none focus:outline-none"
                required
              />
            </div>
            <span v-if="form.errors.email" class="text-red-500 text-sm mt-2">{{ form.errors.email }}</span>

            <label for="password" data-layername="password" class="self-start mt-3">Password</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input
                v-model="form.password"
                type="password"
                id="password"
                class="flex-grow bg-transparent border-none focus:outline-none"
                required
              />
            </div>
            <span v-if="form.errors.password" class="text-red-500 text-sm mt-2">{{ form.errors.password }}</span>

            <label for="password_confirmation" data-layername="password_confirmation" class="self-start mt-3">Confirm Password</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input
                v-model="form.password_confirmation"
                type="password"
                id="password_confirmation"
                class="flex-grow bg-transparent border-none focus:outline-none"
                required
              />
            </div>
            <span v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-2">{{ form.errors.password_confirmation }}</span>

            <div><br>
                <div class="g-recaptcha" :data-sitekey="siteKey"></div>
            </div>
            <button
              type="submit"
              :class="{'opacity-25': form.processing}"
              :disabled="form.processing"
              class="w-full py-3 mt-6 text-lg font-bold text-center text-black bg-stone-300 rounded-lg shadow-md max-md:mt-4"
            >
              Register
            </button>
          </form>
        </div>
      </div>
    </section>
  </main>
</template>
