<script setup lang="ts">
import MainLayout from '../Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <MainLayout>
    <Head title="Landing"/>
    <main class="flex-grow">
      <section class="hero relative flex flex-col w-full min-h-[700px]">
        <img src="@/assets/images/misc/bg.png" alt="Background" class="object-cover absolute inset-0 size-full"/>
        <div class="relative flex flex-col items-center px-20 py-40 w-full max-md:px-5 max-md:py-24">
          <h1 class="font-heading text-10xl text-x-black tracking-tighter leading-[96px] w-[803px] text-center max-md:max-w-full max-md:text-4xl max-md:leading-[51px]">
            Best food for your taste
          </h1>
          <p class="mt-4 leading-7 w-[599px] text-center max-md:max-w-full font-sans">
            Nikmati hidangan lezat dan momen tak terlupakan di catering kami yang hangat dan ramah.
          </p>
          <Link href="/menu">
            <button class="mt-4 gap-2.5 px-6 py-3 my-auto font-bold text-center text-gray-900 whitespace-nowrap border-solid border-[1.5px] hover:bg-stone-800 hover:text-white border-stone-800 rounded-[118px] max-md:px-5">
              Menu
            </button>
          </Link>
        </div>
      </section>

      <section class="flex flex-col justify-center items-start px-10 py-32 mt-28 ml-5 max-w-full bg-white w-[1580px] max-md:px-5 max-md:py-24 max-md:mt-10">
        <div class="mb-0 w-full max-w-[1373px] max-md:mb-2.5 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col">
            <div class="flex flex-col ml-10 relative h-[610px] w-6/12 max-md:ml-0 max-md:w-full">
              <div class="flex w-[60%] flex-col absolute bottom-0 bg-x-brown p-10 right-0 z-10 gap-5 rounded-xl">
                <h2 class="text-2xl font-bold text-white">Kunjungi Kami</h2>
                <div class="flex items-center gap-3">
                  <img src="@/assets/images/logo/icon-phone.png" alt="Phone Icon"/>
                  <p class="text-base text-white">+62 813-2749-5481</p>
                </div>
                <div class="flex items-center gap-3">
                  <img src="@/assets/images/logo/icon-email.png" alt="Email Icon"/>
                  <p class="text-base text-white">ervitaamelia@gmail.com</p>
                </div>
                <div class="flex items-center gap-3">
                  <img src="@/assets/images/logo/icon-location.png" alt="Location Icon"/>
                  <p class="text-base text-white leading-7">JL. Troso Baru Perum Troso Baru No. 69 Klaten Jawa Tengah 57475</p>
                </div>
              </div>
              <div class="flex grow gap-10 absolute items-center max-md:mt-10 max-md:max-w-full">
                <img src="@/assets/images/misc/contact.png" />
              </div>
            </div>
            <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
              <div class="flex flex-col self-stretch my-auto font-medium text-stone-800 max-md:mt-10 max-md:max-w-full">
                <h2 class="text-5xl leading-[60px] max-md:max-w-full max-md:text-4xl max-md:leading-[59px] font-heading">
                  Kami Menyediakan Makanan Terbaik untuk Anda
                </h2>
                <p class="mt-6 text-lg leading-7 max-md:max-w-full">
                  Kisah kami dimulai dengan tujuan untuk menciptakan pengalaman makan yang istimewa, menggabungkan hidangan lezat, pelayanan ramah, dan suasana yang hangat. Berakar pada tradisi kuliner lokal, kami berusaha menghadirkan cita rasa autentik yang memanjakan setiap selera, sambil terus menghadirkan sentuhan modern.
                </p>
                <p class="mt-6 text-base leading-6 text-stone-700 max-md:max-w-full">
                  Di Catering Mom Tien, kami percaya bahwa makan bukan sekadar soal hidangan, melainkan tentang pengalaman yang menyenangkan. Dengan tim yang berdedikasi dan penuh kehangatan, kami selalu berupaya menjadikan setiap acara atau momen Anda lebih istimewa dan tak terlupakan.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="event-services flex flex-col items-center px-20 pt-32 mt-8 w-full bg-white max-md:px-5 max-md:pt-24 max-md:max-w-full">
        <div class="flex flex-col w-full max-w-[1296px] max-md:max-w-full">
          <h2 class="gap-10 self-stretch max-w-full text-6xl font-medium font-heading leading-[61px] text-stone-800 w-[935px] max-md:max-w-full max-md:text-4xl max-md:leading-[49px]">
            Kami Juga Menawarkan Layanan untuk Acara-acara Anda
          </h2>
          <div class="service-cards flex flex-wrap gap-6 mt-16 items-start">
            <article class="service-card flex flex-col rounded-none min-w-[240px] w-[306px]">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/5931f46f4aab1c1d175463d5e5e432271566ea8c1c733caa1fd3b4b8aaaac2be?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="Catering service illustration" class="object-contain w-full rounded-xl aspect-[0.96]" />
              <div class="service-text flex flex-col mt-8 max-w-full w-[280px]">
                <h3 class="self-start text-2xl font-bold tracking-tighter leading-none text-center text-stone-800">
                  Caterings
                </h3>
                <p class="mt-4 text-base leading-6 text-stone-700">
                  Kami menyediakan berbagai pilihan menu yang lezat dan sehat, disiapkan dengan bahan-bahan segar untuk menjadikan setiap acara Anda lebih berkesan.
                </p>
              </div>
            </article>
            <article class="service-card flex flex-col rounded-none min-w-[240px] w-[306px]">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/3fd4242707358b8dc8cd5fdccf61a165cae337468a416e3abb7bd6ceaf2fc38a?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="Birthday celebration illustration" class="object-contain w-full rounded-xl aspect-[0.96]" />
              <div class="service-text flex flex-col mt-8 max-w-full w-[280px]">
                <h3 class="self-start text-2xl font-bold tracking-tighter leading-none text-center text-stone-800">
                  Birthdays
                </h3>
                <p class="mt-4 text-base leading-6 text-stone-700">
                  Rayakan momen spesial Anda dengan sajian yang tak terlupakan. Kami menawarkan menu kustom yang bisa disesuaikan dengan tema dan selera, menjadikan pesta ulang tahun Anda penuh kelezatan dan kebahagiaan.
                </p>
              </div>
            </article>
            <article class="service-card flex flex-col rounded-none min-w-[240px] w-[306px]">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/5099762aa4a6261854879368877c1e9ccd849c9ea7297591d9b749becf95aaa9?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="Wedding catering illustration" class="object-contain w-full rounded-xl aspect-[0.96]" />
              <div class="service-text flex flex-col mt-8 max-w-full w-[280px]">
                <h3 class="self-start text-2xl font-bold tracking-tighter leading-none text-center text-stone-800">
                  Weddings
                </h3>
                <p class="mt-4 text-base leading-6 text-stone-700">
                  Wujudkan pernikahan impian Anda dengan layanan catering premium dari Mom Tien. Kami menawarkan berbagai pilihan hidangan mewah yang dirancang untuk menciptakan pengalaman kuliner yang sempurna bagi hari istimewa Anda.
                </p>
              </div>
            </article>
            <article class="service-card flex flex-col rounded-none min-w-[240px] w-[306px]">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2dfe62d8b478e4e1a258013b1eeee0e9868d8c6f2cbf41cccadabe317f553712?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="General event catering illustration" class="object-contain w-full rounded-xl aspect-[0.96]" />
              <div class="service-text flex flex-col mt-8 max-w-full w-[280px]">
                <h3 class="self-start text-2xl font-bold tracking-tighter leading-none text-center text-stone-800">
                  Events
                </h3>
                <p class="mt-4 text-base leading-6 text-stone-700">
                  Untuk setiap acara, dari pertemuan bisnis hingga gathering keluarga, kami menawarkan solusi catering yang fleksibel dan lezat. Tim kami siap membantu Anda menciptakan pengalaman kuliner yang memukau sesuai dengan kebutuhan acara Anda
                </p>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="flex flex-col items-center px-20 pt-24 pb-14 mt-20 w-full bg-white max-md:px-5 max-md:mt-10 max-md:max-w-full">
        <div class="flex flex-col items-center max-md:max-w-full">
          <h2 class="text-6xl font-medium leading-none font-heading text-center text-stone-800 max-md:max-w-full max-md:text-4xl">
            Apa Kata Pelanggan Kami
          </h2>
          <div class="flex flex-wrap gap-6 items-start mt-16 max-md:mt-10 max-md:max-w-full">
            <article class="flex flex-col rounded-none min-w-[240px] w-[416px]">
              <div class="flex flex-col justify-center items-center px-9 rounded-xl aspect-square bg-stone-50 max-md:px-5">
                <div class="flex flex-col w-full">
                  <div class="flex flex-col max-w-full w-[346px]">
                    <h3 class="text-2xl font-bold tracking-tighter leading-none text-pink-800">
                      "Layanan Catering Terbaik"
                    </h3>
                    <p class="mt-6 text-lg leading-7 text-stone-700">
                      Kami menggunakan layanan catering dari Mom Tien untuk acara kemarin dan hasilnya sungguh luar biasa. Dari awal hingga akhir, kami dilayani dengan sangat ramah, dan makanannya luar biasa lezat.
                    </p>
                  </div>
                  <hr class="mt-8 max-w-full border border-solid opacity-70 bg-stone-300 border-stone-300 min-h-[1px] w-[346px]" />
                  <div class="flex gap-5 items-center mt-8 max-w-full text-base font-bold text-stone-800 w-[211px]">
                    <div class="flex gap-5 self-stretch my-auto w-[211px]">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e4defb055c598a5a85d26c9e174b1a46345bcde5de5271e9954f6073341615da?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="Profile picture of Sophire Robson" class="object-contain shrink-0 rounded-full aspect-square w-[70px]" />
                      <span class="my-auto">Sophire Robson</span>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            <article class="flex flex-col rounded-none min-w-[240px] w-[416px]">
              <div class="flex flex-col items-center px-9 pt-11 pb-2 rounded-xl aspect-square bg-stone-50 max-md:px-5">
                <div class="flex flex-col">
                  <div class="flex flex-col">
                    <h3 class="text-2xl font-bold tracking-tighter leading-none text-pink-800">
                      "Sangat lezat dan memuaskan "
                    </h3>
                    <p class="mt-6 text-lg leading-7 text-stone-700">
                      Layanan catering Mom Tien benar-benar melebihi ekspektasi saya. Makanannya disajikan dengan sangat cantik dan rasanya luar biasa. Sangat cocok untuk acara spesial kami dan membuat tamu-tamu kami terkesan.
                    </p>
                  </div>
                  <hr class="mt-8 max-w-full border border-solid opacity-70 bg-stone-300 border-stone-300 min-h-[1px] w-[346px]" />
                  <div class="flex gap-5 items-center mt-8 max-w-full text-base font-bold text-stone-800 w-[191px]">
                    <div class="flex flex-col self-stretch my-auto w-[191px]">
                      <div class="flex gap-5 w-full">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/1c6ea3dc2bf298f604d0143c9be0eebefb9842dcde28bf6b71c78e7fac80f2a5?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="Profile picture of Matt Cannon" class="object-contain shrink-0 rounded-full aspect-square w-[70px]" />
                        <span class="grow shrink my-auto w-[87px]">Matt Cannon</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            <article class="flex flex-col rounded-none min-w-[240px] w-[416px]">
              <div class="flex flex-col px-9 pt-11 rounded-xl bg-stone-50 max-md:px-5">
                <div class="flex flex-col">
                  <div class="flex flex-col">
                    <h3 class="text-2xl font-bold tracking-tighter leading-8 text-pink-800">
                      "Catering yang sempurna untuk<br /> acara kami "
                    </h3>
                    <p class="mt-6 text-lg leading-7 text-stone-700">
                      Mom Tien Food benar-benar mengangkat kualitas acara kami dengan hidangan yang lezat dan pelayanan yang sangat profesional. Semua tamu memuji makanannya, dan tim mereka sangat membantu dari awal hingga akhir acara. Kami pasti akan menggunakan layanan ini lagi!
                    </p>
                  </div>
                  <hr class="mt-8 max-w-full border border-solid opacity-70 bg-stone-300 border-stone-300 min-h-[1px] w-[346px]" />
                  <div class="flex gap-5 items-center mt-8 max-w-full text-base font-bold text-stone-800 w-[184px]">
                    <div class="flex gap-5 justify-between self-stretch my-auto w-[184px]">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e726f01fb64eb90c4e2a61e81b0f86838e262a886aec7f7fc3cea06f6df28d3f?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" alt="Profile picture of Andy Smith" class="object-contain shrink-0 rounded-full aspect-square w-[70px]" />
                      <span class="self-start mt-2.5">Andy Smith</span>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>
    </main>
  </MainLayout>
</template>
