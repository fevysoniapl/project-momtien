<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { Link, Head } from '@inertiajs/vue3';
import axios from 'axios';
import MainLayout from '@/Layouts/MainLayout.vue';


// Define types and sample menu items
type MenuItem = {
  id: number;
  name: string;
  price: number;
  description: string;
  quantity: number;
};

interface Props {
  menu: any
}

const props = withDefaults(defineProps<Props>(), {
  menu: null
})

const targetUrl = ref('');

// Selected items for the booking
const selectedItems = ref<MenuItem[]>([]);

// Calculate total price
const calculateTotal = () => {
  return selectedItems.value.reduce((total, item) => total + item.price * item.quantity, 0);
};

const isSaved = ref(false);

// Save database
const save = () => {
  isSaved.value = true;
  try { 
    axios.post('/order', selectedItems.value[0]).then(res => targetUrl.value = res.data.url).catch(e => console.error(e))
   } catch (e) {
    console.error(e)
   }
};

const checkout = (item: any) => {
  const phoneNumber = '6281327495481';
  const textMessage = `Total Payment: Rp${calculateTotal()}.\nYour order details:\n${item.name} - Quantity: ${item.quantity} - Price: Rp${item.price * item.quantity}\nPlease confirm your payment with us.`;
  const apiUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(textMessage)}`;

  window.open(apiUrl, '_blank');
  window.location.replace(targetUrl.value)
};

onMounted(() => {
  const menu = { ...props.menu, quantity: 0 }
  selectedItems.value.push(menu)
});

</script>

<template>
  <MainLayout>
    <Head title="Order Menu"/>
    <section class="book-table-section">
      <header class="book-table-header text-3xl font-semibold font-heading">
        <h1>🍽️ Order Menu</h1>
      </header>

      <!-- Selected Items Display -->
      <div v-if="selectedItems.length">
        <div v-for="item in selectedItems" :key="item.id" class="selected-item">
          <h3 class="text-xl font-semibold text-x-orange">{{ item.name }}</h3>
          <p class="opacity-70">{{ item.description }}</p>
          <p>Price: <strong>Rp{{ item.price }}</strong></p>
          
          <!-- Quantity Selector -->
          <label>
            Quantity:
            <input type="number" v-model.number="item.quantity" min="1" :disabled="isSaved" class="quantity-input"/>
          </label>

        </div>

        <!-- Total Price -->
        <div class="total-price text-xl">
          <h3>Total Price: Rp{{ calculateTotal() }}</h3>
        </div>

        <!-- Button -->
        <div class="flex justify-center gap-4 mt-5">
          <button @click="save" :disabled="isSaved" class="px-5 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-500 disabled:bg-gray-300 disabled:cursor-not-allowed">Save</button>
          <button @click="checkout(selectedItems[0])" :disabled="!isSaved" class="px-5 py-2 font-semibold text-white bg-orange-600 rounded-lg hover:bg-orange-500 disabled:bg-gray-300 disabled:cursor-not-allowed">
            Checkout
          </button>
        </div>
      </div>

      <!-- Empty State if no items selected -->
      <div v-else>
        <p>No items selected. Please add items from the menu.</p>
        <Link href="/menu" as="button" >Back to Menu</Link>
      </div>
    </section>
  </MainLayout>
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
  padding: 20px;
  border-radius: 15px;
  margin-bottom: 15px;
}

.total-price {
  font-weight: bold;
  margin-top: 20px;
  text-align: right;
}

.quantity-input {
  width: 50px;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.quantity-input:focus {
  outline: none;
  border-color: #e67e22;
}

</style>