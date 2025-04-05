<template>
  <div>
    <h1>All Properties</h1>
    <div v-for="property in properties" :key="property.id">
      <h3>{{ property.title }}</h3>
      <p>{{ property.description }}</p>
      <img :src="`/storage/${property.photo}`" alt="property image" width="300" />
      <router-link :to="`/properties/${property.id}`">View</router-link>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

let properties = ref([]);

onMounted(() => {
  fetch('/api/properties')
    .then((res) => res.json())
    .then((data) => (properties.value = data));
});
</script>
