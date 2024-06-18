
<!-- A user can upload one prayer only. -->
<template>
    <div class="file-upload">
      <form @submit.prevent="handleSubmit">
        <label for="file-upload" class="block mb-2 text-sm font-medium text-gray-700">Upload Prayer:</label>
        <input
          type="file"
          id="file-upload"
          @change="handleFileChange"
          class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
        />
        <button
          type="submit"
          class="mt-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none"
        >
          Submit
        </button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  
  // Create a reference for the file
  const file = ref(null);
  
  // Handle file input change
  const handleFileChange = (event) => {
    file.value = event.target.files[0];
  };
  
  // Handle form submission
  const handleSubmit = () => {
    if (file.value) {

      // Create FormData object to send file data
      const formData = new FormData();
      formData.append('file', file.value);
  
      // Send file to the server 
      axios.post('/api/new', formData, { 
        headers: {
            'Content-Type': 'multipart/form-data',
        }})
        .then(data => {
          alert('Prayer uploaded successfully!');
        })
        .catch(error => {
          console.error('Error:', error.response);
          alert('Failed to upload prayer.');
        });
    } else {
      alert('Please select a file to upload.');
    }
  };
  </script>
  
  <style scoped>
  .file-upload {
    max-width: 400px;
    margin: 0 auto;
    padding: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
  }
  </style>
  