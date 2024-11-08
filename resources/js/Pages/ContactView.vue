<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref } from 'vue';

const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');

const sendWhatsAppMessage = () => {
  const phoneNumber = '6281327495481';
  
  const textMessage = `Hello! I’d like to reach out:%0A%0A 
                      *Name:* ${name.value}%0A 
                      *Email:* ${email.value}%0A 
                      *Subject:* ${subject.value}%0A 
                      *Message:*%0A${message.value}`;
  
  const apiUrl = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${textMessage}`;
  
  window.open(apiUrl, '_blank');
};
</script>

<template>
  <MainLayout>
    <Head title="Contact"/>
    <section data-layername="hero" class="flex flex-col items-center justify-center w-full max-w-[700px] mx-auto px-4">
      <header data-layername="title" class="flex flex-col items-center text-center w-full mb-6 mt-10">
        <h1 data-layername="contactUs" class="text-4xl leading-tight text-stone-800 max-md:text-2xl font-bold font-heading">
          Contact Us
        </h1>
        <p data-layername="description" class="mt-3 text-base leading-6 text-gray-600 max-md:text-sm">
          We consider all the drivers of change, giving you the components you need to create a truly impactful change.
        </p>
      </header>

      <main data-layername="form" class="flex flex-col items-center justify-center w-full bg-white rounded-2xl shadow-2xl p-6 mb-10">
        <form @submit.prevent="sendWhatsAppMessage" data-layername="box" class="flex flex-col w-full space-y-4">
          <div class="flex flex-wrap gap-4 w-full">
            <div class="flex flex-col flex-1 min-w-[240px]">
              <label for="name" class="font-bold text-stone-800">Name</label>
              <input
                id="name"
                type="text"
                v-model="name"
                class="px-4 py-2 mt-1 w-full border border-stone-300 rounded-full text-center"
                placeholder="Enter your name"
              />
            </div>

            <div class="flex flex-col flex-1 min-w-[240px]">
              <label for="email" class="font-bold text-stone-800">Email</label>
              <input
                id="email"
                type="email"
                v-model="email"
                class="px-4 py-2 mt-1 w-full border border-stone-300 rounded-full text-center"
                placeholder="Enter email address"
              />
            </div>
          </div>

          <div class="flex flex-col">
            <label for="subject" class="font-bold text-stone-800">Subject</label>
            <input
              id="subject"
              type="text"
              v-model="subject"
              class="px-4 py-2 mt-1 w-full border border-stone-300 rounded-full text-center"
              placeholder="Write a subject"
            />
          </div>

          <div class="flex flex-col">
            <label for="message" class="font-bold text-stone-800">Message</label>
            <textarea
              id="message"
              v-model="message"
              class="px-4 py-2 mt-1 w-full h-32 border border-stone-300 rounded-2xl text-center"
              placeholder="Write your message"
            ></textarea>
          </div>

          <button
            type="submit"
            class="px-4 py-3 w-full text-white font-bold bg-pink-800 rounded-full hover:bg-pink-700 transition-all"
          >
            Send
          </button>
        </form>
      </main>
    </section>
  </MainLayout>
</template>

<style scoped>
</style>
