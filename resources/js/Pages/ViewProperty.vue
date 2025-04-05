<template>
  <div v-if="property">
    <h1>{{ property.title }}</h1>
    <p>{{ property.description }}</p>
    <img :src="`/storage/${property.photo}`" width="500" />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
let property = ref(null);

onMounted(() => {
  fetch(`/api/properties/${route.params.id}`)
    .then((res) => res.json())
    .then((data) => (property.value = data));
});
</script>
