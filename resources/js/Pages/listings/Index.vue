<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Box v-for="listing in listings" :key="listing.id">
      <ListingItem :listing="listing" />
    </Box>
  </div>
</template>

<script setup>
import ListingItem from "../../components/ListingItem.vue";
import Box from "../../components/UI/Box.vue";
defineProps({
  listings: Array,
});
</script>