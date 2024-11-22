<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

// Define the Order type
interface Order {
  id: number;
  items: { name: string; quantity: number; price: number }[];
  totalPrice: number;
  status: string;
  orderDate: string; // New field for order date
}

interface Props {
  data: any
}

const props = withDefaults(defineProps<Props>(), {
  data: []
})

// Sample order data with different dates and items
const orders = ref<Order[]>([]);

const formatDate = (date: string | Date) => {
  const newDate = new Date(date);

  const year = newDate.getFullYear();
  let month: number | string = newDate.getMonth() + 1; // month is zero-based
  let day: number | string = newDate.getDate();

  if (day < 10) day = '0' + day;
  if (month < 10) month = '0' + month;

  return `${year}-${month}-${day}`;
}

onMounted(() => {
  orders.value = props.data.map((order: any) => ({
    id: order.id,
    items: [
      { name: order.name, quantity: order.quantity, price: order.price }
    ],
    totalPrice: order.total_price,
    status: order.status,
    orderDate: formatDate(order.created_at)
  }))
})
</script>

<template>
  <MainLayout>
  <Head title="Order History"/>
  <!-- Center the section using flexbox -->
  <div class="flex items-center justify-center min-h-screen">
    <div class="p-8 max-w-3xl w-full"> <!-- Removed the outer box with background and rounded corners -->
      <h1 class="text-3xl font-semibold text-gray-800 mb-8 text-center font-heading">Order History</h1>

      <!-- Loop through each order -->
      <div v-for="order in orders" :key="order.id" class="mb-10 p-6 bg-white rounded-lg shadow-md">
        <!-- Order Summary Section with Status in Top-Right Corner -->
        <header class="flex justify-between items-center mb-4">
          <div class="text-left">
            <p class="font-medium text-lg">Order ID: {{ order.id }}</p>
            <p class="text-sm text-gray-600">Order Date: {{ order.orderDate }}</p>
          </div>
          <!-- Change status color based on order status -->
          <div 
            class="px-4 py-2 rounded-full text-sm font-bold uppercase"
            :class="{
              'bg-red-500 text-white': order.status === 'Sedang Dimasak' || order.status === 'Menunggu Pembayaran' || order.status === 'Pesanan Diterima',
              'bg-green-500 text-white': order.status === 'Pesanan Selesai'
            }">
            {{ order.status }}
          </div>
        </header>

        <!-- Item List -->
        <div class="mt-4">
          <h3 class="font-medium text-lg">Items Ordered:</h3>
          <ul class="list-disc pl-5">
            <li v-for="(item, index) in order.items" :key="index">
              {{ item.name }} - Quantity: {{ item.quantity }} - Price: Rp {{ item.price }}
            </li>
          </ul>
        </div>

        <!-- Total Price -->
        <p class="mt-4 font-medium text-lg">Total Price: Rp {{ order.totalPrice }}</p>
      </div>
    </div>
  </div>
  </MainLayout>
</template>