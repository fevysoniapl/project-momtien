<script setup lang="ts">
import HeaderContent from '@/Components/HeaderContent.vue'
import FooterContent from '@/Components/FooterContent.vue'
</script>

<template>
  <HeaderContent/>
  <main class="mt-[80px]">
    <slot></slot>
  </main>
  <FooterContent/>
</template>
