<template>
  <div class="flex gap-1">
    <Link
      v-for="(link, index) in links"
      :key="index"
      :href="link.url"
      :class="renderLinkClass(link)"
    >
      <span v-html="link.label"></span>
    </Link>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";
defineProps({
  links: Array,
});

const renderLinkClass = computed(() => {
  return (link) =>
    link.active
      ? "py-2 px-4 rounded-md text-white bg-indigo-600"
      : "py-2 px-4 rounded-md";
});
</script>