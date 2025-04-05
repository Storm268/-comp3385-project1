<template>
  <form @submit.prevent="submitForm" id="propertyForm">
    <div>
      <label>Title:</label>
      <input type="text" v-model="form.title" required />
    </div>

    <div>
      <label>Description:</label>
      <textarea v-model="form.description" required></textarea>
    </div>

    <div>
      <label>Photo:</label>
      <input type="file" @change="handleFileChange" required />
    </div>

    <button type="submit">Submit</button>
  </form>
</template>

<script setup>
import { ref } from 'vue';

const form = ref({
  title: '',
  description: '',
  photo: null,
});

function handleFileChange(e) {
  form.value.photo = e.target.files[0];
}

function submitForm() {
  let formData = new FormData();
  formData.append('title', form.value.title);
  formData.append('description', form.value.description);
  formData.append('photo', form.value.photo);

  fetch('/api/properties', {
    method: 'POST',
    body: formData,
    headers: {
      Accept: 'application/json',
    },
  })
    .then((res) => res.json())
    .then((data) => {
      alert('Property created!');
      console.log(data);
    })
    .catch((err) => {
      console.error(err);
      alert('Error submitting form');
    });
}
</script>
