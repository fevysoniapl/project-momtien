<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <footer data-layername="footer" class="flex flex-col w-full bg-zinc-700 mt-16">
    <div
      data-layername="bg"
      class="flex flex-col items-center justify-center w-full max-w-[1296px] mx-auto px-6 py-16 md:px-20"
    >
      <div
        data-layername="top"
        class="flex flex-wrap gap-10 items-start w-full justify-between"
      >
        <div
          data-layername="col1"
          class="flex flex-col w-full md:w-auto items-center md:items-start mb-10 md:mb-0"
        >
          <div
            data-layername="logo"
            class="flex items-center gap-2 text-4xl font-semibold text-white"
          >
            <img
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/40e02fd5b45d48cd9235b37b246a760e/c38f920184d0a1dbb36569df9a74c8997f39dc368fd08a3cc1f2a380a4c5b539?apiKey=40e02fd5b45d48cd9235b37b246a760e&"
              class="object-contain w-14"
              alt="Mom Tien Logo"
            />
            <span class="whitespace-nowrap font-heading italic">Mom Tien</span>
          </div>

          <a
            href="https://www.instagram.com/momtien_management"
            data-layername="social"
            class="flex gap-3 items-start mt-8"
          >
            <img
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/40e02fd5b45d48cd9235b37b246a760e/db2ea0bafe0c24efee6321825a7896e3a5fcbaa6b8b762a3f0bb85d5db8cc5c4?apiKey=40e02fd5b45d48cd9235b37b246a760e&"
              class="object-contain aspect-square w-9"
              alt="Social Media Icon"
            />
          </a>
        </div>

        <nav
          data-layername="col2"
          class="flex flex-col w-full md:w-auto gap-6 md:gap-8"
        >
          <div class="flex flex-col whitespace-nowrap">
            <h2 data-layername="pages" class="font-bold text-white mb-4">Pages</h2>
            <ul data-layername="list" class="flex flex-col text-stone-300 space-y-3">
              <li data-layername="home">
                <Link href="/" class="hover:underline">Home</Link>
              </li>
              <li data-layername="menu">
                <Link href="/menu" class="hover:underline">Menu</Link>
              </li>
              <li data-layername="order history">
                <Link href="/order-history" class="hover:underline">Order History</Link>
              </li>
              <li data-layername="contact">
                <Link href="/contact" class="hover:underline">Contact</Link>
              </li>
            </ul>
          </div>
        </nav>

        <div
          data-layername="col3"
          class="flex flex-col w-full md:w-auto"
        >
          <h2 data-layername="hubungiKami" class="font-bold text-white mb-4">Hubungi Kami</h2>
          <address
            data-layername="list"
            class="text-stone-300 space-y-4 not-italic"
          >
            <p data-layername="phone">+62 813-2749-5481</p>
            <p data-layername="email">ervitaamelia@gmail.com</p>
            <p
              data-layername="address"
              class="leading-6"
            >
              JL. Troso Baru Perum Troso Baru No. 69 Klaten Jawa Tengah 57475
            </p>
            <p data-layername="working-hours" class="leading-6">
              Mon-Fri: 5am - 9pm <br /> Sat, Sun: 5am - 10pm
            </p>
          </address>
        </div>
      </div>

      <hr
        class="w-full mt-12 border-t border-stone-600"
      />

      <p
        data-layername="copyright"
        class="mt-6 text-sm text-stone-400"
      >
        Copyright © 2023 Mom Tien. All Rights Reserved.
      </p>
    </div>
  </footer>
</template>
