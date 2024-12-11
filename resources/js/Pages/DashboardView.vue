<script setup lang="ts">
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'

interface Props {
  income: any,
  order: any,
  recentOrder: any,
  mostOrdered: any
}

const props = withDefaults(defineProps<Props>(), {
  income: 0,
  order: 0,
  recentOrder: [],
  mostOrdered: []
})

// Sample data (replace with real data from backend)
const totalOrders = ref(150)
const totalSales = ref("205k")
const recentOrders = ref([])
const mostOrderedSale = ref([])

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
  totalOrders.value = props.order
  totalSales.value = `Rp ${props.income}`
  recentOrders.value = props.recentOrder.map((order: any) => {
    return {
      id: order.id,
      customer: order.name,
      date: formatDate(order.created_at),
      total: `Rp ${order.total_price}`,
      status: order.status
    }
  })
  mostOrderedSale.value = props.mostOrdered.map((menu: any) =>{
    return {
      menu: menu.name,
      count: menu.count
    }
  })
  console.log(mostOrderedSale.value)
})
</script>

<template>
  <AdminLayout>
    <Head title="Dashboard" />
    <div class="flex">
      <!-- Main Content -->
      <main class="flex-1 p-8">
        <!-- Dashboard Header -->
        <section class="px-8 py-6 bg-gray-100 rounded-xl">
          <h1 class="text-4xl font-bold text-gray-800">Admin Dashboard</h1>
          <p class="text-gray-600 mt-2">Overview of your catering service performance</p>
        </section>

        <!-- Dashboard Summary Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 p-8">
          <!-- Total Orders Card -->
          <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="flex-grow">
              <h2 class="text-xl font-bold text-gray-800">Total Pemasukan</h2>
              <p class="text-gray-500">{{ totalSales }}</p>
            </div>
            <img src="@/assets/images/logo/icon-phone.png" alt="Orders icon" class="w-12 h-12">
          </div>

          <!-- Total Sales Card -->
          <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="flex-grow">
              <h2 class="text-xl font-bold text-gray-800">Total Pesanan Masuk</h2>
              <p class="text-gray-500">{{ totalOrders }}</p>
            </div>
            <img src="@/assets/images/logo/icon-phone.png" alt="Sales icon" class="w-12 h-12">
          </div>

          <!-- More summary cards can be added here -->
        </section>

        <!-- Recent Orders Table -->
        <section class="p-8 bg-white rounded-lg shadow-md">
          <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Orders</h2>
          <table class="w-full text-left">
            <thead>
              <tr class="border-b">
                <th class="py-3 px-4 text-gray-600">Order ID</th>
                <th class="py-3 px-4 text-gray-600">Customer</th>
                <th class="py-3 px-4 text-gray-600">Date</th>
                <th class="py-3 px-4 text-gray-600">Total</th>
                <th class="py-3 px-4 text-gray-600">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="order in recentOrders" :key="order.id" class="border-b">
                <td class="py-3 px-4">{{ order.id }}</td>
                <td class="py-3 px-4">{{ order.customer }}</td>
                <td class="py-3 px-4">{{ order.date }}</td>
                <td class="py-3 px-4">{{ order.total }}</td>
                <td :class="['py-3 px-4', order.status === 'Pesanan Selesai' ? 'text-green-600' : 'text-yellow-600']">
                  {{ order.status }}
                </td>
              </tr>
            </tbody>
          </table>
        </section>
      </main>
    </div>
  </AdminLayout>
</template>