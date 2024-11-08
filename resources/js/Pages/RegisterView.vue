<script setup lang="ts">
</script>

<template>
  <main data-layername="registrasi" class="flex flex-col items-center justify-center min-h-screen bg-stone-50">
    <section data-layername="logoMomTien" class="flex flex-col items-center w-full px-5 pt-16 pb-8 max-w-5xl">
      <h1 data-layername="cuisine" class="text-4xl text-heading font-semibold tracking-tight leading-none text-zinc-700 mb-8 max-md:text-3xl">
        Welcome to Mom Tien
      </h1>
      <div class="flex gap-10 w-full max-md:flex-col items-center">
        <div data-layername="column" class="flex flex-col w-[50%] max-md:w-full">
          <figure data-layername="image" class="flex justify-center w-full bg-blue-100 rounded-lg h-64 max-md:w-full flex items-center">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/b9a1889d7236e0cd409353212506c82e2267d1157bbb868abfda0928e748b116?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf" alt="Mom Tien cuisine illustration" class="object-cover rounded-lg w-full h-full -mt-8" /> <!-- Margin negatif diperbesar -->
          </figure>
        </div>
        <div data-layername="column" class="flex flex-col w-[50%] max-md:w-full">
          <form class="flex flex-col w-full text-lg leading-none text-black max-md:mt-8 max-md:max-w-full">
            <label for="name" data-layername="name" class="self-start">Name</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input type="text" id="name" class="flex-grow bg-transparent border-none focus:outline-none" />
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/fee55081eb38321b84ea06dd64eef7630e265e8c627f5ede0910326d50a26765?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf" alt="" class="w-5 h-5 ml-2" />
            </div>
            <label for="email" data-layername="email" class="self-start mt-3">Email</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input type="email" id="email" class="flex-grow bg-transparent border-none focus:outline-none" />
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/67eb54473f5c2c6510eed6a33709c3d395e6c56137251af8772a85de25e5226a?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf" alt="" class="w-5 h-5 ml-2" />
            </div>
            <label for="password" data-layername="password" class="self-start mt-3">Password</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input type="password" id="password" class="flex-grow bg-transparent border-none focus:outline-none" />
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/0515c4563602009b79c8a919b6ef2ef985daf6bf16dacc0046f0286d95a4cc28?placeholderIfAbsent=true&apiKey=1ddfaeec17f94938b161e1f33a40ecbf" alt="" class="w-5 h-5 ml-2" />
            </div>
            <label for="phone" data-layername="noHandphone" class="self-start mt-3">No Handphone</label>
            <div class="flex items-center justify-between p-3 mt-1 text-base leading-7 bg-white rounded-lg shadow-md max-md:max-w-full">
              <input type="tel" id="phone" class="flex-grow bg-transparent border-none focus:outline-none" />
            </div>
            <button type="submit" data-layername="register" class="w-full py-3 mt-6 text-lg font-bold text-center text-black bg-stone-300 rounded-lg shadow-md max-md:mt-4">
              REGISTER
            </button>
          </form>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  name: 'RegistrationForm',
}
</script>