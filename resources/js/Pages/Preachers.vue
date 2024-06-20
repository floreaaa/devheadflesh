<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { ref, onMounted } from 'vue';

const preachers = ref([]);
const loading = ref(true);
const error = ref(null);

const fetchData = async () => {
  try {
    const response = await axios.get('/api/users/indexonline');
    preachers.value = response.data; 
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
    <AuthenticatedLayout>    
    
        <div v-if="loading">Loading...</div>
        <div v-else-if="error">{{ error }}</div>
            <div class="p-2 flex justify-center items-center h-64">
                <div> 
                    <p v-for="preacher in preachers" :class="{'text-green-500': preacher.online}">
                        {{ preacher.user.name }}
                    </p>
                </div>
            </div>

    </AuthenticatedLayout>
</template>

<style>
</style>