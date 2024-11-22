<template>
  <div class="w-60 h-screen fixed bg-gray-800 text-white transition-all duration-300 ease-in-out">
    <!-- Logo Section -->
    <div class="flex items-center p-6 text-2xl font-bold">
      <!-- Logo Image -->
      <img loading="lazy" 
           src="https://cdn.builder.io/api/v1/image/assets/TEMP/dc8fed7d3e4a97812eadfd65ff3c54ee8bb7e9af1dceee0bbdbe95d47b530aaf?placeholderIfAbsent=true&apiKey=f2ebbb829c064f9782725000c5a9ba86" 
           alt="Mom Tien logo" 
           class="w-[55px] h-[55px] object-contain mr-3" />
      <!-- 'Mom Tien' Text -->
      <h1 class="font-heading italic text-white leading-[normal] my-auto">Mom Tien</h1>
    </div>
    
    <!-- Sidebar Menu Links -->
    <ul class="space-y-4 px-4">
      <li>
        <Link href="/dashboard"
           class="flex items-center py-2 px-4 hover:bg-gray-700 rounded-md transition duration-200 ease-in-out">
          <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
        </Link>
      </li>
      
      <li>
        <Link href="/order"
           class="flex items-center py-2 px-4 hover:bg-gray-700 rounded-md transition duration-200 ease-in-out">
          <i class="fas fa-box-open mr-3"></i> Kelola Order
        </Link>
      </li>
      
      <li>
        <Link href="/menu-admin"
           class="flex items-center py-2 px-4 hover:bg-gray-700 rounded-md transition duration-200 ease-in-out">
          <i class="fas fa-utensils mr-3"></i> Menu
        </Link>
      </li>

      <li>
        <button 
          @click="logout" 
          class="flex items-center py-2 px-4 hover:bg-red-700 rounded-md transition duration-200 ease-in-out w-full text-left"
        >
          <i class="fas fa-sign-out-alt mr-3"></i> Logout
        </button>
      </li>

    </ul>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
// No additional logic is required for this update

// Function to handle logout action
const logout = async () => {
  try {
        await axios.post('/logout');
        window.location.href = '/login';
    } catch (error) {
        console.error('Error during logout:', error);
    }
};

</script>

<style scoped>
/* Sidebar transitions for smooth animations */
.transition-all {
  transition: all 0.3s ease-in-out;
}

/* Make sidebar more compact on smaller screens */
@media (max-width: 768px) {
  .w-80 {
    width: 280px; /* Slightly smaller for mobile devices */
  }
}
</style>
