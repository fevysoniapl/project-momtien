<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import axios from 'axios';

// Sample data for orders (from Book a Table)
type Order = {
  id: number;
  customerName: string;
  items: { name: string; quantity: number }[]; // Added items array with name, quantity, and price
  stages?: { name: string; description: string; completed: boolean }[];
  status?: string;
  isEdit: boolean 
};

interface Props {
  data: any
}

const props = withDefaults(defineProps<Props>(), {
  data: []
})

const status = ref(['Menunggu Pembayaran', 'Pesanan Diterima', 'Sedang Dimasak', 'Pesanan Selesai'])

const orders = ref<Order[]>([]);

const updateStatus = (id: number | string) => {
  const arrId = orders.value.findIndex((order: any) => (order.id === id));
  orders.value[arrId].isEdit = false;

  axios.post('/edit-order', { status: orders.value[arrId].status, id: id })
    .then(res => orders.value = res.data.data.map((order: any) => ({ 
      id: order.id, 
      customerName: order.customerName,
      items: [
        { name: order.name, quantity: order.quantity }
      ],
      status: order.status,
      isEdit: false
    })))
}

const onEditOrCancel = (isEdit: boolean, id: number | string, status: string) => {
  const arrId = orders.value.findIndex((order: any) => (order.id === id));
  orders.value[arrId].isEdit = !isEdit;

  if (isEdit) {
    orders.value[arrId].status = status;
  }
}

const onDelete = (id: number | string) => {
  axios.post('delete-order', { id: id })
    .then(res => orders.value = res.data.data.map((order: any) => ({ 
      id: order.id, 
      customerName: order.customerName,
      items: [
        { name: order.name, quantity: order.quantity }
      ],
      status: order.status,
      isEdit: false
    })))
}

onMounted(() => {
  props.data.forEach((item: any) => {
    const itemOrdered = { 
      id: item.id, 
      customerName: item.customerName,
      items: [
        { name: item.name, quantity: item.quantity }
      ],
      status: item.status,
      isEdit: false
    };
    orders.value.push(itemOrdered)
  })
})
</script>

<template>
  <AdminLayout>
    <Head title="Order"/>
    <section class="p-6 max-w-3xl mx-auto">
      <header class="text-center mb-8">
        <h1 class="text-2xl font-semibold text-gray-800 font-heading">Kelola Pesanan</h1>
      </header>

      <!-- Orders Management -->
      <div v-for="(order, orderKey) in orders" :key="order.id" class="bg-white p-6 mb-6 rounded-lg shadow-md border border-gray-200">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-medium text-gray-800">Pesanan #{{ order.id }} - {{ order.customerName }}</h2>
          <button class="bg-red-500 text-white px-4 py-2 rounded hover:bgred-600" @click="onDelete(order.id)">Delete</button>
      </div>

      <!-- Show ordered items -->
      <div class="mt-4 text-base text-gray-700">
        <h3 class="font-bold text-gray-800">Items Ordered:</h3>
        <div v-for="(item, itemIndex) in order.items" :key="itemIndex" class="order-item">
          <p>{{ item.name }} - Quantity: {{ item.quantity }}  </p>
        </div>
      </div>

      <!-- Order Status -->
      <div class="flex items-center gap-4 mt-4">
        <label class="font-semibold text-gray-800">Status:</label>
        <select v-model="orders[orderKey].status" class="border border-gray-300 rounded-md p-2 text-base" :disabled="!order.isEdit">
          <option :selected="order.status === 'Menunggu Pembayaran'">Menunggu Pembayaran</option>
          <option :selected="order.status === 'Pesanan Diterima'">Pesanan Diterima</option>
          <option :selected="order.status === 'Sedang Dimasak'">Sedang Dimasak</option>
          <option :selected="order.status === 'Pesanan Selesai'">Pesanan Selesai</option>
        </select>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" @click="onEditOrCancel(order.isEdit, order.id, order.status)">{{ order.isEdit ? 'Batal' : 'Edit' }}</button>
        <button @click="updateStatus(order.id)" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 disabled:!cursor-not-allowed" :disabled="!order.isEdit">Save</button>
      </div>

      </div>
    </section>
  </AdminLayout>
</template>

<style scoped>

</style>