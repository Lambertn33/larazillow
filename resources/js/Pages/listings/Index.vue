<template>
  <div>
    <h2>Listings</h2>
    <div v-for="listing in listings" :key="listing.id">
      <ListingItem :listing="listing" />
    </div>
  </div>
</template>

<script setup>
import ListingItem from "../../components/ListingItem.vue";
defineProps({
  listings: Array,
});
</script>