<template>
  <div>
    <Link href="/listings">Home</Link>
    <Link href="/listings">Show</Link>
  </div>
  <div v-if="hasSuccess">{{ hasSuccess }}</div>
  <slot></slot>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const hasSuccess = computed(() => page.props.flash.success)

</script>