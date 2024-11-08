<script setup lang="ts">
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'

// Sample data (replace with real data from backend)
const totalOrders = ref(150)
const totalSales = ref("205k")
const recentOrders = ref([
  { id: 1, customer: 'John Doe', date: '2024-10-29', total: "120k", status: 'Pesanan Selesai' },
  { id: 2, customer: 'Jane Smith', date: '2024-10-28', total: "85k", status: 'Pesanan Diterima' },
  // Add more orders as needed
])
</script>

<template>
  <AdminLayout>
    <Head title="Dashboard" />
    <div class="flex">
      <!-- Sidebar will be inside AdminLayout -->
      
      <!-- Main Content -->
      <main class="flex-1 p-8">
        <!-- Dashboard Header -->
        <section class="px-8 py-6 bg-gray-100">
          <h1 class="text-4xl font-semibold text-gray-800">Admin Dashboard</h1>
          <p class="text-gray-600 mt-2">Overview of your catering service performance</p>
        </section>

        <!-- Dashboard Summary Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 p-8">
          <!-- Total Orders Card -->
          <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="flex-grow">
              <h2 class="text-xl font-bold text-gray-800">Total Pemasukan</h2>
              <p class="text-gray-500">{{ totalOrders }}</p>
            </div>
            <img src="@/assets/images/logo/icon-phone.png" alt="Orders icon" class="w-12 h-12">
          </div>

          <!-- Total Sales Card -->
          <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
            <div class="flex-grow">
              <h2 class="text-xl font-bold text-gray-800">Total Pesanan Masuk</h2>
              <p class="text-gray-500">{{ totalSales }}</p>
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
                <td :class="['py-3 px-4', order.status === 'Completed' ? 'text-green-600' : 'text-yellow-600']">
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

<style scoped>
/* Ensure the layout has the sidebar on the left and the content on the right */
.flex {
  display: flex;
}

main {
  flex: 1; /* Ensures the main content takes up remaining space */
  padding: 16px;
}
</style>
