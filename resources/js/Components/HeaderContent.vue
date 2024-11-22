<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

const isLoggedIn = ref(false);


// Cek status login ketika aplikasi di-mount
onMounted(async () => {
    try {
        const response = await axios.get('/api/auth/status');
        isLoggedIn.value = response.data.isLoggedIn;
    } catch (error) {
        console.error('Error fetching login status:', error);
    }
});

// Fungsi logout
async function handleLogout() {
    try {
        await axios.post('/logout');
        window.location.href = '/login';
    } catch (error) {
        console.error('Error during logout:', error);
    }
}
</script>

<template>
  <nav class="flex relative fixed flex-col items-center pt-3.5 pb-6 w-full bg-white px-12 w-full h-[80px]">
    <div class="flex flex-wrap gap-5 justify-between items-center w-full max-w-[1257px] max-md:max-w-full">
      <div class="flex gap-2 self-stretch text-5xl font-semibold tracking-tight leading-none text-zinc-700">
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/dc8fed7d3e4a97812eadfd65ff3c54ee8bb7e9af1dceee0bbdbe95d47b530aaf?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="Mom Tien logo" class="object-contain shrink-0 aspect-square w-[55px]" />
        <h1 class="my-auto font-heading italic">Mom Tien</h1>
      </div>
      <nav class="flex gap-2 items-start self-stretch my-auto font-medium whitespace-nowrap text-stone-800">
        <Link href="/" class="gap-2.5 self-stretch px-4 py-1 hover:bg-stone-300 rounded-[34px]">Home</Link>
        <Link href="/menu" class="gap-2.5 self-stretch px-4 py-1 hover:bg-stone-300 rounded-[34px]">Menu</Link>
        <Link href="/order-history" class="gap-2.5 self-stretch px-4 py-1 hover:bg-stone-300 rounded-[34px]">Order History</Link>
        <Link href="/contact" class="gap-2.5 self-stretch px-4 py-1 hover:bg-stone-300 rounded-[34px]">Contact</Link>
      </nav>

      <div>
        <Link v-if="!isLoggedIn" href="/login">
          <button class="gap-2.5 self-stretch px-6 py-3 my-auto font-bold text-right text-gray-900 whitespace-nowrap border-solid border-[1.5px] hover:bg-stone-800 hover:text-white border-stone-800 rounded-[118px] max-md:px-5">
            Login
          </button>
        </Link>
        <button v-else @click="handleLogout" class="gap-2.5 self-stretch px-6 py-3 my-auto font-bold text-right text-gray-900 whitespace-nowrap border-solid border-[1.5px] hover:bg-stone-800 hover:text-white border-stone-800 rounded-[118px] max-md:px-5">
          Logout
        </button>

      </div>
    </div>
  </nav>
</template>
