<template>
  <div>
    <Link href="/">Home</Link>
    <Link href="/show">Show</Link>
  </div>
  <p>the timer is {{ timer }}</p>
  <slot></slot>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const timer = ref(0);
setInterval(() => timer.value ++, 1000);
</script>