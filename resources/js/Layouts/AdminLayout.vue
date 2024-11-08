<script setup>
import Sidebar from '@/Components/Sidebar.vue'
</script>

<template>
  <div class="flex">
    <!-- Sidebar -->
    <Sidebar />
    
    <!-- Main Content (slot) -->
    <main class="flex-1 p-6 ml-56">
      <slot></slot>
    </main>
  </div>
</template>
