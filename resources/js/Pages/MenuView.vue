<script setup lang="ts">
import { defineProps } from 'vue';
import { Link, Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import axios from 'axios';

// Menerima data menuCategories dari Inertia
const props = defineProps<{
  menuCategories: Array<{
    name: string;
    items: Array<{
      name: string;
      description: string;
      price: string;
      image: string;
    }>;
  }>;
}>();

const onViewMenu = async () => {
  try {
    console.log("is running")
    const res = await axios.get('/book').then(res => console.log(res)).catch(e => console.error(e))
  } catch (e) {
    console.error(e)
  }
}
</script>

<template>
  <MainLayout>
    <Head title="Menu"/>
    <section class="menu-section">
      <header class="menu-header">
        <h1 class="menu-title font-bold font-heading">Daftar Menu</h1>
      </header>
      
      <div v-for="(category, index) in props.menuCategories" :key="index" class="menu-category" >
        <h2 class="category-title font-semibold">{{ category.name }}</h2>
        
            <Link href="/book" method="post" :data="{ menu: item }" v-for="(item, idx) in category.items" :key="idx" class="menu-item">
            <img :src="item.image" alt="Image of {{ item.name }}" class="item-image" />
            <div class="item-details">
              <h3 class="item-name">{{ item.name }}</h3>
              <p class="item-description">{{ item.description }}</p>
              <p class="item-price">{{ item.price }}</p>
            </div>
          </Link> 
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
.menu-section {
  padding: 20px;
  max-width: 700px;
  margin: auto;
}

.menu-header {
  text-align: center;
  margin-bottom: 20px;
}

.menu-title {
  font-size: 2rem;
  color: #333;
}

.category-title {
  font-size: 1.5rem;
  color: #555;
  margin-top: 20px;
  border-bottom: 2px solid #e5e5e5;
  padding-bottom: 5px;
}

.menu-item {
  display: flex;
  align-items: center;
  padding: 10px 0;
  border-bottom: 1px solid #e5e5e5;
}

.item-image {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 8px;
  margin-right: 15px;
}

.item-details {
  flex: 1;
}

.item-name {
  font-size: 1.2rem;
  font-weight: bold;
  color: #333;
}

.item-description {
  font-size: 0.9rem;
  color: #777;
}

.item-price {
  font-size: 1rem;
  color: #f76c6c;
  font-weight: bold;
}
</style>
