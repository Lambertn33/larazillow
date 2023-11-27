<template>
  <div>
    <h2>Home Page</h2>
    <p>{{ message }}</p>
  </div>
</template>

<script setup>
defineProps({
  message: String,
});
</script>
