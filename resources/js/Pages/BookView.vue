<script setup lang="ts">
import { ref } from 'vue';


// Define types and sample menu items
type MenuItem = {
  id: number;
  name: string;
  price: number;
  description: string;
  quantity: number;
};

const menuItems = ref<MenuItem[]>([
  { id: 1, name: "Ayam Bakar MomTien", price: 18000, description: "Delicious grilled chicken", quantity: 0 },
  { id: 2, name: "Lele Goreng Kremes", price: 15000, description: "Crispy fried catfish", quantity: 0 },
  { id: 3, name: "Gurame Bakar", price: 57000, description: "Grilled carp fish with special spices", quantity: 0 },
]);

// Selected items for the booking
const selectedItems = ref<MenuItem[]>([]);

// Add item to the booking list
const addItemToBooking = (item: MenuItem) => {
  const existingItem = selectedItems.value.find((i) => i.id === item.id);
  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    selectedItems.value.push({ ...item, quantity: 1 });
  }
};

// Calculate total price
const calculateTotal = () => {
  return selectedItems.value.reduce((total, item) => total + item.price * item.quantity, 0);
};

// Remove an item from booking
const removeItem = (id: number) => {
  selectedItems.value = selectedItems.value.filter(item => item.id !== id);
};

// Handle checkout (COD or Payment Gateway)
const checkout = (method: string) => {
  alert(Checking out with ${method}. Total Price: Rp${calculateTotal()});
};
</script>

<template>
  
    <section class="book-table-section">
      <header class="book-table-header">
        <h1>Book a Table</h1>
      </header>

      <!-- Selected Items Display -->
      <div v-if="selectedItems.length > 0">
        <h2>Your Selection</h2>
        <div v-for="item in selectedItems" :key="item.id" class="selected-item">
          <h3>{{ item.name }}</h3>
          <p>{{ item.description }}</p>
          <p>Price: Rp{{ item.price }}</p>
          
          <!-- Quantity Selector -->
          <label>
            Quantity:
            <input type="number" v-model.number="item.quantity" min="1" />
          </label>

          <!-- Remove Item Button -->
          <button @click="removeItem(item.id)">Remove</button>
        </div>

        <!-- Total Price -->
        <div class="total-price">
          <h3>Total Price: Rp{{ calculateTotal() }}</h3>
        </div>

        <!-- Checkout Options -->
        <div class="checkout-options">
          <button @click="checkout('COD')">Checkout with COD</button>
          <button @click="checkout('Payment Gateway')">Checkout with Payment Gateway</button>
        </div>
      </div>

      <!-- Empty State if no items selected -->
      <div v-else>
        <p>No items selected. Please add items from the menu.</p>
        <button @click="$emit('backToMenu')">Back to Menu</button>
      </div>
    </section>
  
</template>

<style scoped>
.book-table-section {
  padding: 20px;
  max-width: 700px;
  margin: auto;
}

.book-table-header {
  text-align: center;
  margin-bottom: 30px;
}

.selected-item {
  border: 1px solid #e5e5e5;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 15px;
}

.total-price {
  font-size: 1.5rem;
  font-weight: bold;
  margin-top: 20px;
  text-align: right;
}

.checkout-options {
  display: flex;
  gap: 10px;
  margin-top: 20px;
}

button {
  padding: 10px;
  font-size: 1rem;
  color: #fff;
  background-color: #f76c6c;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #e55a5a;
}
</style>