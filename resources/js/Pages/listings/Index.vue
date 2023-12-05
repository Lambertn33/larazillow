<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Box v-for="listing in listings.data" :key="listing.id">
      <ListingItem :listing="listing" />
    </Box>
  </div>
  <div class="flex justify-center w-full my-8" v-if="listings.data.length">
    <Pagination :links="listings.links" />
  </div>
</template>

<script setup>
import ListingItem from "../../components/ListingItem.vue";
import Box from "../../components/UI/Box.vue";
import Pagination from "../../components/UI/Pagination.vue";
defineProps({
  listings: Object,
});
</script>