<script setup lang="ts">
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';

// Sample data for orders (from Book a Table)
type Order = {
  id: number;
  customerName: string;
  items: { name: string; quantity: number }[]; // Added items array with name, quantity, and price
  stages: { name: string; description: string; completed: boolean }[];
};

const orders = ref<Order[]>([
  {
    id: 1,
    customerName: "John Doe",
    items: [
      { name: "Pizza", quantity: 2 },
      { name: "Pasta", quantity: 1 },
    ],
    stages: [
      { name: "Order Received", description: "Order has been received.", completed: true },
      { name: "Being Prepared", description: "Food is being prepared.", completed: false },
      { name: "Order Completed", description: "Order is ready for delivery.", completed: false },
    ],
  },
  {
    id: 2,
    customerName: "Jane Smith",
    items: [
      { name: "Burger", quantity: 1,  },
      { name: "Fries", quantity: 2,  },
    ],
    stages: [
      { name: "Order Received", description: "Order has been received.", completed: true },
      { name: "Being Prepared", description: "Food is being prepared.", completed: true },
      { name: "Order Completed", description: "Order is ready for delivery.", completed: false },
    ],
  },
]);

// Update stage status for a particular order
const toggleStageCompletion = (orderIndex: number, stageIndex: number) => {
  orders.value[orderIndex].stages[stageIndex].completed = !orders.value[orderIndex].stages[stageIndex].completed;
};

</script>

<template>
  <AdminLayout>
    <section class="admin-track-order-section">
      <header class="admin-track-order-header">
        <h1 class="text-2xl font-bold font-heading">Kelola Pesanan</h1>
      </header>

      <!-- Orders Management -->
      <div v-for="(order, orderIndex) in orders" :key="order.id" class="order-card">
        <h2>Pesanan #{{ order.id }} - {{ order.customerName }}</h2>

        <!-- Show ordered items -->
        <div class="order-items">
          <h3>Items Ordered:</h3>
          <div v-for="(item, itemIndex) in order.items" :key="itemIndex" class="order-item">
            <p>{{ item.name }} - Quantity: {{ item.quantity }}  </p>
          </div>
        </div>

        

        <!-- Show stages of the order -->
        <div v-for="(stage, stageIndex) in order.stages" :key="stageIndex" class="order-stage">
          <div class="stage-info">
            <h3>{{ stage.name }}</h3>
            <p>{{ stage.description }}</p>
          </div>

          <!-- Toggle Completion Checkbox -->
          <label>
            <input type="checkbox" :checked="stage.completed" @change="toggleStageCompletion(orderIndex, stageIndex)" />
            Completed
          </label>
        </div>
      </div>
    </section>
  </AdminLayout>
</template>

<style scoped>
.admin-track-order-section {
  padding: 20px;
  max-width: 700px;
  margin: auto;
}

.admin-track-order-header {
  text-align: center;
  margin-bottom: 30px;
}

.order-card {
  background-color: #f8f9fa;
  padding: 15px;
  margin-bottom: 20px;
  border-radius: 8px;
}

.order-items {
  margin-top: 10px;
}

.order-item p {
  margin: 5px 0;
}

.total-price {
  margin-top: 10px;
  font-weight: bold;
}

.order-stage {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
  padding: 10px;
  border: 1px solid #e5e5e5;
  border-radius: 5px;
  background-color: #fff;
}

.stage-info h3 {
  margin: 0;
  font-size: 1.1rem;
  color: #333;
}

.stage-info p {
  margin: 5px 0 0;
  font-size: 0.9rem;
  color: #555;
}
</style>