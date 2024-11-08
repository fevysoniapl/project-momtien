<template>
    <AdminLayout>
        <section class="menu-section">
            <header class="menu-header">
                <h1 class="menu-title font-bold font-heading">Manage Menu</h1>
            </header>

            <!-- Form Add New Menu Item -->
            <div class="add-menu-form">
                <h2 class="form-title font-bold">Tambah Menu Baru</h2>
                <form @submit.prevent="addItem">
                    <input v-model="form.name" placeholder="Nama Menu" required class="input-field" />
                    <input v-model="form.description" placeholder="Deskripsi" required class="input-field" />
                    <input v-model="form.price" type="number" placeholder="Harga" required class="input-field" />
                    <input type="file" @change="handleImageUpload"  class="input-field" />
                    <div v-if="imagePreview" class="image-preview">
                        <img :src="imagePreview" alt="Image Preview" class="preview-image" />
                    </div>
                    <button type="submit" class="add-button">Tambah Menu</button>
                </form>
            </div>

            <!-- List Menu Items in Table -->
            <div>
                <h2>Daftar Menu</h2>
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Gambar</th>
                            <th class="border px-4 py-2">Nama Menu</th>
                            <th class="border px-4 py-2">Deskripsi</th>
                            <th class="border px-4 py-2">Harga</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="menu in menuItems" :key="menu.id">
                            <td class="border px-4 py-2">
                                <!-- Menampilkan gambar menggunakan path -->
                                <img v-if="menu.image" :src="`/storage/${menu.image}`" alt="Image"
                                    class="w-16 h-16 object-cover" />
                            </td>
                            <td class="border px-4 py-2">{{ menu.name }}</td>
                            <td class="border px-4 py-2">{{ menu.description }}</td>
                            <td class="border px-4 py-2">Rp.{{ menu.price | currency }}</td>
                            <td class="border px-4 py-2 flex flex-col justify-center gap-2">
                                <!-- Edit Button -->
                                <button @click="editMenu(menu)"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md">Edit</button>
                                <!-- Delete Button -->
                                <button @click="deleteMenu(menu.id)"
                                    class="bg-red-500 text-white px-4 py-2 rounded-md">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal for Edit Menu Item -->
            <div v-if="isEditing" class="modal">
                <div class="modal-content">
                    <span class="close" @click="closeModal">&times;</span>
                    <h2 class="form-title">Edit Menu</h2>
                    <form @submit.prevent="updateItem">
                        <input v-model="editingItem.name" placeholder="Nama Menu" required class="input-field" />
                        <input v-model="editingItem.description" placeholder="Deskripsi" required class="input-field" />
                        <input v-model="editingItem.price" type="number" placeholder="Harga" required
                            class="input-field" />
                        <input type="file" @change="handleImageUpload" class="input-field" />
                        <div v-if="imagePreview || editingItem.image" class="image-preview">
                            <img :src="imagePreview || `/storage/${editingItem.image}`" alt="Image"
                                class="w-16 h-16 object-cover" />
                        </div>
                        <button type="submit" class="update-button">Update Menu</button>
                    </form>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>

<script setup>
    import {
        ref
    } from 'vue';
    import {
        useForm,
        usePage,
        router
    } from '@inertiajs/vue3';
    import AdminLayout from '@/Layouts/AdminLayout.vue';

    // Menerima props dari server
    const props = defineProps({
        menuItems: Array
    });

    const menuItems = props.menuItems;

    const form = useForm({
        name: '',
        description: '',
        price: '',
        image: null
    });

    const imagePreview = ref(null);
    const isEditing = ref(false);
    const editingItem = ref(null);

    function handleImageUpload(event) {
        const file = event.target.files[0];
        form.image = file;
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                imagePreview.value = reader.result;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.value = null;
        }
    }

    function addItem() {
        form.post('/menu-admin', {
            forceFormData: true,
            onSuccess: () => {
                menuItems.push({
                    name: form.name,
                    description: form.description,
                    price: form.price,
                    
                });
                form.reset();
            },
            onError: (error) => {
                console.error('Form submission error:', error);
            }
        });
    }

    function editMenu(menu) {
        isEditing.value = true;
        editingItem.value = {
            ...menu
        }; // Mengisi data menu yang ingin diedit
        imagePreview.value = null; // Menampilkan gambar yang sudah ada
    }

    function closeModal() {
        isEditing.value = false;
        imagePreview.value = null; // Menghilangkan preview gambar saat modal ditutup
        editingItem.value = null;
    }

    function updateItem() {
        const updateForm = useForm({
            ...editingItem.value,
            image: form.image
        });

        updateForm.post(`/menu-admin/${editingItem.value.id}`, {
            forceFormData: true,
            onSuccess: () => {
                isEditing.value = false;
                editingItem.value = null;
                imagePreview.value = null;
                form.reset();
                router.get(route('menu-admin.index')); // Reload halaman menu
            },
            onError: (error) => {
                console.error('Update error:', error);
            }
        });
    }

    function deleteMenu(id) {
        if (confirm('Are you sure you want to delete this menu?')) {
            router.delete(`/menu-admin/${id}`, {
                onSuccess: () => {
                    router.get(route('menu-admin.index')); // Reload halaman menu
                },
                onError: (error) => {
                    console.error('Delete error:', error);
                }
            });
        }
    }

</script>

<style scoped>
    .modal {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.5);
        /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
        max-width: 600px;
        border-radius: 8px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .menu-section {
        padding: 5px;
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

    .add-menu-form,
    .edit-menu-form {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
    }

    .form-title {
        font-size: 1.5rem;
        color: #555;
        margin-bottom: 10px;
    }

    .input-field {
        display: block;
        width: 100%;
        padding: 8px;
        margin: 8px 0;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .image-preview {
        margin-top: 10px;
    }

    .preview-image {
        width: 100px;
        /* Adjust as needed */
        height: auto;
        /* Maintain aspect ratio */
        border-radius: 4px;
    }

    .add-button,
    .update-button,
    .edit-button,
    .delete-button {
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 5px;
    }

    .add-button,
    .update-button {
        background-color: #4CAF50;
        color: white;
        border: none;
    }

    .edit-button {
        background-color: #ff9800;
        color: white;
        border: none;
        margin-left: 10px;
    }

    .delete-button {
        background-color: #f44336;
        color: white;
        border: none;
        margin-left: 5px;
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
