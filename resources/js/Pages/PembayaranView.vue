<template>
  <main class="flex items-center justify-center min-h-screen bg-gray-100 py-6 px-4">
    <section
      data-layername="form"
      class="relative flex flex-col items-center p-8 text-base leading-6 text-left text-black bg-white rounded-2xl shadow-2xl w-full max-w-md"
    >
      <!-- QRIS Logo positioned at the top left -->
      <img
        loading="lazy"
        src="https://cdn.builder.io/api/v1/image/assets/TEMP/49046a41fd4d191656484d055f93c36c75cac556f9ffef767920ceff5a8b3fd1?placeholderIfAbsent=true&apiKey=99e98c75e74449b086557677558acabb"
        class="absolute top-4 left-4 w-12 aspect-square"
        alt="QRIS Logo"
      />
      
      <!-- Centered QRIS Text at the top -->
      <div
        data-layername="qrisText"
        class="text-xl font-semibold absolute top-4 w-full text-center"
      >
        Payment Gateway
      </div>
      
      <!-- Payment Instructions (Left aligned) -->
      <div class="mt-12 space-y-4 text-sm text-left w-full">
        <div>
          <p><strong>Bank CIMB Niaga</strong></p>
          <p>Nomor Rekening: <strong>707228024700</strong></p>
        </div>
        <div>
          <p><strong>Shopee Pay</strong></p>
          <p>Nomor: <strong>081327495481</strong></p>
        </div>
        <div>
          <p><strong>Dana</strong></p>
          <p>Nomor: <strong>081327495481</strong></p>
        </div>
      </div>
  
      <!-- Upload Bukti Transfer -->
      <div class="mt-6 space-y-2 w-full">
        <label for="uploadFile" class="block text-sm text-gray-700">Unggah Bukti Transfer</label>
        <input
          id="uploadFile"
          type="file"
          @change="handleFileUpload"
          class="w-full border p-3 rounded-lg text-gray-700"
          accept="image/*,.pdf"
        />
      </div>
  
      <!-- Submit Button -->
      <button
        @click="submitPayment"
        :disabled="!file"
        class="mt-6 p-3 bg-blue-500 text-white rounded-lg w-full disabled:bg-gray-400"
      >
        Kirim Bukti Pembayaran
      </button>
  
      <!-- Confirmation Message -->
      <div v-if="submitted" class="mt-6 text-green-600">
        <p>Terima kasih! Pembayaran Anda telah diterima.</p>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  data() {
    return {
      file: null,
      submitted: false,
    };
  },
  methods: {
    handleFileUpload(event) {
      const file = event.target.files[0];
      if (file) {
        this.file = file;
      }
    },
    submitPayment() {
      if (this.file) {
        // Simulate successful payment submission
        this.submitted = true;
        // Clear the file input after submission
        this.file = null;
      }
    }
  }
};
</script>

<style scoped>
/* Add your custom styles here */
builder-component {
  max-width: none !important;
}
</style>