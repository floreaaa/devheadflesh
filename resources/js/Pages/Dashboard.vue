<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { ref, onMounted } from 'vue';

const prayers = ref([]);
const loading = ref(true);
const error = ref(null);

const fetchData = async () => {
  try {
    const response = await axios.get('/api/prayers');
    prayers.value = response.data; 
  } catch (error) {
    error.value = error;
    console.error('Error fetching data:', error);
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchData();
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <div class="h-screen">
            <div class="h-full w-full bg-[url('/public/images/d.jpg')] flex items-center justify-center">

                <div v-if="loading">Loading...</div>
                    <div v-else-if="error">{{ error }}</div>
                <ul v-else>
                    <li v-for="prayer in prayers">
                        <div class="w-1/6 p-2"> 
                            <audio controls :src="prayer" ></audio>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </AuthenticatedLayout>
</template>
